
-- A
CREATE TABLE Article_sc AS SELECT * FROM Article;
CREATE TABLE Facture_sc AS SELECT * FROM Facture;

-- B

-- Vérification de la structure
\d Article_sc;
\d Facture_sc;

-- Vérification du contenu
SELECT * FROM Article_sc;
SELECT * FROM Facture_sc;


-- C
CREATE OR REPLACE FUNCTION func_pk_Article_sc() RETURNS TRIGGER AS $$
BEGIN
    IF EXISTS (SELECT 1 FROM Article_sc WHERE id = NEW.id) THEN
        RAISE EXCEPTION 'Violation de la clé primaire: id % existe déjà', NEW.id;
        RETURN NULL;
    END IF;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER trig_pk_Article_sc
BEFORE INSERT OR UPDATE ON Article_sc
FOR EACH ROW
EXECUTE FUNCTION func_pk_Article_sc();

-- D
-- Insérer un nouvel article dont l’identifiant vaut null
INSERT INTO Article_sc (id, nom, prix) VALUES (NULL, 'trieur', 9.99);

-- Mettre à jour l’article numéro 105 en mettant son identifiant à null
UPDATE Article_sc SET id = NULL WHERE id = 105;

-- Insérer un article dont l’identifiant est 105
INSERT INTO Article_sc (id, nom, prix) VALUES (105, 'agrafeuse', 8.29);

-- Mettre à jour l’article dont l’identifiant est 107 avec l’identifiant 105
UPDATE Article_sc SET id = 105 WHERE id = 107;

-- Insérer un article dont l’identifiant est 100
INSERT INTO Article_sc (id, nom, prix) VALUES (100, 'ardoise', 4.89);

-- Mettre à jour le nom de cet article en tablette LED
UPDATE Article_sc SET nom = 'tablette LED' WHERE id = 100;

-- Détruire cet article dont l’identifiant est 100
DELETE FROM Article_sc WHERE id = 100;

