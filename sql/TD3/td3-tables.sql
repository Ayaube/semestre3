/*
TD BD S3
2023-2024
*/

/* Mise en place du schéma et création des tables */

DROP SCHEMA if exists declencheur cascade ;
CREATE SCHEMA declencheur;
SET search_path to declencheur;

create table Article (
    id int primary key,
    nom varchar,
    prix numeric
);

create table Facture(
    id int references Article,
    quantite int,
    prix_total numeric
);

insert into Article values 
(101, 'Classeur', 3.79),
(102, 'Agenda', 7.99),
(103, 'Ramette de papier', 5.49),
(104, 'Chemise à rabats', 2.89),
(105, 'Surligneur', 1.69),
(106, 'Crayon à papier', 0.59),
(107, 'Marqueur permanent', 1.19),
(108, 'Tube de colle', 0.45),
(109, 'Trousse', 4.99)
;
