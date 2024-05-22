<?php
require '../../core/header.php';
require '../../core/functions.php';
require '../../models/Message.php';

$conn = null;
$conn = checkDbConnection();

$message = new Message($conn);

$body = file_get_contents("php://input");
$data = json_decode($body, true);


if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    checkApiKey();
    if (array_key_exists("messageid", $_GET)) {

        checkPayload($data);
        $message->message_aid = $_GET['messageid'];
        $message->message_is_active = trim($data["isActive"]);
        $message->message_datetime = date("Y-m-d H:i:s");
        checkId($message->message_aid);
        $query = checkActive($message);
        http_response_code(200);
        returnSuccess($message, "message", $query);
    }
    checkEndpoint();
}

http_response_code(200);
// header('HTTP/1.0 401 Unauthorized');
checkAccess();