<?php
include 'config/config.php';

if (isset($_POST['delete'])) {

    $pid = $app->post('delete');

    if (isset($_SESSION['selected_styles'][$pid])) {
        unset($_SESSION['selected_styles'][$pid]);
    }

    if(!isset($_SESSION['selected_styles'][$pid])) {

        $status = "success";
        $app->setAlert('Item Deleted.', $status);

    } else {

        $status = "danger";
        $app->setAlert('An error occurred.', $status);

    }

    $optionList = "";
    $selectedItem = "";

    if (isset($_SESSION['selected_styles'])):
        foreach ($_SESSION['selected_styles'] as $options):

            $optionList .=
            '<div onclick="selectItem(' . $options['pid'] . ')" class="itemImg position-relative overflow-hidden rounded-3 flex-shrink-0">
                <img src="' . SITE_URL . 'img/inspiration/' . $options['img'] . '" 
                    class="w-100 h-100" 
                    style="object-fit: cover;">
            </div>';

        endforeach;
    endif;

    $optionList .=
    '<a href="' . SITE_URL . 'inspiration?p=select" class="itemImg flex-shrink-0">
        <div class="pm-add fs-8 py-2 h-100">
            <span class="material-symbols-outlined">add</span>
            Add New
        </div>
    </a>';
    

    $alert = $app->getAlert("", true);

    if ($_SESSION['selected_styles']) {

        // Get the key of the last item added
        $lastKey = array_key_last($_SESSION['selected_styles']);
        // Get that item id
        $pid = $_SESSION['selected_styles'][$lastKey]['pid'] ?? null;

        $selectedItem = $app->selectNew($pid);
    }


    header('Content-Type: application/json');
    echo json_encode([
        'list'  => $optionList,
        'selectedItem' => $selectedItem,
        'alert' => $alert
    ]);
    exit;

}

if (isset($_POST['select'])) {

    $pid = $app->post('select');
    $return = $app->selectNew($pid);

    echo $return;
    exit;
}

if (isset($_POST['add'])) {

    $pid            = $app->post('add');
    $size           = $app->post('size');
    $standard       = $app->post('standard');

    $itemSaved = $app->addSelectedStyle($pid, $size, $standard);

    // $nextStep = "<a href=\"". SITE_URL ."place-order\" class=\"btn btn-light text-underline py-1 px-2 text-primary ms-3\"> View Order </a>";
    $status = "danger";

    if($itemSaved == "Error") {

        $app->setAlert('There was an ERROR <br> Please try again later.', $status);
        $result = $app->getAlert("");
        exit;
    }

    echo $itemSaved;
    exit;
}

if (isset($_POST['add_fab'])) {

    $fid            = $app->post('add_fab');
    $yards_left     = $app->post('yards_left');
    $total_yards    = $app->post('total_yards');
    $fab_price      = $app->post('fab_price');
    
    $itemSaved      = $app->addFabric($fid, $yards_left, $total_yards, $fab_price);
    $status         = "danger";

    if($itemSaved != "Saved") {

        $app->setAlert('There was an ERROR <br> Please try again later.', $status);
        $result = $app->getAlert("");
        exit;
    }

    echo $itemSaved;
    exit;
}

if (isset($_POST['add_tailor'])) {

    $uid            = $app->post('add_tailor');
    $itemSaved      = $app->addTailor($uid);
    $status         = "danger";

    if($itemSaved != "Saved") {

        $app->setAlert('There was an ERROR <br> Please try again later.', $status);
        $result = $app->getAlert("");
        exit;
    }

    echo $itemSaved;
    exit;
}