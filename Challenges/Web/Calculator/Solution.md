Ce challenge met en avant une faille dans l'utilisation de la fonction eval() de PHP.

En effet, si on rentre une opération, le résultat nous est affiché. On remarque alors que si on ne rentre rien, un erreur au niveau de la fonction eval() apparait. Ceci nous donne l'information que la fonction va exécuter directement le code entré dans le champs de texte et afficher le résultat de l'exécution.

On va donc exploiter cette faille : on commence par entrer la commande `shell_exec("ls")`. Un seul fichier apparait alors, il s'agit de "calculator.php". On va donc récupérer le contenu de ce fichier via la commande `shell_exec("cat calculator.php")`.

Il suffit ensuite d'inspecter le code source de la page obtenue et on y retrouve le code suivant :
```php
<?php
  // HeroCTF{us1ng_3v4l_functi0n_1s_b4d}
?>
```
HeroCTF{us1ng_3v4l_functi0n_1s_b4d}
