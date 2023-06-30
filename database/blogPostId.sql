SELECT articles.title,
       date_format(articles.date_start, '%d/%m/%Y'),
       authors.pseudonyme
FROM articles
         INNER JOIN authors ON authors.id = articles.authors_id
WHERE articles.id = ?;