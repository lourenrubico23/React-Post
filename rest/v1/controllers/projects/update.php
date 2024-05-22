<?php
$conn = null;
$conn = checkDbConnection();
$projects = new Projects($conn);
$error = [];
$returnData = [];
if (array_key_exists("projectsid", $_GET)) {
    checkPayload($data);
    $projects->projects_aid = $_GET['projectsid'];
    $projects->projects_title = checkIndex($data, "projects_title");
    $projects->projects_image = checkIndex($data, "projects_image");
    $projects->projects_category = checkIndex($data, "projects_category");
    $projects->projects_description = checkIndex($data, "projects_description");
    $projects->projects_publish_date = checkIndex($data, "projects_publish_date");
    $projects->projects_datetime = date("Y-m-d H:i:s");
    checkId($projects->projects_aid);
    /* $projects_title_old = checkIndex($data, "projects_title_old");
    comparetitle($projects, $projects_title_old, $projects->projects_title); */
    $query = checkUpdate($projects);
    returnSuccess($projects, "projects", $query);
}

checkEndpoint();