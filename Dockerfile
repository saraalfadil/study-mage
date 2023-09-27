# Use an official PHP 5.4 image as the base image
FROM php:5.4-apache

# The jessie-updates repository is no longer supported Debian: all the updates have been merged with the main repository, and there will be no further non-security updates. 
# Any references to jessie-updates in sources.list or sources.list.d files need to be removed or else "apt-get update" will fail
RUN echo "deb [check-valid-until=no] http://archive.debian.org/debian jessie main" > /etc/apt/sources.list.d/jessie.list
RUN echo "deb [check-valid-until=no] http://archive.debian.org/debian jessie-backports main" > /etc/apt/sources.list.d/jessie-backports.list
RUN sed -i s/deb.debian.org/archive.debian.org/g /etc/apt/sources.list
RUN sed -i s/httpredir.debian.org/archive.debian.org/g /etc/apt/sources.list
RUN sed -i 's|security.debian.org|archive.debian.org/debian-security/|g' /etc/apt/sources.list 
RUN sed -i '2d' /etc/apt/sources.list 
# Install the debian-archive-keyring from Stretch - fixes key verification error
RUN apt-cache policy debian-archive-keyring
# Fixes invalid signature error (replace with actual public key):
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys AA8E81B4331F7F50

# Install required PHP extensions
RUN apt-get update && apt-get upgrade -y --force-yes && apt-get install -y --force-yes libmcrypt-dev && docker-php-ext-install pdo pdo_mysql mcrypt
RUN apt-get install git -y --force-yes

# Set up Apache virtual host
COPY . /var/www/html
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Enable mod_rewrite for Laravel
RUN a2enmod rewrite

# Set the 'ServerName' directive globally to suppress error message
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Need composer legacy version
COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer

# Start Apache
CMD ["apache2-foreground"]
