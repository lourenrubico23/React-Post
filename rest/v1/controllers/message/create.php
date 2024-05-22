<?php
$conn = null;
$conn = checkDbConnection();
$message = new Message($conn);
if (array_key_exists("messageid", $_GET)) {
    checkEndpoint();
}
checkPayload($data);
$message->message_name = checkIndex($data, "message_name");
$message->message_email = checkIndex($data, "message_email");
$message->message_subject = checkIndex($data, "message_subject");
$message->message_note = checkIndex($data, "message_note");
$message->message_publish_date = checkIndex($data, "message_publish_date");
$message->message_is_active = 1;
$message->message_created = date("Y-m-d H:i:s");
$message->message_datetime = date("Y-m-d H:i:s");

/* isNameExist($skills, $skills->skills_title); */

$query = checkCreate($message);
returnSuccess($message, "message", $query);