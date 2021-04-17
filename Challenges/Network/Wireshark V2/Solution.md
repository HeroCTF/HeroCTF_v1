Même chose que pour le "Wireshark V1", on ouvre le fichier "Capture2.pcapng" avec Wireshark et on applique le filtre http.

L'énoncé nous met sur la voie : on doit étudier l'upload d'un fichier.
La requête suivant attire notre attention :
```
160	6.521582	127.0.0.1	127.0.0.1	HTTP	893	POST /upload/ HTTP/1.1  (text/plain)
```
```
EQFC@á#PÙ¡ãÃÚÒP'ù+?POST /upload/ HTTP/1.1
Host: localhost
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3
Accept-Encoding: gzip, deflate
Content-Type: multipart/form-data; boundary=---------------------------363049463139617283832138748780
Content-Length: 257
Origin: http://localhost
DNT: 1
Connection: keep-alive
Referer: http://localhost/upload/
Upgrade-Insecure-Requests: 1

-----------------------------363049463139617283832138748780
Content-Disposition: form-data; name="image"; filename="flag.txt"
Content-Type: text/plain

HeroCTF{3xp0rt_f1l3s_w1th_w1r3sh4rk}
-----------------------------363049463139617283832138748780--
```
HeroCTF{3xp0rt_f1l3s_w1th_w1r3sh4rk}
