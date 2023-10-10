#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <unistd.h>

#define N 5  // Nombre de processus fils à créer

int main() {
    for (int i = 0; i < N; i++) {
        pid_t pid = fork();

        if (pid < 0) {
            perror("Erreur lors de l'appel à fork");
            exit(1);
        }

        // Processus fils
        if (pid == 0) {
            printf("Processus fils créé avec PID %d\n", getpid());
            exit(i);
        }
    }

    // Processus parent
    int status;
    pid_t child_pid;

    while ((child_pid = wait(&status)) != -1) {
        if (WIFEXITED(status)) {
            printf("Le processus fils avec PID %d s'est terminé avec le statut %d\n", child_pid, WEXITSTATUS(status));
        }
    }

    printf("Tous les processus fils se sont terminés.\n");
    return 0;
}
