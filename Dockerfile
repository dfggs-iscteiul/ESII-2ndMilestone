# Source Image name
from ubuntu:16.04
# Mainter Name
maintainer Amar Singh
# Command to update and install Apache packages
RUN apt-get update && apt-get install apache2 -y
#Permissions to folder wp-content
RUN chmod -v ./Wordpress/wp-content 755
# open port 
EXPOSE 80
# Command to run Apache server in background
CMD /usr/sbin/apache2ctl -D FOREGROUND
