#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/wait.h>



void executeTrieur(char* nomFich, int taille, int *tab) {
    char *args[taille + 4];
    args[0] = "./trieur";
    args[1] = nomFich;
    args[2] = malloc(10 * sizeof(char));
    sprintf(args[2], "%d", taille);

    for (int i = 0; i < taille; i++) {
        args[i+3] = malloc(10 * sizeof(char));
        sprintf(args[i+3], "%d", tab[i]);
    }

    args[taille + 3] = NULL;

    if (fork() == 0) {
        execvp(args[0], args);
        exit(1);
    }

    for (int i = 2; i < taille + 3; i++) {
        free(args[i]);
    }
}
