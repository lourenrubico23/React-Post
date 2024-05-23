<?php
$conn = null;
$conn = checkDbConnection();
$feature = new Feature($conn);
$error = [];
$returnData = [];
if (array_key_exists("featureid", $_GET)) {
    checkPayload($data);
    $feature->feature_aid = $_GET['featureid'];
    $feature->feature_title = checkIndex($data, "feature_title");
    $feature->feature_image = checkIndex($data, "feature_image");
    $feature->feature_author = checkIndex($data, "feature_author");
    $feature->feature_category = checkIndex($data, "feature_category");
    $feature->feature_article = checkIndex($data, "feature_article");
    $feature->feature_publish_date = checkIndex($data, "feature_publish_date");
    $feature->feature_datetime = date("Y-m-d H:i:s");
    checkId($feature->feature_aid);
    /* $feature_title_old = checkIndex($data, "feature_title_old");
    comparetitle($feature, $feature_title_old, $feature->feature_title); */
    $query = checkUpdate($feature);
    returnSuccess($feature, "feature", $query);
}

checkEndpoint();