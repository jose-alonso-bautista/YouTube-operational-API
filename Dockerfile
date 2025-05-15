FROM php:8.2-apache

# Enable Apache URL rewriting (required for pretty URLs)
RUN a2enmod rewrite

# Copy project files into Apache’s document root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Allow Apache to serve from port 8080 (required by Servalla)
EXPOSE 8080

# Replace default port 80 with 8080
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf && \
    sed -i 's/80/8080/g' /etc/apache2/sites-enabled/000-default.conf

CMD ["apache2-foreground"]
