<?php
$conn = null;
$conn = checkDbConnection();
$feature = new Feature($conn);
$error = [];
$returnData = [];


if (empty($_GET)) {
    $query = checkReadAll($feature);
    http_response_code(200);
    getQueriedData($query);
}

checkEndpoint();