<?php
$conn = null;
$conn = checkDbConnection();
$feature = new Feature($conn);

$error = [];
$returnData = [];
if (array_key_exists("featureid", $_GET)) {
    $feature->feature_aid = $_GET['featureid'];
    checkId($feature->feature_aid);

    $query = checkDelete($feature);
    returnSuccess($feature, "feature", $query);
}

checkEndpoint();