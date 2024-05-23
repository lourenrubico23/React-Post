<?php
require '../../core/header.php';
require '../../core/functions.php';
require '../../models/Fashion.php';

$conn = null;
$conn = checkDbConnection();

$fashion = new Fashion($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);


if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    if (array_key_exists("fashionid", $_GET)) {

        checkPayload($data);
        $fashion->fashion_aid = $_GET['fashionid'];
        $fashion->fashion_is_active = trim($data["isActive"]);
        $fashion->fashion_datetime = date("Y-m-d H:i:s");
        checkId($fashion->fashion_aid);
        $query = checkActive($fashion);
        http_response_code(200);
        returnSuccess($fashion, "fashion", $query);
    }
    checkEndpoint();
}

http_response_code(200);
// header('HTTP/1.0 401 Unauthorized');
checkAccess();