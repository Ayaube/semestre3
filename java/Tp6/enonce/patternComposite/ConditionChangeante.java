package clubSport.enonce.patternComposite;

import java.util.ArrayList;

public class ConditionChangeante implements Condition {
    private int numCondition;
    private ArrayList<Condition> conditionsDeBase;

    public ConditionChangeante(ArrayList<Condition> conditionsDeBase) {
        this.numCondition = 0;
        this.conditionsDeBase = conditionsDeBase;
    }

    @Override
    public boolean checkCondition(Personne p) {
        if(this.numCondition < this.conditionsDeBase.size()-1){
            numCondition++;
        }
        else{
            numCondition = 0;
        }
        return conditionsDeBase.get(numCondition).checkCondition(p);
    }
}
