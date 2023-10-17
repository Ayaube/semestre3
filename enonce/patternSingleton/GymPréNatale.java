package clubSport.enonce.patternSingleton;

public class GymPréNatale extends Activite {
    public GymPréNatale(int capacite) {
        super("Gym PréNatale", capacite);
    }

    @Override
    public boolean condition(Personne p) {
        return p.getSexe() == Sexe.Femme;
    }
}
