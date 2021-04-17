Comme pour le premier JavHack, on commence par utiliser un decompiler online pour obtenir un pseudo code exploitable.

On a donc ici le code suivant :
```java
import java.awt.Component;
import javax.swing.JOptionPane;

class JavHack2
{
    public static void main(final String[] array) {
        int i = 1;
        while (i != 0) {
            if (checkPassword(JOptionPane.showInputDialog("Enter the password :"))) {
                i = 0;
                JOptionPane.showMessageDialog(null, "GG ! You can validate the challenge with this password");
            }
            else {
                JOptionPane.showMessageDialog(null, "Wrong flag !");
            }
        }
    }
    
    public static boolean checkPassword(final String s) {
        if (s == null && s.trim().isEmpty()) {
            return false;
        }
        final byte[] bytes = s.getBytes();
        final byte[] array = { 52, 53, 99, 49, 49, 95, 119, 49, 55, 104, 95, 106, 52, 118, 52, 95, 120, 100, 95, 49, 48, 53, 56, 50 };
        if (bytes.length != array.length) {
            return false;
        }
        for (int i = 0; i < array.length; ++i) {
            if (bytes[i] != array[i]) {
                return false;
            }
        }
        return true;
    }
}
```
Il faut que la méthode "checkPassword" renvoie "True".

Après analyse de la méthode checkPassword, on s'aperçoit que le password que l'on
rentre est transformé en array de bytes. Chaque élément est alors comparé un à un avec
l'array suivante:
```java
byte[] myBytes = {52, 53, 99, 49, 49, 95, 119, 49, 55, 104, 95, 106, 52, 118,
52, 95, 120, 100, 95, 49, 48, 53, 56, 50};
```
Chaque élément de cette array correspond donc au code ASCII de chaque caractère du flag.

Pour résoudre ce challenge, on peut donc utiliser un convertisseur en ligne (par exemple : https://onlineasciitools.com/convert-bytes-to-ascii) ou faire un petit script en python !
```python
arr = [52, 53, 99, 49, 49, 95, 119, 49, 55, 104, 95, 106, 52, 118, 52, 95, 120, 100, 95, 49, 48, 53, 56, 50]

for elem in arr:
	print(chr(elem), end="")
```
Résultat : 45c11_w17h_j4v4_xd_10582

HeroCTF{45c11_w17h_j4v4_xd_10582}
