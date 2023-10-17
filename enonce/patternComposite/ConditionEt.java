package clubSport.enonce.patternComposite;

import java.util.ArrayList;

public class ConditionEt extends Condition {

    public ConditionEt(ArrayList<Condition> conditions) {
        super(conditions);
    }

    public void ajouterCondition(Condition c){
        getConditions().add(c);
    }

    @Override
    public boolean checkCondition(Personne p) {
        for (Condition condition :getConditions()) {
            if (!condition.checkCondition(p)) {
                return false;
            }
        }
        return true;
    }
}
