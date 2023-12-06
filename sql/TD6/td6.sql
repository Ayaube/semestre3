-- TD6 

-- On saute la A et la B
-- Question C

-- Configuration initiale pour les deux sessions (Term1 et Term2)
-- Désactivation de l'AUTOCOMMIT
\set AUTOCOMMIT off

-- Term1 : Session A
BEGIN;

-- Emprunter le livre 6 par le lecteur 4
SELECT emprunter(6, 4);

-- Interrogation 
SELECT * FROM infos;

-- Term2
-- Les modifications de Term1 ne sont pas encore visibles
SELECT * FROM infos;

-- Faire emprunter le livre 7 par le lecteur 5
SELECT emprunter(7, 5);

-- Valider la transaction dans Term2
COMMIT;

-- Term1
-- Les modifications de Term1 ne sont pas encore validées
SELECT * FROM infos;

-- Valider la transaction dans Term1
COMMIT;

-- Term2
-- Les modifications de Term1 sont maintenant visibles
SELECT * FROM infos;



-- Réactivation de l'AUTOCOMMIT dans les deux sessions
\set AUTOCOMMIT on

-- Term1 : Créer une table avec un seul attribut de type entier
-- et insérer les nombres impairs compris entre 1 et 10
CREATE TABLE odd_numbers (number INT);
INSERT INTO odd_numbers SELECT generate_series(1, 10, 2);

-- Term2 : Vérifier que les valeurs sont visibles
SELECT * FROM odd_numbers;

-- Term1 : Commencer une nouvelle transaction
BEGIN;

-- Doubler les valeurs dans la table odd_numbers
UPDATE odd_numbers SET number = number * 2;

-- Term2 : Tenter de tripler les valeurs dans la table odd_numbers
-- Cette opération pourrait échouer ou être bloquée car Term1 n'a pas encore validé ses modifications
BEGIN;
UPDATE odd_numbers SET number = number * 3;

-- Term1 : Valider la transaction
COMMIT;

-- Term2 : Observer le résultat de la mise à jour
-- Selon le niveau d'isolation, cette transaction pourrait échouer ou être bloquée
COMMIT;

-- Term1 : Vérifier le contenu de la table
SELECT * FROM odd_numbers;

-- Term2 : Créer une autre table et insérer tous les nombres entre 1 et 10
CREATE TABLE all_numbers (number INT);
INSERT INTO all_numbers SELECT generate_series(1, 10);

-- Commencer des transactions dans les deux sessions
-- Term1
BEGIN;
-- Term2
BEGIN;

-- Incrémenter toutes les valeurs dans les deux sessions
-- Term1
UPDATE all_numbers SET number = number + 1;
-- Term2
UPDATE all_numbers SET number = number + 1;

-- Term1 : Valider la transaction
COMMIT;

-- Term2 : Sans exécuter une requête SQL, de combien d’unités ont été incrémentées les valeurs de la table ?
-- Réponse : Les valeurs ont été incrémentées d'une unité dans Term2 et une autre dans Term1
-- Term2 : Vérifier la réponse avec une requête
SELECT * FROM all_numbers;

-- Term1 : Sans exécuter une requête SQL, de combien d’unités ont été incrémentées les valeurs de la table ?
-- Réponse : Les valeurs ont été incrémentées d'une unité dans Term1 et une autre dans Term2
-- Term1 : Vérifier la réponse avec une requete
SELECT * FROM all_numbers;

-- Fin du TD6
