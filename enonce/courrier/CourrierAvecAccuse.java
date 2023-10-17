package clubSport.enonce.courrier;

public class CourrierAvecAccuse extends Courrier {
    private Courrier courrier;
    private String expediteur;

    public CourrierAvecAccuse(Courrier courrier, String expediteur) {
        super(courrier.getDestinataire());
        this.courrier = courrier;
        this.expediteur = expediteur;
    }

    @Override
    public double coutAffranchissement() {
        return courrier.coutAffranchissement();
    }

    @Override
    public boolean auxNormes() {
        return courrier.auxNormes() && aExpediteur();
    }

    public boolean aExpediteur() {
        return this.expediteur != null && !this.expediteur.isEmpty();
    }
}

