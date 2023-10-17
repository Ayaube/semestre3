package clubSport.enonce.patternComposite;

import java.util.ArrayList;

public class StetchingSénior extends Activite {
    public StetchingSénior(int capacite, ArrayList<Condition> c) {
        super("Stetching Sénior", capacite,new ConditionSénior(c));
    }

}
