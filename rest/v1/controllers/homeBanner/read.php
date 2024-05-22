<?php
$conn = null;
$conn = checkDbConnection();
$homeBanner = new HomeBanner($conn);
$error = [];
$returnData = [];


if (empty($_GET)) {
    $query = checkReadAll($homeBanner);
    http_response_code(200);
    getQueriedData($query);
}

checkEndpoint();