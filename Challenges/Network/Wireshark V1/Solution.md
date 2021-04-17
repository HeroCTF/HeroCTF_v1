On se retrouve ici avec un fichier "Capture.pcapng" qu'on peut ouvrir avec Wireshark par exemple.

Comme indiqué dans l'indice, on peut commencer par appliquer le filtre "HTTP".
Une fois cela fait, on trouvera le flag dans une requête POST
```
4460	32.060334	127.0.0.1	127.0.0.1	HTTP	778	POST /html/?page=asso_connect HTTP/1.1  (application/x-www-form-urlencoded)
```
```
EÞÌ@ÖPK)´<0oP'ùqPOST /html/?page=asso_connect HTTP/1.1
Host: localhost
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3
Accept-Encoding: gzip, deflate
Content-Type: application/x-www-form-urlencoded
Content-Length: 113
Origin: http://localhost
DNT: 1
Connection: keep-alive
Referer: http://localhost/html/?page=asso_connect_form
Cookie: PHPSESSID=63lpss9chcna46krfffkfhbckt
Upgrade-Insecure-Requests: 1

email=admin%40example.com&password=HeroCTF%7Bf1rst_sn1ff_w1th_w1r3sh4rk%7D&type=Administrateur+de+l%27association
```

HeroCTF{f1rst_sn1ff_w1th_w1r3sh4rk}
