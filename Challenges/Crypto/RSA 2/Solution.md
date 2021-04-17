- 1ère méthode:
On utilise RsaCtfTool (https://github.com/Ganapati/RsaCtfTool)

```bash
$ for i in `cat rsa2.enc`;do python RsaCtfTool.py -n 627585038806247 -e 65537 --uncipher $i;done
[+] Clear text : H
[+] Clear text : e
[+] Clear text : r
[+] Clear text : o
[+] Clear text : C
[+] Clear text : T
[+] Clear text : F
[+] Clear text : {
[+] Clear text : u
[+] Clear text : s
...
[+] Clear text : b
[+] Clear text : 4
[+] Clear text : d
[+] Clear text : }
```
Résultat : HeroCTF{us1ng_rs4_w1th_sm4ll_pr1m3_numb3r_1s_b4d}


- 2ème méthode, proposée par Mathis HAMMEL (https://twitter.com/MathisHammel)

La deuxième méthode consiste à utiliser le couple (n,e) fournis, utilisés pour chiffrer le flag.
Pour chaque caractère chiffré, on essaie de trouver quel est le caractère clair qui lui correspond.
Pour cela, on chiffre chaque valeur possible de caractère ASCII, et on en aura un qui correspondra au caractère chiffré,
ce qui nous indique que c'est ce caractère à cette position.

On peut alors utiliser python :
```python
liste_chiffre = [372669117631614, 535859967547853, 213898535689643, 8653395567415, 484730622784671, 320837325468842,331673995619703, 426756492371444, 4562349440334, 121188708737752, 275839755798105, 174484844253615, 418634165521711, 401044612595398, 213898535689643, 121188708737752, 296367799892003, 401044612595398, 512808963720303, 275839755798105, 598242834066721, 202722428784490, 401044612595398, 121188708737752, 405971446461049, 296367799892003, 63113462897284, 63113462897284, 401044612595398, 400849263139730, 213898535689643, 275839755798105, 405971446461049, 551732685650248, 401044612595398, 174484844253615, 4562349440334, 405971446461049, 49103824223436, 551732685650248, 213898535689643, 401044612595398, 275839755798105, 121188708737752, 401044612595398, 49103824223436, 296367799892003, 130277582100339, 228350651363859]

n = 627585038806247
e = 65537
flag=''

for caractere_chiffre in liste_chiffre:
    for valeur_clair in range(256):
        if pow(valeur_clair, e, n) == caractere_chiffre:
            flag += chr(valeur_clair)
            break
print(flag)
```
Résultat : HeroCTF{us1ng_rs4_w1th_sm4ll_pr1m3_numb3r_1s_b4d}
