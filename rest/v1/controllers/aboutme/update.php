<?php
$conn = null;
$conn = checkDbConnection();
$aboutme = new Aboutme($conn);
$error = [];
$returnData = [];
if (array_key_exists("aboutmeid", $_GET)) {
    checkPayload($data);
    $aboutme->aboutme_aid = $_GET['aboutmeid'];
    $aboutme->aboutme_description = checkIndex($data, "aboutme_description");
    $aboutme->aboutme_startYear = checkIndex($data, "aboutme_startYear");
    $aboutme->aboutme_endYear = checkIndex($data, "aboutme_endYear");
    $aboutme->aboutme_course = checkIndex($data, "aboutme_course");
    $aboutme->aboutme_school = checkIndex($data, "aboutme_school");
    $aboutme->aboutme_datetime = date("Y-m-d H:i:s");
    checkId($aboutme->aboutme_aid);
    /* $aboutme_title_old = checkIndex($data, "aboutme_title_old");
    comparetitle($aboutme, $aboutme_title_old, $aboutme->aboutme_title); */
    $query = checkUpdate($aboutme);
    returnSuccess($aboutme, "aboutme", $query);
}

checkEndpoint();