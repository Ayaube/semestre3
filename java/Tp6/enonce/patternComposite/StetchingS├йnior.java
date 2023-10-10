package clubSport.enonce.patternComposite;

public class StretchingSenior extends Activite {
    @Override
    public void inscrire(Personne p) {
        if (p.getAge() > 60) {
            super.inscrire(p);
        }
    }
}


