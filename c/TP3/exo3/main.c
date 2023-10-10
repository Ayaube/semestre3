#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>


// Inclure les prototypes de vos fonctions
void executeTrieur(char* nomFich, int taille, int *tab);
void trieEnParallele(int *tab1, int taille1, int *tab2, int taille2);
void rechercheEnParallele(char* nomFich);

int main() {
    // Test de la fonction executeTrieur
    int tab1[] = {5, 3, 8, 1, 9};
    int taille1 = sizeof(tab1) / sizeof(tab1[0]);
    executeTrieur("fichier1.txt", taille1, tab1);

    // Attendre quelques secondes pour s'assurer que le processus enfant a terminé
    sleep(3);

    printf("Contenu de fichier1.txt après tri :\n");
    FILE *f1 = fopen("fichier1.txt", "r");
    int num;
    while (fscanf(f1, "%d", &num) != EOF) {
        printf("%d ", num);
    }
    fclose(f1);
    printf("\n");

    // Test de la fonction trieEnParallele
    int tab2[] = {15, 13, 18, 11, 19};
    int taille2 = sizeof(tab2) / sizeof(tab2[0]);
    trieEnParallele(tab1, taille1, tab2, taille2);

    // Test de la fonction rechercheEnParallele
    rechercheEnParallele("texte.txt");

    return 0;
}
