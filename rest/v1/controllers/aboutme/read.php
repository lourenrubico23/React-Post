<?php
$conn = null;
$conn = checkDbConnection();
$aboutme = new Aboutme($conn);
$error = [];
$returnData = [];


if (empty($_GET)) {
    $query = checkReadAll($aboutme);
    http_response_code(200);
    getQueriedData($query);
}

checkEndpoint();