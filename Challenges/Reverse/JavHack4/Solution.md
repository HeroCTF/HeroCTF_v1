Ça se complique pour ce 4ème épisode des JavHack...
Comme pour les autres challenges, on commence par utiliser un decompiler online pour obtenir un pseudo code exploitable.
```java
import java.util.Scanner;

public class JavHack4
{
    public static void main(final String[] array) {
        final Scanner scanner = new Scanner(System.in);
        System.out.print("Enter vault password: ");
        if (checkPassword(obfuscation(scanner.next()))) {
            System.out.println("Access granted.");
        }
        else {
            System.out.println("Access denied!");
        }
    }
    
    public static String[] obfuscation(final String s) {
        final char[] charArray = s.toCharArray();
        final String[] array = new String[charArray.length];
        for (int i = 0; i < charArray.length; ++i) {
            array[i] = Integer.toBinaryString(charArray[i]);
        }
        for (int j = 0; j < array.length; ++j) {
            array[j] = swap(array[j], 2, 3);
            array[j] = swap(array[j], 5, 1);
        }
        return array;
    }
    
    public static String swap(final String s, final int n, final int n2) {
        if (s != null && n < s.length() && n2 < s.length()) {
            final char[] charArray = s.toCharArray();
            final char c = charArray[n];
            charArray[n] = charArray[n2];
            charArray[n2] = c;
            return new String(charArray);
        }
        return null;
    }
    
    public static boolean checkPassword(final String[] array) {
        final int[] array2 = { 114, 41, 110, 82, 41, 99, 115, 125, 49, 57, 125, 57, 33, 125, 102, 79, 118, 118, 91, 125, 49, 33, 41, 37, 35, 49 };
        for (int i = 0; i < array.length; ++i) {
            if (array2[i] != Integer.parseInt(array[i], 2)) {
                return false;
            }
        }
        return true;
    }
}
```
Après décompilation ou peut voir 2 nouvelles méthodes : "swap" et "obfuscation". "Swap" permet d'intervertir 2 éléments dans une chaine, "obfuscation" se charge d'obfusquer (comprennez "rendre illisible") une chaine.

Notre input est passé dans cette méthode puis est comparé dans "checkPassword".
```java
if (checkPassword(obfuscation(scanner.next()))) {
  System.out.println("Access granted.");
}
```
Regardons de plus près la méthode "obfuscation".
```java
public static String[] obfuscation(final String s) {
  final char[] charArray = s.toCharArray();
  final String[] array = new String[charArray.length];
  
  for (int i = 0; i < charArray.length; ++i) {
    array[i] = Integer.toBinaryString(charArray[i]);
  }
  
  for (int j = 0; j < array.length; ++j) {
    array[j] = swap(array[j], 2, 3);
    array[j] = swap(array[j], 5, 1);
  }
  return array;
}
```
Ici on peut voir que notre input est transformé en array de caractères (charArray) puis en une autre array de string qui contient le code binaire de chaque char (array).

Ensuite, dans la 2eme boucle for, on inverse les bits 2 et 3, puis les bits 5 et 1 de place (ça devient sympa).

En résumé, chaque caractère de notre input a ses bits 2,3 et 5,1 inversés.

Ce challenge est encore (évidemment) réalisable à la main mais il est préférale d'utiliser notre ami python :)
```python
password = [114, 41, 110, 82, 41, 99, 115, 125, 49, 57, 125, 57, 33, 125, 102, 79, 118, 118, 91, 125, 49, 33, 41, 37, 35, 49]

for elem in password:
	binary = list(str(bin(elem)).replace("0b", ""))
	binary[5], binary[1] = binary[1], binary[5]
	binary[2], binary[3] = binary[3], binary[2]
	print(chr(int("".join(binary), 2)), end="")
```
Résultat : j4vh4ck_15_50_funny_104821

HeroCTF{j4vh4ck_15_50_funny_104821}
