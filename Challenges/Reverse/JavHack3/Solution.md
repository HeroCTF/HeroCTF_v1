Processus semblable aux deux premiers JavHack, on utilise un decompiler et on obtient un pseudo code : 
```java
import java.awt.Component;
import javax.swing.JOptionPane;

class JavHack3
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
        final byte[] array = { 26, 13, 16, 29, 43, 49, 29, 17, 13, 29, 4, 23, 12, 12, 27, 99, 99, 99, 99, 99, 99, 99, 99, 99, 29, 114, 115 };
        final byte b = 66;
        if (bytes.length != array.length) {
            return false;
        }
        for (int i = 0; i < array.length; ++i) {
            if (bytes[i] != (array[i] ^ b)) {
                return false;
            }
        }
        return true;
    }
}
```
On remarque une grande similitude avec le JavHack2, mais une chose importante a changé.
```java
for (int i = 0; i < array.length; ++i) {
  if (bytes[i] != (array[i] ^ b)) {
    return false;
  }
}
```
En effet, cette fois on peut voir que chaque caractère de l'input est comparé à chaque caractère de la chaine array, xorée (l'opération XOR est symbolisée par le signe ^) avec b (= 66).

On peut encore une fois le faire à la main en utilisant des outils en ligne (pour le XOR : http://xor.pw/) ou alors modifier un petit peu notre script python utilisé pour je JavHack2 !
```python
arr = [26, 13, 16, 29, 43, 49, 29, 17, 13, 29, 4, 23, 12, 12, 27, 99, 99, 99, 99, 99, 99, 99, 99, 99, 29, 114, 115]
key = 66

for item in arr:
	print(chr(item ^ key), end="")
```
Résultat : XOR_is_SO_FUNNY!!!!!!!!!\_01

HeroCTF{XOR_is_SO_FUNNY!!!!!!!!!\_01}
