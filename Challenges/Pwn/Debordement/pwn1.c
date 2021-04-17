#include <unistd.h>
#include <sys/types.h>
#include <stdlib.h>
#include <stdio.h>
 
int main()
{
  setvbuf(stdout, NULL, _IONBF, 0);  
  int var;
  int check = 0xdeadbeef;
  char buf[40];

  printf("Déborde moi mon cochon : ");
 
  fgets(buf,45,stdin);
 
  if (check!= 0xdeadbeef){
    printf ("\nGG wola tu m'as eu\n");
    setreuid(geteuid(), geteuid());
    system("cat flag.txt");
    printf("Voilà ton flag petit fou.\n");
  }
 
  if (check == 0xdeadbeef)
   {
     printf("Essaie encore...\n");
   }
   return 0;
}
