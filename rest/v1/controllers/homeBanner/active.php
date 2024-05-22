<?php
require '../../core/header.php';
require '../../core/functions.php';
require '../../models/HomeBanner.php';

$conn = null;
$conn = checkDbConnection();

$homeBanner = new HomeBanner($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);


if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    if (array_key_exists("homeBannerid", $_GET)) {

        checkPayload($data);
        $homeBanner->homeBanner_aid = $_GET['homeBannerid'];
        $homeBanner->homeBanner_is_active = trim($data["isActive"]);
        $homeBanner->homeBanner_datetime = date("Y-m-d H:i:s");
        checkId($homeBanner->homeBanner_aid);
        $query = checkActive($homeBanner);
        http_response_code(200);
        returnSuccess($homeBanner, "homeBanner", $query);
    }
    checkEndpoint();
}

http_response_code(200);
// header('HTTP/1.0 401 Unauthorized');
checkAccess();