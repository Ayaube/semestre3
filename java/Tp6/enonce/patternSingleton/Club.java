package clubSport.enonce.patternSingleton;

import java.util.ArrayList;

public class Club {
    private static Club uniqueInstance = null;
    private ArrayList<Activite> activites;

    public Club(ArrayList<Activite> activites) {
        this.activites = activites;
    }

    public Club() {
    }

    public static Club getUniqueInstance() {
        if(uniqueInstance==null){
            uniqueInstance = new Club();
        }
        return uniqueInstance;
    }

    public void ajouterActivites(Activite a){
        activites.add(a);
    }

    public void retirerActivites(Activite a){
        activites.remove(a);
    }

    public ArrayList<Activite> getActivites() {
        return activites;
    }
}
