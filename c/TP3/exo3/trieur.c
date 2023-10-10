#include <stdio.h>
#include <stdlib.h>

void trier(int *arr, int n) {
    for (int i = 0; i < n-1; i++) {
        for (int j = 0; j < n-i-1; j++) {
            if (arr[j] > arr[j+1]) {
                int temp = arr[j];
                arr[j] = arr[j+1];
                arr[j+1] = temp;
            }
        }
    }
}

int main(int argc, char *argv[]) {
    if (argc < 3) {
        printf("Usage: %s <filename> <N> <N integers>\n", argv[0]);
        exit(1);
    }

    char *filename = argv[1];
    int N = atoi(argv[2]);
    int *arr = malloc(N * sizeof(int));

    for (int i = 0; i < N; i++) {
        arr[i] = atoi(argv[i+3]);
    }

    trier(arr, N);

    FILE *file = fopen(filename, "w");
    for (int i = 0; i < N; i++) {
        fprintf(file, "%d\n", arr[i]);
    }
    fclose(file);

    free(arr);
    return 0;
}
