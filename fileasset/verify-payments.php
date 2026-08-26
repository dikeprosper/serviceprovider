<?php
/**
 * POST /api/verify-payment.php
 * Body: { reference, fulfillment, pickup_point, delivery_zone_id,
 *         guest_email, guest_password }
 *
 * Verifies the transaction with Paystack, re-derives the amount server-side
 * (never trust the amount from the client), creates a guest account if
 * needed, saves the order, and returns { redirect }.
 */

header('Content-Type: application/json');

session_start(); // if not already started by a bootstrap file

$body = json_decode(file_get_contents('php://input'), true);

$reference = $body['reference'] ?? null;
if (!$reference) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing payment reference']);
    exit;
}

// 1. Pull the authoritative order data from session, not the client
$item = $_SESSION['selected_styles'] ?? null;
if (!$item) {
    http_response_code(400);
    echo json_encode(['error' => 'Your session expired, please start again']);
    exit;
}

include '../fileasset/delivery-zones.php'; // brings in calculateDeliveryFeeByZone()

$fulfillment = $body['fulfillment'] ?? 'delivery';
$itemPriceKobo = isset($item['price']) ? (int) ($item['price'] * 100) : 0;
$deliveryFeeKobo = 0;
$zoneId = null;

if ($fulfillment === 'delivery') {
    
    $zoneId = $body['delivery_zone_id'] ?? null;
    $feeResult = calculateDeliveryFeeByZone($zoneId);

    if (!$feeResult['valid']) {
        http_response_code(400);
        echo json_encode(['error' => 'Please select a valid delivery zone']);
        exit;
    }

    $deliveryFeeKobo = $feeResult['fee'] * 100;
}

$expectedAmountKobo = $itemPriceKobo + $deliveryFeeKobo;

// 2. Verify the transaction with Paystack
$ch = curl_init("https://api.paystack.co/transaction/verify/" . rawurlencode($reference));
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . PAYSTACK_SECRET_KEY,
        'Content-Type: application/json',
    ],
]);
$response = curl_exec($ch);
$curlErr = curl_error($ch);
curl_close($ch);

if ($curlErr) {
    http_response_code(502);
    echo json_encode(['error' => 'Could not reach Paystack, please try again']);
    exit;
}

$result = json_decode($response, true);
$txn = $result['data'] ?? null;

if (!$txn || $result['status'] !== true || $txn['status'] !== 'success') {
    http_response_code(400);
    echo json_encode(['error' => 'Payment was not successful']);
    exit;
}

// 3. Guard against amount tampering / reused references
if ((int) $txn['amount'] !== $expectedAmountKobo) {
    http_response_code(400);
    echo json_encode(['error' => 'Amount mismatch, payment flagged']);
    exit;
}

// Optional but recommended: check this reference hasn't already been
// fulfilled before (e.g. SELECT 1 FROM orders WHERE payment_ref = ?)

// 4. Resolve the user — existing session user, or create a guest account
$uid = null;

if (isset($user)) {
    $uid = $user['uid'];
} else {
    $guestEmail = htmlspecialchars(trim($body['guest_email'] ?? ''));
    $guestPassword = $body['guest_password'] ?? '';

    if (!$guestEmail || !$guestPassword) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing account details']);
        exit;
    }

    // Replace with your existing user-creation query / wrapper.
    // If the email already has an account, this should fail with a clear
    // message rather than silently overwriting it — direct them to log in.
    $hashed = password_hash($guestPassword, PASSWORD_DEFAULT);

    // $uid = create_user($guestEmail, $hashed);
    // $_SESSION['user'] = fetch_user($uid); // logs them in
}

// 5. Build the delivery/pickup payload ($fulfillment already resolved in step 1)
$deliveryPayload = [
    'type' => $fulfillment,
    'fee' => $deliveryFeeKobo / 100,
];

if ($fulfillment === 'pickup') {
    $deliveryPayload['pickup_point_id'] = htmlspecialchars($body['pickup_point'] ?? '');
} else {
    $deliveryPayload['zone_id'] = $zoneId;
    $deliveryPayload['zone_name'] = $feeResult['zone']['name'] ?? null;
}

// 6. Save the order — replace with your query wrapper
// $orderId = create_order([
//     'uid'          => $uid,
//     'pid'          => $item['pid'],
//     'amount'       => $expectedAmountKobo / 100,
//     'payment_ref'  => $reference,
//     'channel'      => $txn['channel'],
//     'fulfillment'  => json_encode($deliveryPayload),
//     'status'       => 'paid',
// ]);

// 7. Clear the cart/session item now that the order is placed
unset($_SESSION['selected_styles']);

echo json_encode([
    'redirect' => SITE_URL . 'order-success?ref=' . urlencode($reference),
]);