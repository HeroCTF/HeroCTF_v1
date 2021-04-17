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

