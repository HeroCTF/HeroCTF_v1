Le flag a été chiffré grâce à la clé privée RSA se trouvant dan sle fichier "privkey.pem".
On peut utiliser openssl pour déchiffrer le flag : 

```bash
$ openssl rsautl -decrypt -inkey privkey.pem -in flag.enc -out result
$ cat result
HeroCTF{f1rst_st3p_w1th_rsa}
```
