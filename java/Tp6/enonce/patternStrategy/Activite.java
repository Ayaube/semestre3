package clubSport.enonce.patternStrategy;

import java.util.ArrayList;
import java.util.Collection;

public abstract class Activite {

    private Condition c;
    private String nom;
    private int capacite;
    private Collection<Personne> inscrits;

    public Activite(String nom, int capacite,Condition c) {
	this.nom = nom;
	this.capacite = capacite;
	this.inscrits = new ArrayList<>();
    this.c = c;
    }

    public void inscrire(Personne p) {
	    if (inscrits.size() < capacite && c.checkCondition(p)){
            inscrits.add(p);
            capacite--;
        }
    }



}
