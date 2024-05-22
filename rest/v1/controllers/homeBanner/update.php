<?php
$conn = null;
$conn = checkDbConnection();
$homeBanner = new HomeBanner($conn);
$error = [];
$returnData = [];
if (array_key_exists("homeBannerid", $_GET)) {
    checkPayload($data);
    $homeBanner->homeBanner_aid = $_GET['homeBannerid'];
    $homeBanner->homeBanner_title = checkIndex($data, "homeBanner_title");
    $homeBanner->homeBanner_image = checkIndex($data, "homeBanner_image");
    $homeBanner->homeBanner_category = checkIndex($data, "homeBanner_category");
    $homeBanner->homeBanner_description = checkIndex($data, "homeBanner_description");
    $homeBanner->homeBanner_publish_date = checkIndex($data, "homeBanner_publish_date");
    $homeBanner->homeBanner_datetime = date("Y-m-d H:i:s");
    checkId($homeBanner->homeBanner_aid);
    /* $homeBanner_title_old = checkIndex($data, "homeBanner_title_old");
    comparetitle($homeBanner, $homeBanner_title_old, $homeBanner->homeBanner_title); */
    $query = checkUpdate($homeBanner);
    returnSuccess($homeBanner, "homeBanner", $query);
}

checkEndpoint();