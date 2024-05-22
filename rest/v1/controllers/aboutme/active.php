<?php
require '../../core/header.php';
require '../../core/functions.php';
require '../../models/Aboutme.php';

$conn = null;
$conn = checkDbConnection();

$aboutme = new Aboutme($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);


if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    if (array_key_exists("aboutmeid", $_GET)) {

        checkPayload($data);
        $aboutme->aboutme_aid = $_GET['aboutmeid'];
        $aboutme->aboutme_is_active = trim($data["isActive"]);
        $aboutme->aboutme_datetime = date("Y-m-d H:i:s");
        checkId($aboutme->aboutme_aid);
        $query = checkActive($aboutme);
        http_response_code(200);
        returnSuccess($aboutme, "aboutme", $query);
    }
    checkEndpoint();
}

http_response_code(200);
// header('HTTP/1.0 401 Unauthorized');
checkAccess();