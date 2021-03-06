--  *****************************
-- Création de la BDD
--  *****************************

CREATE DATABASE bibliotheque;
USE bibliotheque;

--  copie/colle le contenu de bibliotheque.sql dans la console


-- *****************************************
--Exercices
-- *****************************************

--1. Quel est l'id_abonne de Laura ?
SELECT id_abonne  FROM abonne WHERE prenom = "Laura";

--2. L'abonné d'id_abonne 2 est venu emprunter un livre à quelles dates ?
SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

--3. Combien d'emprunts ont été effectués en tout ?
SELECT COUNT(id_emprunt) FROM emprunt;

--4. Combien de livres sont sortis le 2011-12-19 ?
SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie = '2011-12-19';

--5. Une Vie est de quel auteur ?
SELECT auteur FROM livre WHERE titre = 'UNE Vie';

--6. De combien de livres d'Alexandre Dumas dispose-t-on ?
SELECT COUNT(id_livres) FROM livre WHERE auteur = 'Alexandre Dumas';

--7. Quel id_livre est le plus emprunté ?
SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1;

--8. Quel id_abonne emprunte le plus de livres ?


SELECT id_abonne, COUNT(id_abonne) FROM emprunt GROUP BY id_abonne ORDER BY COUNT (id_abonne) DESC LIMIT 1;
SELECT id_abonne, COUNT(id_emprunt) FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1; --on peut se passer du 1er count et garder seulement order by count



--  ******************************************
-- Requêtes imbriquées
--  ******************************************
-- Syntaxe "aide mémoire" de la requête imbriquée:
-- SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

-- Afin de réaliser une requête imbriquée, il faut obligatoirement un champ en COMMUN entre les 2 tables

-- Un champ NULL se teste avec IS NULL :
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- Affiche les id_livre non rendus

-- Afficher les titres de ces livres non rendus
SELECT Titre FROM livre WHERE id_livre IN
       (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);


-- Afficher le n° des livres que Chloé a emprunté
SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'); -- quand il n'y a qu'un seul résultat dans la requête imbriquée, on met un signe "="


-- EXERCICE: Afficher le prénom des abonnés ayant emprunté un livre le 19-12-2011

SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = '2011-12-19');

-- EXERCICE : Afficher le prénom des abonnés ayant emprunté un livre d'Alphonse Daudet

SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN ( SELECT id_livre FROM livre WHERE auteur = 'ALPHONSE DAUDET'));

-- EXERCICE : Afficher le ou les titres de livre que chloé a emprunté
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'));

-- Afficher le ou les titres de livre que Chloé n'a pas encore rendu
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN (SELECT id_abonne WHERE prenom = 'chloe'));

-- EXERCICE : Combien de livres Benoit a emprunté ?
SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Benoit');

-- EXERCICE : Qui (prénom) a emprunté le plus de livres ?
SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1); -- remarque : on ne peut pas utiliser LIMIT dans IN mais obligatoirement dans un "="




--  ***************************************
--  Jointures internes
--  ***************************************

-- Différence entre une jointure et une requête imbriquée : une requête imbriquée est possible seulement dans le cas où les champs affichés (ceux qui sont dans le SELECT) sont issus de la même table.
-- Avec une requête de jointure, les champs sélectionnés peuvent être issus de tables différentes. Une jointure est une requête permettant de faire des relations entre les différentes tables afin d'avoir des colonnes ASSOCIEES qui ne forment qu'un seul résultat.

-- Afficher les dates de sortie et de rendu pour l'abonné Guillaume :
SELECT a.prenom, e.date_sortie, e.date_rendu
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
WHERE a.prenom = 'Guillaume';

-- 1ère ligne : ce que je souhaite afficher
-- 2ème ligne : la 1ère table d'où proviennent les informations
-- 3ème ligne : la 2ème table d'où proviennent les informations
-- 4ème ligne : La jointure qui lie les 2 tables avec le champ COMMUN
-- 5ème ligne : la ou les conditions supplémentaires


