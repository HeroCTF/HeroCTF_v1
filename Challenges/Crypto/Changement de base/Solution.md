Le message est chiffré en base64.

Pour le déchiffrer, on peut par exemple utiliser le site dcode : https://www.dcode.fr/code-base-64.

Il est également possible de résoudre ce challenge directement en bash comme ceci : 
```bash
$ echo "U1Q0WV9UVU4zRA==" | base64 -d
ST4Y_TUN3D
```
HeroCTF{ST4Y_TUN3D}
