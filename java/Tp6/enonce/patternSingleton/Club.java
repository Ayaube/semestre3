package clubSport.enonce.patternSingleton;

import java.util.ArrayList;
import java.util.List;

public class Club {
    private static Club instance;
    private List<Activite> activites;

    private Club() {
        activites = new ArrayList<>();
    }


    public static Club getInstance() {
        if (instance == null) {
            instance = new Club();
        }
        return instance;
    }

    public void ajouterActivite(Activite activite) {
        activites.add(activite);
    }

    public void supprimerActivite(Activite activite) {
        activites.remove(activite);
    }
}
