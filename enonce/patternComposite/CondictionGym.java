package clubSport.enonce.patternComposite;


import java.util.ArrayList;

public class CondictionGym extends Condition {
    @Override
    public boolean checkCondition(Personne p) {
        return p.getSexe() == Sexe.Femme;
    }

    public CondictionGym(ArrayList<Condition> conditions) {
        super(conditions);
    }
}
