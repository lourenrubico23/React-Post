<?php
$conn = null;
$conn = checkDbConnection();
$homeBanner = new HomeBanner($conn);
if (array_key_exists("homeBannerid", $_GET)) {
    checkEndpoint();
}
checkPayload($data);
$homeBanner->homeBanner_title = checkIndex($data, "homeBanner_title");
$homeBanner->homeBanner_image = checkIndex($data, "homeBanner_image");
$homeBanner->homeBanner_category = checkIndex($data, "homeBanner_category");
$homeBanner->homeBanner_description = checkIndex($data, "homeBanner_description");
$homeBanner->homeBanner_publish_date = checkIndex($data, "homeBanner_publish_date");
$homeBanner->homeBanner_is_active = 1;
$homeBanner->homeBanner_created = date("Y-m-d H:i:s");
$homeBanner->homeBanner_datetime = date("Y-m-d H:i:s");

/* isNameExist($homeBanner, $homeBanner->homeBanner_title); */

$query = checkCreate($homeBanner);
returnSuccess($homeBanner, "homeBanner", $query);