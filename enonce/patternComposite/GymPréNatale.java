package clubSport.enonce.patternComposite;

import java.util.ArrayList;

public class GymPréNatale extends Activite {
    public GymPréNatale(int capacite, ArrayList<Condition> c) {
        super("Gym PréNatale", capacite,new CondictionGym(c));
    }

}
