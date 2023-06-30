SELECT comments.text,
       date_format(comments.date, '%d/%m/%Y'),
       authors.pseudonyme
FROM comments
         INNER JOIN authors ON authors.id = comments.authors_id
WHERE comments.articles_id = ?;