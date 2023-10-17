package clubSport.enonce.patternComposite;


public class CondictionGym extends Condition {
    @Override
    public boolean checkCondition(Personne p) {
        return p.getSexe() == Sexe.Femme;
    }
}
