#include <string.h>
#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/wait.h>





void rechercheLettre(char lettre, char *nomFich) {
    FILE *file = fopen(nomFich, "r");
    char ch;
    int count = 0;

    while ((ch = fgetc(file)) != EOF) {
        if (ch == lettre) {
            count++;
        }
    }
    fclose(file);

    char filename[2] = {lettre, '\0'};
    FILE *outfile = fopen(filename, "w");
    fprintf(outfile, "%d", count);
    fclose(outfile);
}

void rechercheEnParallele(char* nomFich) {
    for (char c = 'A'; c <= 'Z'; c++) {
        if (fork() == 0) {
            rechercheLettre(c, nomFich);
            exit(0);
        }
    }

    for (char c = 'A'; c <= 'Z'; c++) {
        wait(NULL);
    }

    for (char c = 'A'; c <= 'Z'; c++) {
        char filename[2] = {c, '\0'};
        FILE *file = fopen(filename, "r");
        int count;
        fscanf(file, "%d", &count);
        fclose(file);
        printf("%c: %d\n", c, count);
    }
}
