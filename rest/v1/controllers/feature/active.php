<?php
require '../../core/header.php';
require '../../core/functions.php';
require '../../models/Feature.php';

$conn = null;
$conn = checkDbConnection();

$feature = new Feature($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);


if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    if (array_key_exists("featureid", $_GET)) {

        checkPayload($data);
        $feature->feature_aid = $_GET['featureid'];
        $feature->feature_is_active = trim($data["isActive"]);
        $feature->feature_datetime = date("Y-m-d H:i:s");
        checkId($feature->feature_aid);
        $query = checkActive($feature);
        http_response_code(200);
        returnSuccess($feature, "feature", $query);
    }
    checkEndpoint();
}

http_response_code(200);
// header('HTTP/1.0 401 Unauthorized');
checkAccess();