Le message est ici codé en base32.

On peut utiliser le site dcode pour le déchiffrer : https://www.dcode.fr/code-base-32.

Comme pour le challenge "Changement de base", il est également possible de résoudre ce challenge en bash comme ceci :
```bash
$ echo "O5UG6X3VONSXGX3CMFZWKMZSL4YTCMI=" | base32 -d
who_uses_base32_111
```
HeroCTF{who_uses_base32_111}
