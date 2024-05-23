<?php
require '../../core/header.php';
require '../../core/functions.php';
require '../../models/Popular.php';

$conn = null;
$conn = checkDbConnection();

$popular = new Popular($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);


if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    if (array_key_exists("popularid", $_GET)) {

        checkPayload($data);
        $popular->popular_aid = $_GET['popularid'];
        $popular->popular_is_active = trim($data["isActive"]);
        $popular->popular_datetime = date("Y-m-d H:i:s");
        checkId($popular->popular_aid);
        $query = checkActive($popular);
        http_response_code(200);
        returnSuccess($popular, "popular", $query);
    }
    checkEndpoint();
}

http_response_code(200);
// header('HTTP/1.0 401 Unauthorized');
checkAccess();