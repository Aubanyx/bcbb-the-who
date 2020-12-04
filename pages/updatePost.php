<?php
session_start();
if(!isset($_SESSION["user"])) { //if user is not connected, he cannot delete a post
    header("Location: /pages/login.php");
}
extract($_POST);

if (!isset($postId))
{
    echo "Invalid post id";
    exit();
}

if (!isset($topicId))
{
    echo "Invalid topic id";
    exit();
}
if (!isset($postContent))
{
    echo "Invalid post content";
    exit();
}

require_once "../library/functions.php";
$dbh = connect();

$result = updatePostContent($postId, $postContent);

if($result == "")
{
    header("Location: /pages/topicRead.php?id=" . $topicId);
}






