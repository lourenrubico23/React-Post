<?php
require '../../core/header.php';
require '../../core/functions.php';
require '../../models/AboutBanner.php';

$conn = null;
$conn = checkDbConnection();

$aboutBanner = new AboutBanner($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);


if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    if (array_key_exists("aboutBannerid", $_GET)) {

        checkPayload($data);
        $aboutBanner->aboutBanner_aid = $_GET['aboutBannerid'];
        $aboutBanner->aboutBanner_is_active = trim($data["isActive"]);
        $aboutBanner->aboutBanner_datetime = date("Y-m-d H:i:s");
        checkId($aboutBanner->aboutBanner_aid);
        $query = checkActive($aboutBanner);
        http_response_code(200);
        returnSuccess($aboutBanner, "aboutBanner", $query);
    }
    checkEndpoint();
}

http_response_code(200);
// header('HTTP/1.0 401 Unauthorized');
checkAccess();