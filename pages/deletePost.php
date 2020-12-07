<?php
session_start();
if(!isset($_SESSION["user"])) { //if user is not connected, he cannot delete a post
    header("Location: /pages/login.php");
}

if (!isset($_GET["id"])) //If no id is specified in url, we redirect to index page
{
    echo "Invalid id";
    exit();
}

$postId = $_GET["id"];

    require_once "../library/functions.php";
$dbh = connect();

echo deletePost($postId);





