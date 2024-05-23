<?php
$conn = null;
$conn = checkDbConnection();
$popular = new Popular($conn);
$error = [];
$returnData = [];
if (array_key_exists("popularid", $_GET)) {
    checkPayload($data);
    $popular->popular_aid = $_GET['popularid'];
    $popular->popular_title = checkIndex($data, "popular_title");
    $popular->popular_image = checkIndex($data, "popular_image");
    $popular->popular_author = checkIndex($data, "popular_author");
    $popular->popular_category = checkIndex($data, "popular_category");
    $popular->popular_article = checkIndex($data, "popular_article");
    $popular->popular_publish_date = checkIndex($data, "popular_publish_date");
    $popular->popular_datetime = date("Y-m-d H:i:s");
    checkId($popular->popular_aid);
    /* $popular_title_old = checkIndex($data, "popular_title_old");
    comparetitle($popular, $popular_title_old, $popular->popular_title); */
    $query = checkUpdate($popular);
    returnSuccess($popular, "popular", $query);
}

checkEndpoint();