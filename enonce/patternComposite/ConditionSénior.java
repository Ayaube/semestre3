package clubSport.enonce.patternComposite;


import java.util.ArrayList;

public class ConditionSénior extends Condition{
    public ConditionSénior(ArrayList<Condition> conditions) {
        super(conditions);
    }

    @Override
    public boolean checkCondition(Personne p) {
        return p.getAge() > 60;
    }
}
