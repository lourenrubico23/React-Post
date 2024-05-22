<?php
$conn = null;
$conn = checkDbConnection();
$aboutBanner = new AboutBanner($conn);
$error = [];
$returnData = [];


if (empty($_GET)) {
    $query = checkReadAll($aboutBanner);
    http_response_code(200);
    getQueriedData($query);
}

checkEndpoint();