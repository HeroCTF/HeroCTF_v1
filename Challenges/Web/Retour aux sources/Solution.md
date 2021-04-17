Ce premier challenge Web est une introduction à cette même catégorie.

Pour le résoudre, il suffit d'inspecter le code source de la page de login sur laquelle on arrive (clic droit > code source de la page).

On trouve un mot de passe en commentaire dans le code :
```html
<div class="form-group">
  <label>Password</label>
  <input type="password" class="form-control" name="password">
  <!-- password : baseball123 -->
</div>
```
Un message nous indique sur le formulaire de connexion que l'on peut contacter l'utilisateur "admin". On essaye donc de se connecter avec "admin" comme identifiant et "baseball123" comme mot de passe et le message suivant s'affiche : `Bravo ! Flag: 1m_4_h4ck3r_n0w_199248 `

HeroCTF{1m_4_h4ck3r_n0w_199248}
