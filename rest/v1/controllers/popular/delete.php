<?php
$conn = null;
$conn = checkDbConnection();
$popular = new Popular($conn);

$error = [];
$returnData = [];
if (array_key_exists("popularid", $_GET)) {
    $popular->popular_aid = $_GET['popularid'];
    checkId($popular->popular_aid);

    $query = checkDelete($popular);
    returnSuccess($popular, "popular", $query);
}

checkEndpoint();