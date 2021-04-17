On se retrouve ici avec une image "PQ.png". L'indice nous dit de faire attention au format de l'image...

Voyons voir ce que cette image nous cache.
```bash
$ file PQ.png
PQ.png: JPEG image data, JFIF standard 1.01, aspect ratio, density 1x1, segment length 16, baseline, precision 8, 504x672, components 3
```
On voit que c'est en fait une image JFIF, c'est à dire un JPEG avec du contenu aditionnel stocké.

Utilisons binwalk pour extraire le contenu.
```bash
$ binwalk -e PQ.png 

DECIMAL       HEXADECIMAL     DESCRIPTION
--------------------------------------------------------------------------------
0             0x0             JPEG image data, JFIF standard 1.01
44528         0xADF0          Zip archive data, at least v1.0 to extract, name: PasEncoreFinis/
44573         0xAE1D          Zip archive data, at least v2.0 to extract, compressed size: 70, uncompressed size: 68, name: PasEncoreFinis/flag.txt
44898         0xAF62          End of Zip archive, footer length: 22
$ cd _PQ.png.extracted/
$ ls
ADF0.zip  PasEncoreFinis
$ cd PasEncoreFinis
$ ls
flag.txt
$ cat flag.txt
Vous pensiez que c'était aussi simple ?

SGVyb0NURnszNFNZX0ZMNEd9
```
Arg c'est pas terminé ! On obtient le flag en base64.

Pour le décoder, on peut utiliser un convertisseur en ligne (https://www.base64decode.org/) ou faire comme ceci directement en ligne de commande :
```bash
$ echo "SGVyb0NURnszNFNZX0ZMNEd9" > flag64
$ base64 -d flag64 
HeroCTF{34SY_FL4G}
```
HeroCTF{34SY_FL4G}
