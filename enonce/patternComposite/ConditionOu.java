package clubSport.enonce.patternComposite;

import java.util.ArrayList;

public class ConditionOu extends Condition {


    public ConditionOu(ArrayList<Condition> conditions) {
        super(conditions);
    }

    @Override
    public boolean checkCondition(Personne p) {
        for (Condition condition : getConditions()) {
            if (condition.checkCondition(p)) {
                return true;
            }
        }
        return false;
    }
}
