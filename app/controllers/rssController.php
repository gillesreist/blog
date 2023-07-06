<?php

require "app/persistences/blogPostData.php";

$rss = getRSS();


header( "Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>le super blog | RSS</title>
 <link>local.blog</link>
 <description>Le RSS du super blog</description>
 <language>fr</language>";

foreach($rss as $flux){
    $title=$flux["title"];
    $id=$flux["id"];
    $description=$flux["text"];

    echo '<item>
   <title>'.htmlspecialchars($title).'</title>
   <link>http://blog.local?action=blogPost&id=$id</link>
   <description>'.htmlspecialchars($description).'</description>
   </item>';
}
echo "</channel></rss>";
