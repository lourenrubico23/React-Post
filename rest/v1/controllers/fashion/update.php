<?php
$conn = null;
$conn = checkDbConnection();
$fashion = new Fashion($conn);
$error = [];
$returnData = [];
if (array_key_exists("fashionid", $_GET)) {
    checkPayload($data);
    $fashion->fashion_aid = $_GET['fashionid'];
    $fashion->fashion_title = checkIndex($data, "fashion_title");
    $fashion->fashion_image = checkIndex($data, "fashion_image");
    $fashion->fashion_author = checkIndex($data, "fashion_author");
    $fashion->fashion_category = checkIndex($data, "fashion_category");
    $fashion->fashion_article = checkIndex($data, "fashion_article");
    $fashion->fashion_publish_date = checkIndex($data, "fashion_publish_date");
    $fashion->fashion_datetime = date("Y-m-d H:i:s");
    checkId($fashion->fashion_aid);
    /* $fashion_title_old = checkIndex($data, "fashion_title_old");
    comparetitle($fashion, $fashion_title_old, $fashion->fashion_title); */
    $query = checkUpdate($fashion);
    returnSuccess($fashion, "fashion", $query);
}

checkEndpoint();