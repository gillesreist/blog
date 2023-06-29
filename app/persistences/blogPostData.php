<?php
function lastBlogPosts($bdd)
{
    $sql = file_get_contents('database/lastBlogPosts.sql');
    $result = $bdd->query($sql);
    return $result;
}