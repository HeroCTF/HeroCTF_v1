FROM ubuntu

RUN apt-get update && apt upgrade -y
RUN apt-get install -y socat
RUN groupadd ctf

RUN mkdir /pwn

COPY challenge /pwn/challenge
COPY flag.txt /pwn/
COPY entry.sh /pwn/

RUN useradd -G ctf --home=/pwn pwnuser
RUN useradd -G ctf --home=/pwn pwnflag

RUN chown pwnflag:pwnflag /pwn/challenge
RUN chown pwnflag:pwnflag /pwn

RUN chmod 4755 /pwn/challenge
RUN chmod 4755 /pwn/entry.sh

EXPOSE 3000
ENTRYPOINT ["/pwn/entry.sh"]
