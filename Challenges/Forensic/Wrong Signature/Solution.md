Dans ce challenge, on nous fournit une image "broken_image.png" que l'on ne peut ouvrir car le fichier est dit endommagé.

Le titre du challenge, "Wrong signature", nous met sur le voie.
On sort donc nos éditeur hexadécimal préféré et on va vérifier l'entête du fichier.
En Effet, on y retrouve les 4 premiers octets suivants :
`89 50 4E 46`
Ce qui correspond en ASCII à : `àPNF`.
Il faut donc modifier le `46` en `47` pour avoir `89 50 4E 47` soit `àPNG`.
Maintenant que notre entête est correcte, on peut ouvrir l'image où on retrouve le flag.

HeroCTF{COUCOU}