-- EXERCICE : nous aimerions connaître les mouvements des livres (titre, date_sortie, date_rendu) écrits par Alphonse Daudet :

SELECT l.titre, e.date_sortie, e.date_rendu
FROM livre l
INNER JOIN emprunt e
ON l.id_livre = e.id_livre
WHERE l.auteur = 'Alphonse Daudet';


-- EXERCICE : qui a emprunté "Une Vie" sur l'année 2011 ?
SELECT a.prenom, a.id_abonne
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON e.id_livre = l.id_livre
WHERE l.titre = 'Une Vie' AND e.date_sortie BETWEEN '2011-01-01' AND '2011-12-31';

-- EXERCICE : Afficher le nombre de livres empruntés par chaque abonné
SELECT a.prenom, COUNT(e.id_emprunt) AS nombre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
GROUP BY a.prenom;  

-- EXERCICE : afficher qui a emprunté quel livre et à quelle date de sortie ? (prénom, date sortie, titre)
SELECT a.prenom, e.date_sortie, l.titre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON e.id_livre = l.id_livre;  -- Ici pas de GROUP BY car il est normal que les prénoms sortent plusieurs fois (ils peuvent emprunter plusieurs livres)

-- EXERCICE : afficher les prénoms des abonnés avec les id_livre qu'ils ont empruntés
SELECT a.prenom, e.id_livre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne;



--  ********************************
--  Jointures externes
--  ********************************

--  Une jointure externe permet de faire des requêtes sans correspondance exigée entre les valeurs requêtées.

-- Ajoutez vous dans la table abonne :
INSERT INTO abonne (prenom) VALUES('moi');

-- Si on relance la dernière requête de jointure interne, nous n'apparaissons pas dans la liste, car nous n'avons pas emprunter de livre.
-- Pour y rémédier nous faisons une jointure externe :
SELECT a.prenom, e.id_livre
FROM abonne a
LEFT JOIN emprunt e
ON a.id_abonne = e.id_abonne;
-- La clause LEFT JOIN permet de rapatrier toutes les données dans la table considérées comme étant à gauche de l'instruction LEFT JOIN (donc abonne dans notre cas), sans correspondance exigée dans l'autre table (emprunt ici).

-- Voici le cas avec un livre supprimé de la bibliothèque :
DELETE FROM livre WHERE id_livre = 100;

-- On visualise les emprunts avec une jointure interne :
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt 
INNER JOIN livre
ON emprunt.id_livre = livre.id_livre;
-- On ne voit pas dans cette requête le livre "Une Vie" qui a été supprimé

-- On fait la même chose avec une jointure externe :
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt 
LEFT JOIN livre
ON emprunt.id_livre = livre.id_livre;
-- Ici tous les emprunts sont affichés, y compris ceux pour lesquels les titres sont supprimés et remplacés par NULL.




--  *************************************
--  Union
--  *************************************

-- Union permet de fusionner le résultat de 2 requêtes dans la même liste de résultat.

-- Exemple : Si on désinscrit Guillaume ( suppression du profil de la table abonne), on peut afficher à la fois tous les livres empruntés, y compris ceux par des lecteurs désinscrits ( on affiche NULL à la place de Guillaume), et tous les abonnés, y compris ceux qui n'ont rien emprunté (on affiche NULL dans id_livre pour l'abonné 'moi').

-- Suppression du profil de Guillaume :
DELETE FROM abonne WHERE id_abonne = 1;

-- Requête sur les livres empruntés avec UNION :
(SELECT abonne.prenom, emprunt.id_livre
FROM abonne
LEFT JOIN emprunt
ON abonne.id_abonne = emprunt.id_abonne)
UNION
(SELECT abonne.prenom, emprunt.id_livre
FROM abonne
RIGHT JOIN emprunt
ON abonne.id_abonne = emprunt.id_abonne);







 

           