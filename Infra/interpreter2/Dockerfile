FROM ubuntu

RUN apt-get update && apt upgrade -y
RUN apt-get install -y socat python3
RUN groupadd ctf

RUN useradd -G ctf -m -s /bin/rbash pwnuser
RUN useradd -G ctf pwnflag

RUN echo 'export TERM=xterm' >> /home/pwnuser/.bashrc 

RUN mkdir -p /home/pwnuser/programs

COPY src/ /home/pwnuser/

RUN ln -s /bin/ls /home/pwnuser/programs
RUN ln -s /bin/cat /home/pwnuser/programs
RUN ln -s /usr/bin/clear /home/pwnuser/programs
RUN ln -s /usr/bin/groups /home/pwnuser/programs
RUN ln -s /usr/bin/dircolors /home/pwnuser/programs

RUN chown pwnflag:pwnflag /home/pwnuser/shell.py
RUN chown pwnflag:pwnflag /home/pwnuser

RUN chmod 4755 /home/pwnuser/shell.py
RUN chmod 4755 /home/pwnuser/entry.sh

EXPOSE 3003
ENTRYPOINT ["/home/pwnuser/entry.sh"]
