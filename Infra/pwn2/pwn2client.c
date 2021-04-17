#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>
 
void afficherFlagG4NG(){
    setreuid(geteuid(), geteuid());
    printf("FFlag: ?????\n");
    printf("Point faible : trop fort.\n");
}
 
int main(int argc, char **argv){
 	setvbuf(stdout,NULL,_IONBF,0);
    char buffer[256];
    int len, i;
    printf("Donne-moi ton nom little hackerz : ");
    scanf("%s", buffer);
    len = strlen(buffer);
    printf("Ca sera pas si simple cette fois jeune \"%s\"\n", buffer);
    return 0;
}
