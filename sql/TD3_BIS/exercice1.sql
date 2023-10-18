-- a
CREATE TABLE Fabricant(
    idFab int,
    nomFab varchar,
    adresse varchar
);

-- b
INSERT INTO Fabricant(idFab, nomFab, adresse) VALUES
(201, 'HappyBuro', 'Montreuil'),
(202, 'OfficeBox', 'Paris'),
(203, 'BuroValley', 'Lille'),
(204, 'IciOffice', 'Nantes'),
(205, 'PapierCo', 'Dijon');

-- c
CREATE TABLE Produit(
    idProd int,
    nomProd varchar,
    prixProd numeric,
    idFab int
);

-- d
CREATE OR REPLACE FUNCTION inserprod() RETURNS TRIGGER AS $$
BEGIN
    IF NEW.prixProd < 2 THEN
        NEW.idFab = 201;
    ELSIF NEW.prixProd > 5 THEN
        NEW.idFab = 202;
    ELSIF NEW.nomProd LIKE '%chemise%' OR '%classeur%' THEN
        NEW.idFab = 203;
    ELSE
        NEW.idFab = 204;
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trig_inser_Produit
BEFORE INSERT ON Produit
FOR EACH ROW
EXECUTE FUNCTION inserprod();

-- e
INSERT INTO Produit(idProd, nomProd, prixProd)
SELECT id, nom, prix FROM Article;
