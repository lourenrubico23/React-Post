<?php
$conn = null;
$conn = checkDbConnection();
$popular = new Popular($conn);
if (array_key_exists("popularid", $_GET)) {
    checkEndpoint();
}
checkPayload($data);
$popular->popular_title = checkIndex($data, "popular_title");
$popular->popular_image = checkIndex($data, "popular_image");
$popular->popular_author = checkIndex($data, "popular_author");
$popular->popular_category = checkIndex($data, "popular_category");
$popular->popular_article = checkIndex($data, "popular_article");
$popular->popular_publish_date = checkIndex($data, "popular_publish_date");
$popular->popular_is_active = 1;
$popular->popular_created = date("Y-m-d H:i:s");
$popular->popular_datetime = date("Y-m-d H:i:s");

/* isNameExist($popular, $popular->popular_title); */

$query = checkCreate($popular);
returnSuccess($popular, "popular", $query);