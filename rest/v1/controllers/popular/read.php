<?php
$conn = null;
$conn = checkDbConnection();
$popular = new Popular($conn);
$error = [];
$returnData = [];


if (empty($_GET)) {
    $query = checkReadAll($popular);
    http_response_code(200);
    getQueriedData($query);
}

checkEndpoint();