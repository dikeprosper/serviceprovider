<?php
include 'config/config.php';
header('Content-Type: application/json');

// ===== CONFIGURATION =====
// Adjust this variable to change how many profiles are displayed per page
$itemsPerPage = 8;
// ========================

// Fetch providers from database
$query = "SELECT * FROM user WHERE role != 'customer'";
$result = $app->myQuery($query);

$providers = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $providers[] = $row;
    }
}

// Add dynamic fields to each provider
foreach ($providers as &$p) {

    $p['active'] = rand(0, 1); // 1 = active, 0 = inactive
    $p['time'] = rand(1, 30);  // Delivery time in days
    $p['express'] = rand(0, 1);  // 1 = offers express delivery, 0 = standard delivery only
    $p['verified'] = 0;  // 1 = verified, 0 = not verified
    $p['rateCount'] = 0;
    $totalRatings = 0; // Default to 0 if username not available
    $rateCount = 0; // Default to 0 if username not available


    // Get rating from ratings database by user's username/slug
    $username = $p['username'] ?? '';
    if (!empty($username)) {

        $ratingQuery = "SELECT * FROM ratings WHERE username = ?";
        $ratingResult = $app->myQuery($ratingQuery, "s", [$username]);

        if ($ratingResult && $ratingResult->num_rows > 0) {

            $totalRatings = $ratingResult->num_rows;

            while ($ratingRow = $ratingResult->fetch_assoc()) {

                $rateCount += $ratingRow['rate'];
            }

            $p['rating'] = $rateCount / $totalRatings; // Calculate average rating
            $p['rateCount'] = $totalRatings;

        } else {

            $p['rating'] = 0; // Default to 0 if no rating found
            $p['rating'] = 0; // Default to 0 if no rating found
        }

    } else {
        $p['rating'] = 0; // Default to 0 if username not available
    }

    // Check if user was created within last 30 days (new provider)
    if (isset($p['created_at'])) {
        $createdDate = new DateTime($p['created_at']);
        $thirtyDaysAgo = new DateTime('30 days ago');
        $p['is_new'] = $createdDate > $thirtyDaysAgo ? 1 : 0;
    } else {
        $p['is_new'] = 0;
    }
}

// Check if this is an AJAX request with filter data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get the JSON data from the request
    $json_data = file_get_contents('php://input');
    $filters = json_decode($json_data, true);
    
    $filtered_providers = $providers;
    
    // Apply rating filter - Sort by rating criteria

    if (!empty($filters['rating'])) {

        if (in_array('top', $filters['rating'])) {

            // Sort top rated to the front
            usort($filtered_providers, function($a, $b) {
                return floatval($b['rating']) <=> floatval($a['rating']);
            });

        } elseif (in_array('new', $filters['rating'])) {

            // Sort new providers to the front
            usort($filtered_providers, function($a, $b) {
                return ($b['is_new'] ?? 0) <=> ($a['is_new'] ?? 0);
            });
        }
    } else {
        usort($filtered_providers, function($a, $b) {
            return floatval($b['rating']) <=> floatval($a['rating']);
        });
    }

    // Apply delivery filter - Sort by delivery time or express availability
    if (!empty($filters['delivery'])) {

        if (in_array('fastest', $filters['delivery'])) {

            // Sort by delivery time ascending (quickest turnaround first)
            usort($filtered_providers, function($a, $b) {
                return intval($a['time'] ?? 0) <=> intval($b['time'] ?? 0);
            });

        } elseif (in_array('express', $filters['delivery'])) {

            // Sort providers who offer express delivery to the front
            usort($filtered_providers, function($a, $b) {
                return ($b['express'] ?? 0) <=> ($a['express'] ?? 0);
            });
        }
    }

    // Pagination
    $currentPage = $filters['page'] ?? 1;
    $totalItems = count($filtered_providers);
    $totalPages = ceil($totalItems / $itemsPerPage);
    $currentPage = max(1, min($currentPage, $totalPages)); // Ensure valid page
    
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    $paginatedProviders = array_slice($filtered_providers, $startIndex, $itemsPerPage);
    
    // Generate HTML for paginated filtered providers
    $html = '';

    foreach ($paginatedProviders as $p) {

        $rating = $p['rating'] ?? 0;

        $verified = ($p['verified'] ?? 1) ? '<span class="material-symbols-outlined text-white fs-6-plus">verified</span>' : '';
        
        $newBadge = ($p['is_new'] ?? 0) == 1 ? '<span class="badge bg-success ms-2" style="font-size: 0.6rem;">New</span>' : '';

        $expressBadge = ($p['express'] ?? 0) == 1 ? '<span class="badge bg-info text-dark ms-md-2" style="font-size: 0.5rem;">Accepts Express</span>' : '';
        
        $photo_url = $p['photo_url'] ?? '/profile/ten.webp';
        $specialty = htmlspecialchars($p['specialty'] ?? 'Provider');
        
        $html .= '<div class="col-6 col-xl-3 col-md-4 mb-1">
                    <div class="card-img-inner position-relative">
                        <div onclick="addTailor(' . $p['uid'] . ')">
                            <img
                                class="profile"
                                src="'.SITE_URL.'/'. htmlspecialchars($photo_url) . '"
                                alt="' . htmlspecialchars($p['name']) . '"
                                loading="lazy"
                            />
                            <div class="z-3 w-100 title position-absolute bottom-0 p-2 h-100 d-flex flex-column justify-content-end">
                                
                                <div class="px-1 pb-1 title d-flex align-items-center justify-content-between">
                                    <div class="name mt-0 mb-1 text-white fw-bold lh-1">
                                        ' . htmlspecialchars(mb_strimwidth($p['username'], 0, 12, '...')) . '
                                        ' . $newBadge . '
                                        ' . $expressBadge . '
                                    </div>
                                    ' . $verified . '
                                </div>

                                <div class="px-1 title d-flex align-items-center justify-content-between">
                                    <div class="role site-radius fs-8 text-white">' . $specialty . '</div>
                                    <span class="fs-7 text-white d-flex align-items-center gap-1"> <span class="material-symbols-outlined text-white fs-6">star</span> '.mb_strimwidth($p['rating'], 0, 3, '').' <span class="noto" style="color: #a1a1a1;"> ('. $p['rateCount'] .') </span> </span>
                                </div>

                            </div>
                            
                            <input type="hidden" name="active" value="' . $p['active'] . '">
                            <input type="hidden" name="time" value="' . $p['time'] . '">
                            <input type="hidden" name="express" value="' . $p['express'] . '">
                            <input type="hidden" name="is_new" value="' . ($p['is_new'] ?? 0) . '">
                        </div>
                    </div>

                </div>';
    }
    
    // Return JSON response
    echo json_encode([
        'html' => $html,
        'count' => count($filtered_providers),
        'totalItems' => $totalItems,
        'currentPage' => $currentPage,
        'totalPages' => $totalPages,
        'itemsPerPage' => $itemsPerPage
    ]);
    exit;
}


// Add random fields
// foreach ($providers as $provider) {
//     $provider['active'] = rand(0, 1); // 1 = active, 0 = inactive
//     $provider['time'] = rand(1, 50);  // 1 = has deals, 0 = no deals
//     $provider['deals'] = rand(0, 1);  // 1 = has deals, 0 = no deals
// }