DELETE FROM Facture;



/* b */
INSERT INTO Facture (id, quantite) VALUES
(101, 4),
(102, 1),
(103, 3),
(104, 8);


SELECT * FROM Facture;


/* c */

-- Lister le contenu de la table Facture
SELECT * FROM Facture;

-- Insérer les valeurs
INSERT INTO Facture (id, quantite, prix_total) VALUES
(105, 10, 0),
(106, 12, 7.54),
(107, 6, 2.28),
(108, 5, 0);




/* d */

UPDATE Facture SET quantite = 9 WHERE id = 109;




/* e */

INSERT INTO Facture (id, quantite, prix_total) VALUES (110, 1, 0);




/* f */

UPDATE Facture SET quantite = 0 WHERE prix_total > 12.50;

-- Lister le contenu de la table Facture
SELECT * FROM Facture;



/* g */

UPDATE Article SET prix = ROUND(prix) WHERE id = 102;




/* h */

SELECT A.prix AS "Prix Unitaire", F.prix_total AS "Prix Total"
FROM Article A, Facture F
WHERE A.id = 102 AND F.id = 102;

/* i */


DELETE FROM Article WHERE id IN (SELECT id FROM Facture WHERE quantite = 0);





/* j */


ALTER TABLE Facture ALTER COLUMN prix_total SET NOT NULL;

ALTER TABLE Facture DISABLE TRIGGER trig_four;

INSERT INTO Facture (id, quantite) VALUES (109, 20);



/* k */


ALTER TABLE Facture ENABLE TRIGGER trig_four;

INSERT INTO Facture (id, quantite) VALUES (109, 20);



