#include <stdio.h>
#include <sys/types.h>

int main (int argc, char *argv[]) {
    int i;

    printf("execution de exec2\n");
    printf("exec2 : %d parametres \n", argc);
    for (i=0; i<argc; i++)
        printf("exec2; parametre %d= %s\n,i,argv[i]");
    exit(0);
}

