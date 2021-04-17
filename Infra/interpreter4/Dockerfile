FROM ubuntu

RUN apt-get update && apt upgrade -y
RUN apt-get install -y socat python3
RUN groupadd ctf

RUN useradd -G ctf -m -s /bin/rbash pwnuser
RUN useradd -G ctf pwnflag

COPY src/ /home/pwnuser/

RUN chown pwnflag:pwnflag /home/pwnuser/shell.py
RUN chown pwnflag:pwnflag /home/pwnuser

RUN chmod 4755 /home/pwnuser/shell.py
RUN chmod 4755 /home/pwnuser/entry.sh

EXPOSE 3005
ENTRYPOINT ["/home/pwnuser/entry.sh"]
