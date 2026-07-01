<?php
include 'config/config.php';
header('Content-Type: application/json');

// ===== CONFIGURATION =====
// Adjust this variable to change how many profiles are displayed per page
$itemsPerPage = 8;
// ========================

// Fetch providers from database
$query = "SELECT * FROM user WHERE role = 'customer'";
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
    $p['time'] = rand(1, 50);  // Response time in minutes
    $p['deals'] = rand(0, 1);  // 1 = has deals, 0 = no deals
    $p['verified'] = rand(0, 1);  // 1 = verified, 0 = not verified
    $p['price'] = rand(10000, 40000);  // Price range
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
    
    // Apply status filter - Sort active providers to the front
    if (!empty($filters['status'])) {

        if (in_array('active', $filters['status'])) {

            usort($filtered_providers, function($a, $b) {
                return $b['active'] <=> $a['active'];
            });
        } elseif (in_array('inactive', $filters['status'])) {

            usort($filtered_providers, function($a, $b) {
                return $a['active'] <=> $b['active'];
            });
        }
    }
    
    // Apply deals filter - Sort providers with deals to the front
    if (!empty($filters['deals'])) {
        if (in_array('discount', $filters['deals']) || in_array('loyalty', $filters['deals'])) {
            usort($filtered_providers, function($a, $b) {
                return $b['deals'] <=> $a['deals'];
            });
        }
    }
    
    // Apply price range filter
    if (!empty($filters['priceMin']) || !empty($filters['priceMax'])) {
        $priceMin = isset($filters['priceMin']) ? intval($filters['priceMin']) : 0;
        $priceMax = isset($filters['priceMax']) ? intval($filters['priceMax']) : PHP_INT_MAX;

        $filtered_providers = array_filter($filtered_providers, function($provider) use ($priceMin, $priceMax) {
            $price = intval($provider['price'] ?? 0);
            return $price >= $priceMin && $price <= $priceMax;
        });

        // Re-index after filter
        $filtered_providers = array_values($filtered_providers);
    }

    // Apply sort order (low to high / high to low)
    if (!empty($filters['sortOrder'])) {
        if ($filters['sortOrder'] === 'low') {
            usort($filtered_providers, function($a, $b) {
                return intval($a['price'] ?? 0) <=> intval($b['price'] ?? 0);
            });
        } elseif ($filters['sortOrder'] === 'high') {
            usort($filtered_providers, function($a, $b) {
                return intval($b['price'] ?? 0) <=> intval($a['price'] ?? 0);
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

        $deals = "";
        if($p['deals'] == 1) {

            $deals = "<div class='d-flex'> <div class='fs-7 text-primary'>" . rand(1, 50) . "% OFF</div> </div>";
        }

        $rating = $p['rating'] ?? 0;

        $verified = ($p['verified'] ?? 1) ? '<span class="material-symbols-outlined text-white fs-6-plus">verified</span>' : '';
        
        $newBadge = ($p['is_new'] ?? 0) == 1 ? '<span class="badge bg-success ms-2" style="font-size: 0.6rem;">New</span>' : '';
        
        $photo_url = $p['photo_url'] ?? '/profile/ten.webp';
        $specialty = htmlspecialchars($p['specialty'] ?? 'Provider');
        
        $html .= '<div class="col-6 col-xl-3 col-md-4 mb-1">
                    <div class="card-img-inner position-relative">
                        <a href="./provider.php?id=">
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
                                    </div>
                                    ' . $verified . '
                                </div>

                                <div class="px-1 title d-flex align-items-center justify-content-between">
                                    <div class="px-2 role site-radius fs-8 text-white">' . $specialty . '</div>
                                    <span class="fs-7 text-white d-flex align-items-center gap-1"> <span class="material-symbols-outlined text-white fs-6">star</span> '.mb_strimwidth($p['rating'], 0, 3, '').' <span class="noto" style="color: #a1a1a1;"> ('. $p['rateCount'] .') </span> </span>
                                </div>

                            </div>
                            
                            <input type="hidden" name="active" value="' . $p['active'] . '">
                            <input type="hidden" name="time" value="' . $p['time'] . '">
                            <input type="hidden" name="deals" value="' . $p['deals'] . '">
                            <input type="hidden" name="is_new" value="' . ($p['is_new'] ?? 0) . '">
                        </a>
                    </div>
                    <div class="pt-2">
                        <div class="fs-8">' . $specialty . '</div>
                        <div class="fs-7 fw-bold">From ₦' . number_format($p['price']) . '</div>
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
