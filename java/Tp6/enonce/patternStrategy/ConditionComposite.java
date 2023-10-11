package clubSport.enonce.patternStrategy;

import java.util.ArrayList;
import java.util.List;

public class ConditionComposite implements Condition {
    private List<Condition> conditions;

    public ConditionComposite() {
        conditions = new ArrayList<>();
    }

    public void ajouterCondition(Condition condition) {
        conditions.add(condition);
    }

    @Override
    public boolean checkCondition(Personne p) {
        for (Condition condition : conditions) {
            if (!condition.checkCondition(p)) {
                return false; // Si l'une des conditions n'est pas satisfaite, retourne false
            }
        }
        return true; // Toutes les conditions sont satisfaites
    }
}
