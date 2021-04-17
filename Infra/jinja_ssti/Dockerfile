# Alpine with Flask
#
# VERSION		0.0.1

FROM alpine

RUN apk update && apk upgrade
RUN apk add python3
RUN python3 -m pip install flask
RUN mkdir -p /home/heroctf/templates && cd /home/heroctf
ADD templates/ /home/heroctf/templates
ADD ssti.py /home/heroctf

EXPOSE 5000
CMD ["/usr/bin/python3", "/home/heroctf/ssti.py"]

# sudo docker build -t apline/flask .
# sudo docker run -p 80:5000 <image_id>
