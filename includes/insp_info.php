<?php  

$active_all = "active";

// Single pin view
// Likes and Profile selection
if(isset($selectedItem)) {

    $pid = $selectedItem['pid'];

    $selectedCat = $selectedItem['category'];

    // Likes + Pins counts in one query
    $engagement = $app->myQuery(
        "SELECT
            (SELECT COUNT(*) FROM likes WHERE pid = ?) AS like_count,
            (SELECT COUNT(*) FROM pins WHERE pid = ?) AS pin_count",
        "ss",
        [$pid, $pid]
    );

    // Normalize: fetch if it's still a raw mysqli_result
    if ($engagement instanceof mysqli_result) {
        $engagement = $engagement->fetch_all(MYSQLI_ASSOC);
    }

    $likeCount = $engagement[0]['like_count'];
    $pinCount  = $engagement[0]['pin_count'];
    
    // Measurement selection
    $measurementQuery = $app->myQuery(
        "SELECT * FROM user_measurements WHERE username = ?",
        "s",
        [$user['username'] ?? null]
    );

    $fabric_yards = json_decode($selectedItem['fabric_yards'], true);

    $keys = array_keys($fabric_yards);
    $firstKey = $keys[0];
    $lastKey = end($keys);

    $firstValue = $fabric_yards[$firstKey];
    $lastValue = $fabric_yards[$lastKey];

}

// Product listing based on category filter
if(isset($mycat)) {

    $active_all = "";
    $cat = $mycat['name'];

    $styles = $app->myQuery(
        "SELECT * FROM products WHERE category = ? AND active_inspr = '1'",
        "s",
        [$cat]
    );

}  elseif (isset($selectedCat)) {
    
    $styles = $app->myQuery(
        "SELECT * FROM products WHERE category = ? AND active_inspr = '1' AND pid != ?",
        "ss",
        [$selectedCat, $pid]
    );

} else {

    $styles = $app->myQuery("SELECT * FROM products WHERE active_inspr = '1'");
}

$allCat = 'inspiration';
$item = 'style';

// Convert to array for easier handling in views
if (isset($selectedCat)) {
    
    $myStyles = [];
    while ($row = $styles->fetch_assoc()) {

        $myStyles[] = $row;
    }

    $current_name = $selectedItem['name'];
    $tags = explode(',', $selectedItem['tags']);
    
    $current_tags = array_map('trim', explode(',', $selectedItem['tags']));
    
    // Scoring function to determine relevance based on name and tags
    // Higher score means more relevant
    // Word matches are weighted more heavily than tag matches, and having both boosts the score further
    $scoreItem = function($item) use ($current_name, $current_tags) {
        
        $score = 0;

        //Word matching
        $current_words  = array_filter(explode(' ', strtolower($current_name)));
        $item_words     = array_filter(explode(' ', strtolower($item['name'])));
        $matching_words = array_intersect($current_words, $item_words);
        $score += count($matching_words) * 20;

        // Tag matching — explode here since they're comma-separated strings
        $item_tags = array_filter(array_map('trim', explode(',', $item['tags'])));
        $matching_tags = array_intersect(
            array_map('strtolower', $item_tags),
            array_map('strtolower', $current_tags)
        );

        $score += count($matching_tags) * 20;

        // Priority boost — at least 1 matching WORD AND at least 1 matching tag
        if (count($matching_words) >= 1 && count($matching_tags) >= 1) {
            $score += 40;
        }
        
        return $score;
    };

    
    usort($myStyles, function($a, $b) use ($scoreItem) {
        return $scoreItem($b) - $scoreItem($a);
    });

    
} elseif ($styles->num_rows < 1) {

    $myStyles = [];

} else {

    $myStyles = $styles->fetch_all(MYSQLI_ASSOC);
}

$stmt = $app->myQuery("SELECT * FROM categories WHERE type = '0'");
$categories = $stmt->fetch_all(MYSQLI_ASSOC);



$standard_sizing = '<div class="w-100 fs-6 fw-bold mb-3"> This style uses standard sizing </div>
                        <select id="selectSize" class="form-control mb-2">
                            <option value="">Select</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>';

$upload_m = '<div class="d-flex w-100 py-3 justify-content-center">
                <a href="<?= SITE_URL ?>measurements" class="py-3 px-5 btn btn-fade fade-r fs-7">Upload Your Measurments</a>
            </div>';
            
$error_p = '<p class="errorMsg text-danger fs-7"></p>';