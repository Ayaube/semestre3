#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <stdlib.h>

void ecrite_dans(const char* file_name, int index, pid_t pid) {
    FILE* file = fopen(file_name, "a");
    if (file == NULL) {
        perror("Erreur d'ouverture de fichier");
        exit(1);
    }
    fprintf(file, "%d %d\n", index, pid);
    fclose(file);
}

void afficher_valeurs() {
    pid_t pid = fork();
    if (pid == 0) { // Fils
        FILE *fp1 = fopen("pair.txt", "r");
        char line[256];
        while (fgets(line, sizeof(line), fp1)) {
            printf("Enfant (pair.txt): %s", line);
            sleep(1);
        }
        fclose(fp1);
        exit(0);
    } else if (pid > 0) { // Père
        FILE *fp2 = fopen("impair.txt", "r");
        char line[256];
        while (fgets(line, sizeof(line), fp2)) {
            sleep(1);
            printf("Parent (impair.txt): %s", line);
        }
        fclose(fp2);
        wait(NULL);
    } else {
        perror("Erreur de fork");
        exit(1);
    }
}

int main(int argc, char* argv[]) {
    if (argc < 2) {
        printf("Veuillez fournir le nombre de processus fils à créer.\n");
        return 1;
    }

    int n = atoi(argv[1]);
    pid_t pid;
    for (int i = 0; i < n; ++i) {
        pid = fork();
        if (pid == 0) {  
            if (i % 2 == 0) {
                ecrite_dans("pair.txt", i, getpid());
            } else {
                ecrite_dans("impair.txt", i, getpid());
            }
            exit(0);
        } else if (pid < 0) {
            perror("Erreur de fork");
            exit(1);
        }
    }

    for (int i = 0; i < n; ++i) {
        wait(NULL);
    }

    afficher_valeurs();

    return 0;
}
