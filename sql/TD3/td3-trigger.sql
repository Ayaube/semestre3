/*
TD BD S3
2023-2024
*/

/* Création de la fonction trigger */

CREATE or REPLACE FUNCTION fourniture() RETURNS TRIGGER as
$$
DECLARE
aprix numeric; 

BEGIN

-- Pour Update et Insert, récupérer le prix dans la table Article et le multiplier par la quantité pour calculer le prix total
IF TG_OP='UPDATE' or TG_OP='INSERT' THEN 
SELECT prix into aprix FROM Article WHERE id = NEW.id; 
NEW.prix_total = aprix * NEW.quantite;
END IF;

-- Pour Delete, récupérer le prix dans la table Article avant suppression de l'article de la table Facture
IF TG_OP='DELETE' THEN
SELECT prix into aprix FROM Article WHERE id = OLD.id;
END IF;

-- Si la requête Select retourne un prix, alors :

IF (FOUND) THEN
    -- afficher les informations sur l'article avant modification ou suppression 
    IF TG_OP='UPDATE' or TG_OP='DELETE' THEN raise notice '% valeur OLD : % * % = % ',
    OLD.id, aprix, OLD.quantite, OLD.prix_total ; 
    END IF;

    -- afficher les informations sur l'article après modification ou insertion
    IF TG_OP='UPDATE' or TG_OP='INSERT' THEN raise notice '% valeur NEW : % * % = % ',
    NEW.id, aprix, NEW.quantite, NEW.prix_total; 
    END IF;

    -- Pour Update et Insert, retourner NEW pour autoriser la modification du tuple dans la table Facture. Pour Delete, retourner OLD par défaut.
    IF TG_OP='UPDATE' or TG_OP='INSERT' THEN 
    RETURN NEW; 
    ELSE
    RETURN OLD;
    END IF; 

END IF;

-- Sinon, ne rien faire et empêcher les opérations sur la ligne courante.
RETURN NULL; 

END;
$$ language plpgsql ;


/* Creation du trigger */

CREATE TRIGGER trig_four BEFORE
UPDATE or INSERT or DELETE ON facture
FOR EACH ROW
EXECUTE PROCEDURE fourniture();
