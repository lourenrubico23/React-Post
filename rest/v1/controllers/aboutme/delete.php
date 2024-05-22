<?php
$conn = null;
$conn = checkDbConnection();
$aboutme = new Aboutme($conn);

$error = [];
$returnData = [];
if (array_key_exists("aboutmeid", $_GET)) {
    $aboutme->aboutme_aid = $_GET['aboutmeid'];
    checkId($aboutme->aboutme_aid);

    $query = checkDelete($aboutme);
    returnSuccess($aboutme, "aboutme", $query);
}

checkEndpoint();