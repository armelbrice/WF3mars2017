
--  **************************************
-- Transactions
--  **************************************

-- Une transaction permet de lancer des requêtes, telles que des modifications, et de les annuler si besoin, comme si vous pouviez faire un "CTRL+Z" dans votre base de données.


-- Transaction simple :
START TRANSACTION; -- démarre la transaction
    SELECT * FROM employes; -- pour voir la table avant modification
    UPDATE employes SET prenom = 'ALLO' WHERE id_employes = 739;

ROLLBACK; -- donne l'ordre à MySQL d'annuler la transaction, l'employé reprenant son prénom.

COMMIT; -- valide l'ensemble de la transaction

-- Si on ne fait ni ROLLBACK ni COMMIT avant la déconnexion au SGBD, c'est un ROLLBACK qui s'effectue par défaut.



-- Transaction avancée :
START TRANSACTION;
    SAVEPOINT point1; -- point de sauvagarde appelé point1
    UPDATE employes SET prenom = "julien A" WHERE id_employes = 699;
    SAVEPOINT point2; -- point de sauvagarde appelé point2
    UPDATE employes SET prenom = "julien B" WHERE id_employes = 699;

ROLLBACK TO point2;  -- pour annuler une partie de la transaction : retour au point2 => on garde "julien A" en base

-- ou bien :
ROLLBACK;  -- pour annuler toute la transaction => on garde "julien" en base

-- ou bien :
COMMIT;  -- pour valider les opérations de la transaction => on obtient "julien B" en base