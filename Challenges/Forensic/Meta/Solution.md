Quelque chose se cache apparemment dans cette image.

Pour résoudre ce challenge, on peut utiliser un outil en ligne (comme https://www.aperisolve.fr/ par Apérikube) ou alors l'outils exiftool par exemple.
```bash
$ exiftool image.jpg 
ExifTool Version Number         : 11.91
File Name                       : image.jpg
Directory                       : .
File Size                       : 75 kB
File Modification Date/Time     : 2020:04:15 20:06:57+02:00
File Access Date/Time           : 2020:04:15 20:07:19+02:00
File Inode Change Date/Time     : 2020:04:15 20:07:19+02:00
File Permissions                : rw-rw-rw-
File Type                       : JPEG
[...]
Description                     : 1m_f0r3n51c5_3xp3r7_010138
[...]
Image Size                      : 780x438
Megapixels                      : 0.342
Thumbnail Image                 : (Binary data 6892 bytes, use -b option to extract)
GPS Position                    : 0 deg 0' 0.00", 0 deg 0' 0.00"
```

HeroCTF{1m_f0r3n51c5_3xp3r7_010138}
