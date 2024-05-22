<?php
$conn = null;
$conn = checkDbConnection();
$message = new Message($conn);
$error = [];
$returnData = [];


if (empty($_GET)) {
    $query = checkReadAll($message);
    http_response_code(200);
    getQueriedData($query);
}

checkEndpoint();