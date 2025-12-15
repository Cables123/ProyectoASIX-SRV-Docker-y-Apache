FROM php:8.2-apache

# 1. Instalar extensiones PHP necesarias (mysqli y REDIS)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli 
RUN pecl install redis && docker-php-ext-enable redis

# 2. Habilitar módulos de Apache necesarios
RUN a2enmod rewrite ssl headers

# 3. Crear carpeta para certificados (Ruta estándar de Debian o personalizada)
RUN mkdir -p /etc/apache2/certs

# 4. Generar certificados SSL autofirmados
RUN apt-get update && apt-get install -y openssl \
    && openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/apache2/certs/server.key \
    -out /etc/apache2/certs/server.crt \
    -subj "/C=ES/ST=Catalunya/L=Barcelona/O=ASIX Lab/OU=IT/CN=*.local" \
    && apt-get clean

# 5. Permisos de los certificados
RUN chmod 600 /etc/apache2/certs/server.key \
    && chmod 644 /etc/apache2/certs/server.crt

# 6. Copiar tu configuración de VirtualHosts
COPY httpd-custom.conf /etc/apache2/sites-available/000-default.conf

# 7. Copiar el código fuente (La ruta estándar en esta imagen es /var/www/html)
COPY sites/ /var/www/html/

# 8. Ajustar permisos para que Apache (usuario www-data) pueda leer/escribir si es necesario
RUN chown -R www-data:www-data /var/www/html

LABEL maintainer="v.redel@sapalomera.cat"
LABEL description="Apache con PHP 8.2 integrado"