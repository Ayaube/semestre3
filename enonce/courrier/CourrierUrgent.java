package clubSport.enonce.courrier;

public class CourrierUrgent extends Courrier {
    private Courrier courrier;

    public CourrierUrgent(Courrier courrier) {
        super(courrier.getDestinataire());
        this.courrier = courrier;
    }


    @Override
    public double coutAffranchissement() {
        return 2 * courrier.coutAffranchissement();
    }

    @Override
    public boolean auxNormes() {
        return courrier.auxNormes();
    }
}

