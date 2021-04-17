Dans ce challenge, le but est de trouver le mot de passe du zip contenant le flag.

Pour ceci, on peut utiliser zip2john et john the ripper avec la fameuse wordlist "rockyou".
(Ce challenge est aussi faisable avec des outils en ligne)
```bash
$ zip2john flag.txt.zip | tee flag.hash
ver 1.0 efh 5455 efh 7875 flag.txt.zip/flag.txt PKZIP Encr: 2b chk, TS_chk, cmplen=45, decmplen=33, crc=711DEEDE
flag.txt.zip/flag.txt:$pkzip2$1*2*2*0*2d*21*711deede*0*42*0*2d*711d*8ec4*9c16582e4014fd681eee89c32990003dbde6d812e95b58b8ad0b2a65c52d3d2648d63614b350e1a297a028d8c2*$/pkzip2$:flag.txt:flag.txt.zip::flag.txt.zip
$ john --wordlist=/usr/share/wordlists/rockyou.txt flag.hash 
Using default input encoding: UTF-8
Loaded 1 password hash (PKZIP [32/64])
Will run 8 OpenMP threads
Press 'q' or Ctrl-C to abort, almost any other key for status
toto             (flag.txt.zip/flag.txt)
1g 0:00:00:00 DONE (2020-04-15 18:34) 11.11g/s 910222p/s 910222c/s 910222C/s rossoneri..janiece
Use the "--show" option to display all of the cracked passwords reliably
Session completed
```
On trouve donc "toto" comme mot de passe pour le zip.

On dézippe et trouve le flag.
```bash
$ unzip -P toto flag.txt.zip 
Archive:  flag.txt.zip
 extracting: flag.txt                
$ cat flag.txt
HeroCTF{bru73_f0rc3_4h4h_010134}
```
HeroCTF{bru73_f0rc3_4h4h_010134}
