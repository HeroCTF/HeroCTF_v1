Ce challenge met en avant le vague typage du langage PHP.

Nous arrivons sur un page écrite en php. Cette page nous affiche son code grâce à la méthode "source", examinons donc le celui-ci :
```php
<?php
include "flag.php"; // <--- $FLAG

function source() {
    echo "<br><code>";
    highlight_string(file_get_contents(__FILE__));
    echo "</code>";
}

if(isset($_GET['flag'])){
    if (hash('tiger160,3', $_GET['flag'], false) == '0') {
        echo "<img src='https://media.giphy.com/media/d4blihcFNkwE3fEI/giphy.gif'/> <br>";
        echo "FLAG: " . $FLAG;
    } else {
        echo "<img src='https://media.giphy.com/media/15aGGXfSlat2dP6ohs/giphy.gif'/> <br>";
    }
} 
source();
?>
```
On voit ici que pour récupérer le flag, il nous faudra envoyer via une requête HTTP par la méthode POST contenant une certaine valeur de la variable flag telle que `tiger160,3(flag) == '0'`.

Or, en PHP, le "==" n'est pas très restrictif comparé au "===".
Par exemple on a "0e158280" == "0", car 0*'e' exposant 158280 est égal à 0.

Il faut donc que tiger160,3(flag) soit égal à "0e" suivi d'un nombre (Ex: 0e19725792)
Ces hash là sont appelés les "magic hashes" et il en existe plein à notre disposition sur internet (ici par exemple : https://github.com/spaze/hashes).

Après un peu de recherche on trouve :
```
tiger160,3("hb0cYfCVfqTU") = "0e28469497236129742421550691160399801254"
```
Bingo !

Pour envoyer notre réponse on ajoute `?flag=hb0cYfCVfqTU` à l'url, soit `http://heroctf.fr:4444/?flag=hb0cYfCVfqTU`
Un gif de Backpack Kid ainsi que le flag apparaissent alors !

HeroCTF{php_15_v3ry_53cur3_1539249}
