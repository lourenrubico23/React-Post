<?php
$conn = null;
$conn = checkDbConnection();
$feature = new Feature($conn);
if (array_key_exists("featureid", $_GET)) {
    checkEndpoint();
}
checkPayload($data);
$feature->feature_title = checkIndex($data, "feature_title");
$feature->feature_image = checkIndex($data, "feature_image");
$feature->feature_author = checkIndex($data, "feature_author");
$feature->feature_category = checkIndex($data, "feature_category");
$feature->feature_article = checkIndex($data, "feature_article");
$feature->feature_publish_date = checkIndex($data, "feature_publish_date");
$feature->feature_is_active = 1;
$feature->feature_created = date("Y-m-d H:i:s");
$feature->feature_datetime = date("Y-m-d H:i:s");

/* isNameExist($feature, $feature->feature_title); */

$query = checkCreate($feature);
returnSuccess($feature, "feature", $query);