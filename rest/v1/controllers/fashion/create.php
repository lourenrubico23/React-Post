<?php
$conn = null;
$conn = checkDbConnection();
$fashion = new Fashion($conn);
if (array_key_exists("fashionid", $_GET)) {
    checkEndpoint();
}
checkPayload($data);
$fashion->fashion_title = checkIndex($data, "fashion_title");
$fashion->fashion_image = checkIndex($data, "fashion_image");
$fashion->fashion_author = checkIndex($data, "fashion_author");
$fashion->fashion_category = checkIndex($data, "fashion_category");
$fashion->fashion_article = checkIndex($data, "fashion_article");
$fashion->fashion_publish_date = checkIndex($data, "fashion_publish_date");
$fashion->fashion_is_active = 1;
$fashion->fashion_created = date("Y-m-d H:i:s");
$fashion->fashion_datetime = date("Y-m-d H:i:s");

/* isNameExist($fashion, $fashion->fashion_title); */

$query = checkCreate($fashion);
returnSuccess($fashion, "fashion", $query);