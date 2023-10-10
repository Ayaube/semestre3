package clubSport.enonce.patternStrategy;


public interface Condition {

    public interface Condition {
        boolean checkCondition(Personne p);
    }

    public class ConditionFemme implements Condition {
        @Override
        public boolean checkCondition(Personne p) {
            return p.getSexe() == Sexe.FEMME;
        }
    }

    public class ConditionSenior implements Condition {
        @Override
        public boolean checkCondition(Personne p) {
            return p.getAge() > 60;
        }
    }
}
