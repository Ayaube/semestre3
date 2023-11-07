/*Depuis le processus principal d'un programme,
 on crée 1024 processus (y compris le processus principal)  
 avec la boucle ci-dessous:

main() {

...

for(i=0; i< 10; i++) {

     pid_t p = fork();
}

...
}

Question : Compléter le programme pour que le processus père  affiche exactement une fois l'identifiant de chaque processus (1024 processus).

*/




#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <unistd.h>