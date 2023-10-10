#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <unistd.h>

int main(void) {
    pid_t retour;
    char *path = "./exec2";
    char *argval[] = {"exec2", "toto", "titi", NULL};

    switch (retour = fork()) {
        case -1:
            perror("Problème : fork");
            exit(1);
        case 0:
            printf("Le fils va exécuter execv\n");
            execv(path, argval);
            perror("Erreur d'execv");  // seulement si execv échoue
            exit(1);
        default:
            printf("Père : a créé %d\n", retour);
            wait(NULL);
            printf("Père: a reçu term. fils\n");
    }

    return 0;
}
