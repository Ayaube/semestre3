package clubSport.enonce.patternComposite;


public class CondictionGym implements Condition {
    @Override
    public boolean checkCondition(Personne p) {
        return p.getSexe() == Sexe.Femme;
    }
}
