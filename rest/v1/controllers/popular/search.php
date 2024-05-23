<?php
require '../../core/header.php';
require '../../core/functions.php';
require '../../models/Popular.php';
// check database connection
$conn = null;
$conn = checkDbConnection();
// make instance of classes
$popular = new Popular($conn);
// get payload
$body = file_get_contents("php://input");
$data = json_decode($body, true);

// // validate api key
if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    checkPayload($data);
    // get data
    $popular->popular_search = $data["searchValue"];
    checkKeyword($popular->popular_search);
    $query = checkSearch($popular);
    http_response_code(200);
    getQueriedData($query);
    // return 404 error if endpoint not available
    checkEndpoint();
}

http_response_code(200);
// when authentication is cancelled
// header('HTTP/1.0 401 Unauthorized');
checkAccess();