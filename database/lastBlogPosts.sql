SELECT articles.title,
       articles.id,
       date_format(articles.date_start, '%d/%m/%Y') AS datef,
       authors.pseudonyme,
       articles_categories.categories_id
FROM articles
         INNER JOIN authors ON authors.id = articles.authors_id
        INNER JOIN articles_categories ON articles_categories.articles_id = articles.id
WHERE
   articles.date_start <= NOW()
AND
    articles.date_end >= NOW()
AND
    articles_categories.categories_id = ?
ORDER BY date_start DESC LIMIT 10;