FROM php:8.2-apache

# Enable Apache mod_rewrite for the .htaccess
RUN a2enmod rewrite headers

# Change document root for Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install any additional PHP extensions if needed
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy your project files into the container
COPY . /var/www/html/

# Set the working directory to where your application is located inside the container
WORKDIR /var/www/html/