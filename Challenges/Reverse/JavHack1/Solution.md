En utilisant un des sites donnés en hint, on peut arriver à retrouver un code semblable sémantiquement au code java originel à partir du fichier java compilé "JavHack1.class".

```java
import javax.swing.JOptionPane;

class JavHack1 {
    JavHack1() {
    }

    public static void main(String[] arrstring) {
        boolean bl = true;
        while (bl) {
            String string = JOptionPane.showInputDialog("Enter the password :");
            if (string.equals("v3rY_34sy_fl4g_010101")) {
                bl = false;
                JOptionPane.showMessageDialog(null, "GG ! You can validate the challenge with this password");
                continue;
            }
            JOptionPane.showMessageDialog(null, "Wrong flag !");
        }
    }
}
```
On voit ici que l'input est comparé à le chaine "v3rY_34sy_fl4g_010101", qui est notre flag.

HeroCTF{v3rY_34sy_fl4g_010101}
