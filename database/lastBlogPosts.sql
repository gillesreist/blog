SELECT articles.title,
       articles.id,
       date_format(articles.date_start, '%d/%m/%Y') AS datef,
       authors.pseudonyme
FROM articles
         INNER JOIN authors ON authors.id = articles.authors_id
WHERE
   articles.date_start <= NOW()
AND
    articles.date_end >= NOW()
ORDER BY date_start DESC LIMIT 10;