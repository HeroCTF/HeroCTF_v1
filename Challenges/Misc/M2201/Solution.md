Ce challenge tout droit sortit des cours de maths de 1ère année de DUT informatique à l'IUT de Vannes fait référence à la théorie des graphes.

L'indice nous met sur la voie : il faut faire la matrice d'adjacence du graphe donné.
On obtient ceci :
```
0 1 0 0 1 1 0 0
0 0 1 1 0 0 0 0
0 1 0 1 0 1 1 0
0 0 1 1 0 0 1 1
0 1 0 0 1 1 0 1
0 0 1 1 0 1 0 0
0 1 0 1 0 1 0 0
0 1 0 0 1 0 0 0
```
Chaque ligne de la matrice peut être interprétée comme un code binaire sur 8 bits, soit un octet.
En décodant chaque ligne (avec un convertisseur en ligne par exemple : https://www.rapidtables.com/convert/number/binary-to-ascii.html) on trouve le code "L0V3M4TH".

HeroCTF{L0V3M4TH}
