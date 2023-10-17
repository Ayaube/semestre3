package clubSport.enonce.courrier;

public abstract class Courrier {
	private String destinataire;
	
	
	public Courrier(String destinataire) {
		this.destinataire = destinataire;
	}

	public abstract double coutAffranchissement();
	
	public boolean auxNormes() {
		return this.destinataire !=null;
	}

	public String getDestinataire() {
		return destinataire;
	}	
}
