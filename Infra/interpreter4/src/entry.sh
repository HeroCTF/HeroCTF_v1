#!/bin/bash

while :
do
	su -c "exec socat TCP-LISTEN:3005,reuseaddr,fork EXEC:'python3 /home/pwnuser/shell.py,stderr'" - pwnuser;
done
