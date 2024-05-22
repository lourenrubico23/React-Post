<?php
$conn = null;
$conn = checkDbConnection();
$message = new Message($conn);

$error = [];
$returnData = [];
if (array_key_exists("messageid", $_GET)) {
    $message->message_aid = $_GET['messageid'];
    checkId($message->message_aid);

    $query = checkDelete($message);
    returnSuccess($message, "message", $query);
}

checkEndpoint();