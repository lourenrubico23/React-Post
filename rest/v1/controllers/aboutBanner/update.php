<?php
$conn = null;
$conn = checkDbConnection();
$aboutBanner = new AboutBanner($conn);
$error = [];
$returnData = [];
if (array_key_exists("aboutBannerid", $_GET)) {
    checkPayload($data);
    $aboutBanner->aboutBanner_aid = $_GET['aboutBannerid'];
    $aboutBanner->aboutBanner_title = checkIndex($data, "aboutBanner_title");
    $aboutBanner->aboutBanner_image = checkIndex($data, "aboutBanner_image");
    $aboutBanner->aboutBanner_category = checkIndex($data, "aboutBanner_category");
    $aboutBanner->aboutBanner_description = checkIndex($data, "aboutBanner_description");
    $aboutBanner->aboutBanner_publish_date = checkIndex($data, "aboutBanner_publish_date");
    $aboutBanner->aboutBanner_datetime = date("Y-m-d H:i:s");
    checkId($aboutBanner->aboutBanner_aid);
    /* $aboutBanner_title_old = checkIndex($data, "aboutBanner_title_old");
    comparetitle($aboutBanner, $aboutBanner_title_old, $aboutBanner->aboutBanner_title); */
    $query = checkUpdate($aboutBanner);
    returnSuccess($aboutBanner, "aboutBanner", $query);
}

checkEndpoint();