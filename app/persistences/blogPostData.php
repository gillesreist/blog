<?php

require "config/database.php";

function lastBlogPosts():array
{
    global $pdo;
    $sql = file_get_contents('database/lastBlogPosts.sql');
    $data = $pdo->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function blogPostById(int $articleID):array
{
    global $pdo;
    $sql = file_get_contents('database/blogPostId.sql');
    $data = $pdo->prepare($sql);
    $data->execute([$articleID]);
    $result = $data->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function commentsByBlogPost(int $articleID):array
{
    global $pdo;
    $sql = file_get_contents('database/commentsByBlogPost.sql');
    $data = $pdo->prepare($sql);
    $data->execute([$articleID]);
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function blogPostCreate(string $title, string $text, string $date_start, string $date_end, int $importance, int $authors_id):void
{
    global $pdo;

    $sql = "INSERT INTO articles (title, text, date_start, date_end, importance, authors_id) VALUES (:title, :text, :date_start, :date_end, :importance, :authors_id)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['title' => $title, 'text' => $text, 'date_start'=>$date_start,'date_end'=>$date_end,'importance'=>$importance,'authors_id'=>$authors_id]);

}