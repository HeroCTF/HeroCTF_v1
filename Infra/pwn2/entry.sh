#!/bin/bash

while :
do
	su -c "exec socat TCP-LISTEN:3001,reuseaddr,fork EXEC:'/pwn/challenge,stderr'" - pwnuser;
done
