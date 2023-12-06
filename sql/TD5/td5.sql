
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
        SELECT * FROM lecteur;  -- Les deux nouveaux lecteurs ne seront pas présents dans les deux Sessions

-- Question 7 --------------------------------------------------------------------------------------------------

        -- On a donc vu que les transactions pouvaients travailler en deux temps, d'abord une phase d'action puis d'application de l'action

-- Question 8 --------------------------------------------------------------------------------------------------

       -- La collection pour "Risibles amours" sera désormais "Pocket" 

-- Question 9 --------------------------------------------------------------------------------------------------

        -- Session A
        SELECT COUNT(*) FROM livre;  -- On en a 17


-- Question 10 --------------------------------------------------------------------------------------------------

                -- Session A
                SELECT nom FROM lecteur WHERE num_lecteur = 1;  -- Affiche le nom du lecteur 1

                -- Session B
                UPDATE lecteur SET nom ='toto' WHERE num_lecteur=1;  -- Modifie le nom du lecteur 1
                COMMIT;  -- On valide

                -- Session A
                SELECT nom FROM lecteur WHERE num_lecteur = 1;  -- Affiche de nouveau le nom du lecteur 1
                -- On ne constate aucun changement car la session A est isolée (SERIALIZABLE)

-- Question 11 --------------------------------------------------------------------------------------------------

                -- Session A
                COMMIT;  -- Fin de la transaction
                SELECT nom FROM lecteur WHERE num_lecteur = 1;  -- Reconsulte le nom du lecteur 1
                -- On constate le changement après le commit

-- Question 12 --------------------------------------------------------------------------------------------------

                -- Session A
                SELECT COUNT(*) FROM lecteur;  -- Compte le nombre de lecteurs

                -- Session B
                INSERT INTO lecteur (nom) VALUES ('Mme Belabbes');
                COMMIT;  -- Ajoute un lecteur et valide

                -- Session A
                SELECT COUNT(*) FROM lecteur;  -- Recompte le nombre de lecteurs
                -- On ne constate pas le nouveau lecteur ajouté

-- Question 13 --------------------------------------------------------------------------------------------------

                -- Session A
                COMMIT;  -- Fin de la transaction
                SELECT COUNT(*) FROM lecteur;  -- Recompte le nombre de lecteurs
                -- On constate maintenant le nouveau lecteur ajouté

-- Question 14 --------------------------------------------------------------------------------------------------

                -- La collection de "Risibles amours" reste "Folio" dans la session A

-- Question 15 --------------------------------------------------------------------------------------------------

                -- Le nombre de livres reste 15 dans la session A

-- Question 16 --------------------------------------------------------------------------------------------------

                -- Un "fantôme" fait référence à l'apparition de nouvelles lignes dans les résultats d'une requête au cours d'une même transaction

-- Question 17 --------------------------------------------------------------------------------------------------

                -- READ COMMITED permet de voir les modifications 'committées' pendant une transaction
                -- SERIALIZABLE isole complètement la transaction des modifications extérieures

-- Question 18 --------------------------------------------------------------------------------------------------

                 -- Utiliser SERIALIZABLE dans des contextes où l'intégrité des données est cruciale et où il faut éviter toute interférence entre transactions

-- Question 19 --------------------------------------------------------------------------------------------------

                -- Tableau des niveaux d'isolation:
                
                -- Read committed: Lecture sale: Impossible, Lecture non reproductible: Possible, Lecture fantôme: Possible
                
                -- Serializable: Lecture sale: Impossible, Lecture non reproductible: Impossible, Lecture fantôme: Impossible

-----------------------------------------------------------------------------------------------------------------