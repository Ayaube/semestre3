
public class Lettre extends Courrier{

	public Lettre(String destinataire) {
		super(destinataire);
	}

	@Override
	public double coutAffranchissement() {
		return 1;
	}

}
