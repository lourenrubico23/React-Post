<?php
$conn = null;
$conn = checkDbConnection();
$homeBanner = new HomeBanner($conn);

$error = [];
$returnData = [];
if (array_key_exists("homeBannerid", $_GET)) {
    $homeBanner->homeBanner_aid = $_GET['homeBannerid'];
    checkId($homeBanner->homeBanner_aid);

    $query = checkDelete($homeBanner);
    returnSuccess($homeBanner, "homeBanner", $query);
}

checkEndpoint();