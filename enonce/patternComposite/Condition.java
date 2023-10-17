package clubSport.enonce.patternComposite;


import java.util.ArrayList;

public abstract class Condition {
    private ArrayList<Condition> conditions;

    public Condition(ArrayList<Condition> conditions) {
        this.conditions = conditions;
    }

    public ArrayList<Condition> getConditions() {
        return conditions;
    }

    abstract boolean checkCondition(Personne p);
}
