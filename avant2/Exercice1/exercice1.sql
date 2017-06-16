SELECT a.id, a.title, a.content, a.picture, a.date_publish, u.firstname, u.lastname
FROM articles a LEFT JOIN users u
ON a.id_user = u.id
WHERE a.id=10;