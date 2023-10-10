package clubSport.enonce.patternSingleton;

public class Personne {
    private String nom;
    private int age;
    private Sexe sexe;

    public Personne(String nom, int age, Sexe sexe) {
	this.nom = nom;
	this.age = age;
	this.sexe = sexe;
    }

    public String getNom() {
	return nom;
    }

    public void setNom(String nom) {
	this.nom = nom;
    }

    public int getAge() {
	return age;
    }

    public void setAge(int age) {
	this.age = age;
    }

    public Sexe getSexe() {
	return sexe;
    }

    public void setSexe(Sexe sexe) {
	this.sexe = sexe;
    }

}
