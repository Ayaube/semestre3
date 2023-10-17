
public class Colis extends Courrier{
	public int poids;

	public Colis(String destinataire, int poids) {
		super(destinataire);
		this.poids=poids;
	}

	@Override
	public double coutAffranchissement() {
		return (this.poids/500)+1;
	}
	
	@Override
	public boolean auxNormes() {
		return super.auxNormes() && this.poids<=30000;
	}

}
