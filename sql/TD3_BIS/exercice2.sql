-- a
-- Faire dans le terminal

-- b
CREATE OR REPLACE FUNCTION check_fk() RETURNS TRIGGER AS $$
BEGIN
    IF NOT EXISTS (SELECT 1 FROM Fabricant WHERE idFab = NEW.idFab) THEN
        RAISE EXCEPTION 'Violation de la clé étrangère: idFab % n''existe pas', NEW.idFab;
        RETURN NULL;
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trig_fk_Produit
BEFORE INSERT OR UPDATE ON Produit
FOR EACH ROW
EXECUTE FUNCTION check_fk();

-- c
INSERT INTO Produit(idProd, nomProd, prixProd, idFab) VALUES (110, 'feutre', 1.99, 210);
UPDATE Produit SET idFab = 210 WHERE idProd = 105;
UPDATE Produit SET idFab = 201 WHERE idProd = 101;
UPDATE Fabricant SET idFab = 205 WHERE idFab = 202;
DELETE FROM Fabricant WHERE idFab = 202;


