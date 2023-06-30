<?php

require "config/database.php";

function lastBlogPosts()
{
    global $pdo;
    $sql = file_get_contents('database/lastBlogPosts.sql');
    $data = $pdo->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function blogPostById($articleID)
{
    global $pdo;
    $sql = file_get_contents('database/blogPostId.sql');
    $data = $pdo->prepare($sql);
    $data->execute([$articleID]);
    $result = $data->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function commentsByBlogPost($articleID)
{
    global $pdo;
    $sql = file_get_contents('database/commentsByBlogPost.sql');
    $data = $pdo->prepare($sql);
    $data->execute([$articleID]);
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}