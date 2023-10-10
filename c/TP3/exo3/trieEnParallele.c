#include <sys/wait.h>
#include <sys/types.h>
#include <stdio.h>
#include <stdlib.h>




void lireFichier(char *nomFich, int *tab, int taille) {
    FILE *file = fopen(nomFich, "r");
    for (int i = 0; i < taille; i++) {
        fscanf(file, "%d", &tab[i]);
    }
    fclose(file);
}

void trieEnParallele(int *tab1, int taille1, int *tab2, int taille2) {
    executeTrieur("fich1.txt", taille1, tab1);
    executeTrieur("fich2.txt", taille2, tab2);

    wait(NULL);
    wait(NULL);

    lireFichier("fich1.txt", tab1, taille1);
    lireFichier("fich2.txt", tab2, taille2);

    int *result = malloc((taille1 + taille2) * sizeof(int));
    int i = 0, j = 0, k = 0;

    while (i < taille1 && j < taille2) {
        if (tab1[i] < tab2[j]) {
            result[k++] = tab1[i++];
        } else {
            result[k++] = tab2[j++];
        }
    }

    while (i < taille1) {
        result[k++] = tab1[i++];
    }

    while (j < taille2) {
        result[k++] = tab2[j++];
    }

    for (int i = 0; i < taille1 + taille2; i++) {
        printf("%d", result[i]);
        if (i != taille1 + taille2 - 1) {
            printf(" ");
        }
    }
    printf("\n");

    free(result);
}
