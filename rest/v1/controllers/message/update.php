<?php
$conn = null;
$conn = checkDbConnection();
$message = new Message($conn);
$error = [];
$returnData = [];
if (array_key_exists("messageid", $_GET)) {
    checkPayload($data);
    $message->message_name = checkIndex($data, "message_name");
    $message->message_email = checkIndex($data, "message_email");
    $message->message_subject = checkIndex($data, "message_subject");
    $message->message_note = checkIndex($data, "message_note");
    $message->message_publish_date = checkIndex($data, "message_publish_date");
    $message->message_datetime = date("Y-m-d H:i:s");
    checkId($message->message_aid);
    /* $message_title_old = checkIndex($data, "message_title_old");
    comparetitle($message, $message_title_old, $message->message_title); */
    $query = checkUpdate($message);
    returnSuccess($message, "message", $query);
}

checkEndpoint();