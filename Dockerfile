FROM php:8.3-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libmariadb-dev \
    default-mysql-client \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql \
    && a2enmod rewrite \
    && apt-get clean

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

# Enable Apache modules
RUN a2enmod rewrite ssl

# Create SSL certificates for localhost
RUN mkdir -p /etc/apache2/ssl && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/apache2/ssl/private.key \
    -out /etc/apache2/ssl/certificate.crt \
    -subj "/C=US/ST=State/L=City/O=Organization/CN=localhost"

# Copy Apache SSL configuration
RUN echo '<VirtualHost *:443>\n\
    ServerName localhost\n\
    DocumentRoot /var/www/html\n\
    SSLEngine on\n\
    SSLCertificateFile /etc/apache2/ssl/certificate.crt\n\
    SSLCertificateKeyFile /etc/apache2/ssl/private.key\n\
    <Directory /var/www/html>\n\
        AllowOverride All\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/default-ssl.conf && \
    a2ensite default-ssl

# Expose ports
EXPOSE 80 443

# Start Apache in foreground
CMD ["apache2-foreground"]
