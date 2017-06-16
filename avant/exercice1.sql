SELECT *
FROM articles AS a
LEFT OUTER JOIN users AS u ON a.id_user = u.id
WHERE a.id = 10;