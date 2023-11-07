#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>

int main() {
    int i;
    int pipefd[2];
    pid_t pid;

    // Créer un pipe
    if (pipe(pipefd) == -1) {
        perror("pipe");
        exit(EXIT_FAILURE);
    }

    for (i = 0; i < 10; i++) {
        pid = fork();
        if (pid == -1) {
            perror("fork");
            exit(EXIT_FAILURE);
        }

        if (pid == 0) {  // Enfant
            close(pipefd[0]);  // Fermer l'extrémité de lecture
            dprintf(pipefd[1], "%d\n", (int)getpid());
            close(pipefd[1]);  // Fermer l'extrémité d'écriture
            exit(EXIT_SUCCESS);
        }
    }

    // Processus père
    close(pipefd[1]);  // Fermer l'extrémité d'écriture

    // Attendre que tous les enfants se terminent
    for (i = 0; i < 10; i++) {
        wait(NULL);
    }

    // Lire et afficher les PIDs des enfants
    char buffer[16];
    ssize_t len;
    while ((len = read(pipefd[0], buffer, sizeof(buffer) - 1)) > 0) {
        buffer[len] = '\0';
        printf("PID: %s", buffer);
    }

    close(pipefd[0]);  // Fermer l'extrémité de lecture
    return 0;
}
