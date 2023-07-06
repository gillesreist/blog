<?php
header("Content-Type: text/html;charset=utf-8");
require "config/database.php";

function login(string $pseudo):array|bool {
    global $pdo;
    $sql = "SELECT * FROM authors WHERE pseudonyme=?";
    $result = $pdo->prepare($sql);
    $result->execute([$pseudo]);
    return $result->fetch(PDO::FETCH_ASSOC);
}

function lastBlogPosts(int $cat=0): array
{
    global $pdo;
    if ($cat==0) {
        $sql = file_get_contents('database/lastBlogPostsNoCat.sql');
        $data = $pdo->prepare($sql);
        $data->execute();
    } else {
        $sql = file_get_contents('database/lastBlogPosts.sql');
        $data = $pdo->prepare($sql);
        $data->execute([$cat]);
    }
    return $data->fetchAll(PDO::FETCH_ASSOC);
}

function postCats(int $articleId): array
{
    global $pdo;
    $sql = "SELECT categories.name FROM `articles_categories` INNER JOIN categories ON categories.id = categories_id WHERE `articles_id` = ?;";
    $data = $pdo->prepare($sql);
    $data->execute([$articleId]);
    return $data->fetchAll(PDO::FETCH_ASSOC);
}

function blogPostById(int $articleID): array|bool
{
    global $pdo;
    $sql = file_get_contents('database/blogPostId.sql');
    $data = $pdo->prepare($sql);
    $data->execute([$articleID]);
    return $data->fetch(PDO::FETCH_ASSOC);
}

function commentsByBlogPost(int $articleID): array
{
    global $pdo;
    $sql = file_get_contents('database/commentsByBlogPost.sql');
    $data = $pdo->prepare($sql);
    $data->execute([$articleID]);
    return $data->fetchAll(PDO::FETCH_ASSOC);
}

function catList(): array
{
    global $pdo;
    $sql = "SELECT * FROM categories";
    $data = $pdo->prepare($sql);
    $data->execute();
    return $data->fetchAll(PDO::FETCH_ASSOC);
}

function blogPostCreate(string $title, string $text, string $date_start, string $date_end, int $importance, int $categorie1, int $categorie2, int $categorie3): int
{
    global $pdo;

    $sql = "INSERT INTO articles (title, text, date_start, date_end, importance, authors_id) VALUES (:title, :text, :date_start, :date_end, :importance, :authors_id)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['title' => $title, 'text' => $text, 'date_start' => $date_start, 'date_end' => $date_end, 'importance' => $importance, 'authors_id' => $authors_id]);
    $id = $pdo->lastInsertId();

    $categories = [
        $categorie1,
        $categorie2,
        $categorie3
    ];

    foreach ($categories as $categorie) {
        if (!empty($categorie)) {
            $sql = "INSERT INTO articles_categories (articles_id, categories_id) VALUES (:articles_id, :categories_id)";
            $statement = $pdo->prepare($sql);
            $statement->execute(['articles_id' => $id, 'categories_id' => $categorie]);
        }
    }

    return $id;
}

function blogPostUpdate(string $title, string $text, string $date_start, string $date_end, int $importance, int $id): void
{
    global $pdo;

    $sql = "UPDATE articles SET title=:title, text=:text, date_start=:date_start, date_end=:date_end, importance=:importance WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['title' => $title, 'text' => $text, 'date_start' => $date_start, 'date_end' => $date_end, 'importance' => $importance, 'id' => $id]);

}

function blogPostDelete(int $id): void
{
    global $pdo;

    $sql = "DELETE FROM comments WHERE articles_id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);

    $sql = "DELETE FROM articles_categories WHERE articles_id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);

    $sql = "DELETE FROM articles WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->execute(['id' => $id]);
}