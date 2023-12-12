-- Exercice 1 : Index par hachage

-- 1. Création du schéma et de la table
CREATE SCHEMA indexes;
CREATE TABLE indexes.entiers (cle int, valeur int);

-- Insertion de 10000 clés avec des valeurs aléatoires entre 1 et 500
INSERT INTO indexes.entiers (cle, valeur)
SELECT generate_series(1, 10000) AS cle, floor(random() * 500 + 1)::int AS valeur;

-- 2. Utilisation de EXPLAIN pour voir le plan de requête
EXPLAIN (FORMAT JSON) SELECT * FROM indexes.entiers;

 QUERY PLAN
-----------------------------------
 [                                +
   {                              +
     "Plan": {                    +
       "Node Type": "Seq Scan",   +
       "Parallel Aware": false,   +
       "Async Capable": false,    +
       "Relation Name": "entiers",+
       "Alias": "entiers",        +
       "Startup Cost": 0.00,      +
       "Total Cost": 289.00,      +
       "Plan Rows": 20000,        +
       "Plan Width": 8            +
     }                            +
   }                              +
 ]
(1 row)


-- 3. Requête avec GROUP BY et fonction d'agrégation
EXPLAIN (FORMAT JSON)
SELECT valeur, COUNT(cle) as nombre_cles
FROM indexes.entiers
GROUP BY valeur;


                QUERY PLAN
-------------------------------------------
 [                                        +
   {                                      +
     "Plan": {                            +
       "Node Type": "Aggregate",          +
       "Strategy": "Hashed",              +
       "Partial Mode": "Simple",          +
       "Parallel Aware": false,           +
       "Async Capable": false,            +
       "Startup Cost": 389.00,            +
       "Total Cost": 394.00,              +
       "Plan Rows": 500,                  +
       "Plan Width": 12,                  +
       "Group Key": ["valeur"],           +
       "Planned Partitions": 0,           +
       "Plans": [                         +
         {                                +
           "Node Type": "Seq Scan",       +
           "Parent Relationship": "Outer",+
           "Parallel Aware": false,       +
           "Async Capable": false,        +
           "Relation Name": "entiers",    +
           "Alias": "entiers",            +
           "Startup Cost": 0.00,          +
           "Total Cost": 289.00,          +
           "Plan Rows": 20000,            +
           "Plan Width": 8                +
         }                                +
       ]                                  +
     }                                    +
   }                                      +
 ]
(1 row)


-- 4. Recherche du nombre de clés pour une valeur donnée
-- Avant de construire l'index
EXPLAIN (FORMAT JSON)
SELECT COUNT(cle)
FROM indexes.entiers
WHERE valeur = 250;



                 QUERY PLAN
-------------------------------------------
 [                                        +
   {                                      +
     "Plan": {                            +
       "Node Type": "Aggregate",          +
       "Strategy": "Plain",               +
       "Partial Mode": "Simple",          +
       "Parallel Aware": false,           +
       "Async Capable": false,            +
       "Startup Cost": 339.10,            +
       "Total Cost": 339.11,              +
       "Plan Rows": 1,                    +
       "Plan Width": 8,                   +
       "Plans": [                         +
         {                                +
           "Node Type": "Seq Scan",       +
           "Parent Relationship": "Outer",+
           "Parallel Aware": false,       +
           "Async Capable": false,        +
           "Relation Name": "entiers",    +
           "Alias": "entiers",            +
           "Startup Cost": 0.00,          +
           "Total Cost": 339.00,          +
           "Plan Rows": 38,               +
           "Plan Width": 4,               +
           "Filter": "(valeur = 250)"     +
         }                                +
       ]                                  +
     }                                    +
   }                                      +
 ]
(1 row)


-- Construction de l'index sur la colonne 'valeur'
CREATE INDEX idx_valeur ON indexes.entiers(valeur);

-- Après la construction de l'index
EXPLAIN (FORMAT JSON)
SELECT COUNT(cle)
FROM indexes.entiers
WHERE valeur = 250;


                   QUERY PLAN
-------------------------------------------------
 [                                              +
   {                                            +
     "Plan": {                                  +
       "Node Type": "Aggregate",                +
       "Strategy": "Plain",                     +
       "Partial Mode": "Simple",                +
       "Parallel Aware": false,                 +
       "Async Capable": false,                  +
       "Startup Cost": 75.59,                   +
       "Total Cost": 75.60,                     +
       "Plan Rows": 1,                          +
       "Plan Width": 8,                         +
       "Plans": [                               +
         {                                      +
           "Node Type": "Bitmap Heap Scan",     +
           "Parent Relationship": "Outer",      +
           "Parallel Aware": false,             +
           "Async Capable": false,              +
           "Relation Name": "entiers",          +
           "Alias": "entiers",                  +
           "Startup Cost": 4.58,                +
           "Total Cost": 75.49,                 +
           "Plan Rows": 38,                     +
           "Plan Width": 4,                     +
           "Recheck Cond": "(valeur = 250)",    +
           "Plans": [                           +
             {                                  +
               "Node Type": "Bitmap Index Scan",+
               "Parent Relationship": "Outer",  +
               "Parallel Aware": false,         +
               "Async Capable": false,          +
               "Index Name": "idx_valeur",      +
               "Startup Cost": 0.00,            +
               "Total Cost": 4.57,              +
               "Plan Rows": 38,                 +
               "Plan Width": 0,                 +
               "Index Cond": "(valeur = 250)"   +
             }                                  +
           ]                                    +
         }                                      +
       ]                                        +
     }                                          +
   }                                            +
 ]
(1 row)





-- Comparaison des plans de requête avant et après la création de l'index


-- Comparaison des plans de requête avant et après la création de l'index idx_valeur

-- Cette comparaison révèle des informations importantes sur l'efficacité de l'indexation et son impact sur la performance des requêtes.
-- On observe que le Type de Nœud a changé de "Seq Scan" à "Bitmap Heap Scan" après la création de l'index.

-- L'indexation peut réduire considérablement le temps nécessaire pour récupérer des données spécifiques dans de grandes tables.
-- Cela démontre l'importance de l'indexation pour optimiser les requêtes dans une base de données, en particulier pour des requêtes avec des conditions de filtrage spécifiques.
-- En conclusion, cet exercice met en lumière l'impact significatif de l'indexation sur l'amélioration des performances des requêtes dans PostgreSQL.
