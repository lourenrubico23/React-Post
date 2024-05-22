<?php
$conn = null;
$conn = checkDbConnection();
$aboutBanner = new AboutBanner($conn);
if (array_key_exists("aboutBannerid", $_GET)) {
    checkEndpoint();
}
checkPayload($data);
$aboutBanner->aboutBanner_title = checkIndex($data, "aboutBanner_title");
$aboutBanner->aboutBanner_image = checkIndex($data, "aboutBanner_image");
$aboutBanner->aboutBanner_category = checkIndex($data, "aboutBanner_category");
$aboutBanner->aboutBanner_description = checkIndex($data, "aboutBanner_description");
$aboutBanner->aboutBanner_publish_date = checkIndex($data, "aboutBanner_publish_date");
$aboutBanner->aboutBanner_is_active = 1;
$aboutBanner->aboutBanner_created = date("Y-m-d H:i:s");
$aboutBanner->aboutBanner_datetime = date("Y-m-d H:i:s");

/* isNameExist($aboutBanner, $aboutBanner->aboutBanner_title); */

$query = checkCreate($aboutBanner);
returnSuccess($aboutBanner, "aboutBanner", $query);