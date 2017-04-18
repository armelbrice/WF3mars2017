
--  ********************************
--  Les variables en SQL
--  ********************************

--  Une variable est un espace mémoire nommé qui permet de conserver une valeur.

-- permet d'observer les variables systèmes :
SHOW VARIABLES;

SELECT @@version;  -- on met deux @ pour accéder à une variable systèmes

-- Déterminer nos propres variables  :
SET @ecole = 'WF3';  -- déclare une vraible ecole et lui affecte la valeur 'WF3'
SELECT @ecole; -- on peut accéder au contenu de cette variable par son nom
