package clubSport.enonce.patternSingleton;

import java.util.ArrayList;
import java.util.Collection;

public abstract class Activite {

    private String nom;
    private int capacite;
    private Collection<Personne> inscrits;

    public Activite(String nom, int capacite) {
	this.nom = nom;
	this.capacite = capacite;
	this.inscrits = new ArrayList<>();
    }

    public void inscrire(Personne p) {
	    if (inscrits.size() < capacite && condition(p)){
            inscrits.add(p);
            capacite--;
        }
    }

    public abstract boolean condition(Personne p);

}
