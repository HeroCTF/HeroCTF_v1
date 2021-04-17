# Alpine with Flask
#
# VERSION		0.0.1

FROM alpine

RUN apk update && apk upgrade
RUN apk add python3
RUN python3 -m pip install flask
RUN mkdir /home/heroctf && cd /home/heroctf
ADD server.py /home/heroctf
RUN mkdir /home/heroctf/templates
ADD templates/ /home/heroctf/templates

EXPOSE 6666
CMD ["/usr/bin/python3", "/home/heroctf/server.py"]

# sudo docker build -t apline/flask .
# sudo docker run -p 80:5000 <image_id>
