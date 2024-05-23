<?php
$conn = null;
$conn = checkDbConnection();
$fashion = new Fashion($conn);

$error = [];
$returnData = [];
if (array_key_exists("fashionid", $_GET)) {
    $fashion->fashion_aid = $_GET['fashionid'];
    checkId($fashion->fashion_aid);

    $query = checkDelete($fashion);
    returnSuccess($fashion, "fashion", $query);
}

checkEndpoint();