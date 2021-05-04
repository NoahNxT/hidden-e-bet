#DockerFile for hosting Tor service with nginx on Ubuntu
#It tells docker, from which base image you want to base your image from. In our example, we are creating an image from the ubuntu image.
FROM ubuntu:latest
#The MAINTAINER command is the person who is going to maintain this image.
EXPOSE 9090

ARG HOSTNAME="cat /var/lib/tor/hidden_service/hostname"


#installs
RUN apt-get update && apt-get install -y \
    nano \
    psmisc \
    tor \
    lsof\
    nginx\
    python3

RUN apt-get install tor -y

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN service nginx start
#Start Tor Service
RUN service tor start
#Check if Tor service is running
#RUN service tor status

#Add user tor and auto login
RUN useradd -ms /bin/bash tor
#USER tor
#WORKDIR /home/tor



RUN mkdir /var/www/onion
RUN chown root:tor /var/www/onion
RUN chmod 775 /var/www/onion

#copy all project files to onion folder
COPY . /var/www/onion
RUN cd /var/www/onion

#Install Laravel project
#Database
#Composer


#RUN echo "<html><head><title>Your Tor site is online</title></head><body>Welcome to the Deepweb</body></html>" > index.html
#edit files tor config
RUN sed -i 's,#HiddenServiceDir /var/lib/tor/hidden_service/,HiddenServiceDir /var/lib/tor/hidden_service/,g' /etc/tor/torrc
RUN sed -i '0,/#HiddenServicePort 80 127.0.0.1:80/s//HiddenServicePort 80 0.0.0.0:9090/g' /etc/tor/torrc
RUN sed -i 's,#SocksPort 9050 # Default: Bind to localhost:9050 for local connections.,SocksPort 9050 # Default: Bind to localhost:9050 for local connections.,g' /etc/tor/torrc

#restart tor service
RUN service tor restart

#get your .onion adress/lib/tor/hidden_service
RUN echo $HOSTNAME

RUN cd /var/www/onion
CMD service tor restart ; python3 -m http.server --bind 0.0.0.0 9090


