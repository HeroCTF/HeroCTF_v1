FROM ubuntu:bionic
RUN apt-get update && apt-get install -y socat libc6-riscv64-cross git build-essential \
               	      	 zlib1g-dev pkg-config libglib2.0-dev binutils-dev flex bison  \
        				 libboost-all-dev autoconf libtool libssl-dev libpixman-1-dev \
        				 libpython-dev python-pip python-capstone virtualenv \
        				 binutils-riscv64-linux-gnu

## QEMU compitation
WORKDIR /
RUN git clone https://github.com/qemu/qemu.git qemu && \
    cd /qemu                                        && \
    git checkout tags/v4.2.0                        && \
    ./configure --target-list="riscv64-linux-user"  && \
    make

RUN useradd ctf
WORKDIR /app/
COPY risky-business ./

EXPOSE 4000
USER ctf
CMD socat tcp-listen:4000,reuseaddr,fork exec:"timeout -k 121 120 /qemu/riscv64-linux-user/qemu-riscv64 -L /usr/riscv64-linux-gnu/ ./risky-business"
