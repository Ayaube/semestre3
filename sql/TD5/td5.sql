
SET search_path TO lire;


-- Question 1 ------------------------------------------------------------------------------------------------

-- Session A

        INSERT INTO lecteur (nom) VALUES ('Ayoub');  -- Ajout nouveau lecteur
        UPDATE livre SET lecteur_id = (SELECT MAX(num_lecteur) FROM lecteur) WHERE num_livre = 6;  -- J'emprunte le livre 6


-- Question 2 ------------------------------------------------------------------------------------------------

        -- Session B
        SELECT * FROM infos;  
        -- Les modifications de la session A ne sont pas visibles ici


-- Question 3 ------------------------------------------------------------------------------------------------

        -- Session A
        COMMIT;  -- On commit

        -- Session B
        SELECT * FROM infos;  
        -- Maintenant, on voit les modifs effectuées 


-- Question 4 --------------------------------------------------------------------------------------------------

        -- Session A
        INSERT INTO lecteur (nom) VALUES ('Horeb Silva');
        INSERT INTO lecteur (nom) VALUES ('Lamine');


-- Question 5 --------------------------------------------------------------------------------------------------

        -- Les modifications ne seront pas prises en compte tant que l'on a pas commit


-- Question 6 --------------------------------------------------------------------------------------------------

        -- Session A
        ROLLBACK;  -- Annule la transaction

        -- Session B
        SELECT * FROM lecteur;  -- Les deux nouveaux lecteurs ne seront pas présents

-- Question 7 --------------------------------------------------------------------------------------------------

        -- On a donc vu que les transactions pouvaients travailler en deux temps, d'abord une phase d'action puis d'application de l'action

-- Question 8 --------------------------------------------------------------------------------------------------

       -- La collection pour "Risibles amours" sera désormais "Pocket" 

-- Question 9 --------------------------------------------------------------------------------------------------

        -- Session A
        SELECT COUNT(*) FROM livre;  -- On en a 17
