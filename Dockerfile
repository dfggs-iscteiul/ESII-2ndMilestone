# Source Image name
from ubuntu:16.04
# Mainter Name
maintainer Amar Singh
# Command to update and install Apache packages
RUN apt-get update && apt-get install apache2 -y
#JAVA
RUN apk add openjdk8
ENV JAVA_HOME /usr/lib/jvm/java-1.8-openjdk
ENV PATH $PATH:$JAVA_HOME/bin
# open port 
EXPOSE 80
# Command to run Apache server in background
CMD /usr/sbin/apache2ctl -D FOREGROUND

