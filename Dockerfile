FROM php:8.1-apache

ENV WEB_ROOT /app/public
ENV PORT $PORT
WORKDIR /app

COPY . /app
RUN chown -R www-data:www-data /app
# Change apache listening port and web root
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && \
    sed -ri -e 's!/var/www/html!${WEB_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${WEB_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

USER www-data
EXPOSE $PORT

CMD ["apache2-foreground"]
