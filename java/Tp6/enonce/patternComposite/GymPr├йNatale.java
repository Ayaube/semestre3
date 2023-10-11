package clubSport.enonce.patternComposite;

public class GymPreNatale extends Activite {
    @Override
    public void inscrire(Personne p) {
        if (p.getSexe() == Sexe.FEMME) {
            super.inscrire(p);
        }
    }
}

}
