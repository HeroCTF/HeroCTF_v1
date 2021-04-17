Ce challenge utilise du jode JavaScript basique pour l'authentification.

Pour valider ce challenge, comme pour le précédent, on examine le code source de la page de connexion.
On y trouve un code JavaScript intéressant:
```html
<script type="text/javascript">
      var _0x5942=['getElementById','username','value','password','admin','Bravo\x20!\x20Vous\x20pouvez\x20valider\x20le\x20challenge\x20avec\x20le\x20mot\x20de\x20passe\x20!','Nope,\x20you\x27re\x20a\x20naughty\x20hacker.'];var _0x4cdc=function(_0x594214,_0x4cdc31){_0x594214=_0x594214-0x0;var _0x271b6f=_0x5942[_0x594214];return _0x271b6f;};function login(){var _0x1d5087=document[_0x4cdc('0x0')](_0x4cdc('0x1'))[_0x4cdc('0x2')];var _0x5c677e=document[_0x4cdc('0x0')](_0x4cdc('0x3'))['value'];if(_0x1d5087==_0x4cdc('0x4')&&_0x5c677e=='u_g0t_my_p455wd_4g41n'){alert(_0x4cdc('0x5'));}else{alert(_0x4cdc('0x6'));}}
</script>
```

Mettons le en forme : 

```html
<script type="text/javascript">
  var _0x4cdc = function(_0x594214, _0x4cdc31) {
      _0x594214 = _0x594214 - 0x0;
      var _0x271b6f = _0x5942[_0x594214];
      return _0x271b6f;
  };

  function login() {
      var _0x1d5087 = document[_0x4cdc('0x0')](_0x4cdc('0x1'))[_0x4cdc('0x2')];
      var _0x5c677e = document[_0x4cdc('0x0')](_0x4cdc('0x3'))['value'];
      if (_0x1d5087 == _0x4cdc('0x4') && _0x5c677e == 'u_g0t_my_p455wd_4g41n') {
          alert(_0x4cdc('0x5'));
      } else {
          alert(_0x4cdc('0x6'));
      }
  }
</script>
```
HeroCTF{u_g0t_my_p455wd_4g41n}
