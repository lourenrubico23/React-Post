<?php
$conn = null;
$conn = checkDbConnection();
$aboutBanner = new AboutBanner($conn);

$error = [];
$returnData = [];
if (array_key_exists("aboutBannerid", $_GET)) {
    $aboutBanner->aboutBanner_aid = $_GET['aboutBannerid'];
    checkId($aboutBanner->aboutBanner_aid);

    $query = checkDelete($aboutBanner);
    returnSuccess($aboutBanner, "aboutBanner", $query);
}

checkEndpoint();