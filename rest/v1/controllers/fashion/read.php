<?php
$conn = null;
$conn = checkDbConnection();
$fashion = new Fashion($conn);
$error = [];
$returnData = [];


if (empty($_GET)) {
    $query = checkReadAll($fashion);
    http_response_code(200);
    getQueriedData($query);
}

checkEndpoint();