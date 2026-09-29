# =============================================================================
# Imagen de desarrollo — Escalafon (Laravel 5.4 / PHP 7.4)
# =============================================================================
# NO usar FrankenPHP ni Laravel Octane: Octane exige Laravel >= 8 y este
# proyecto es Laravel 5.4. Para live coding basta el servidor embebido de PHP
# con el router server.php que ya trae el proyecto.
#
# El código NO se copia a la imagen: compose.yml lo monta en bind mount (:z),
# así que cualquier cambio en el host se ve al instante.
# =============================================================================
FROM docker.io/library/php:7.4-cli

LABEL org.opencontainers.image.title="Escalafon (dev)" \
      org.opencontainers.image.description="Laravel 5.4 + PHP 7.4 para live coding con Podman"

# -----------------------------------------------------------------------------
# Dependencias del sistema
# -----------------------------------------------------------------------------
# Debian bullseye ya está archivado: deb.debian.org/debian-security sigue
# sirviendo un índice obsoleto y devuelve 404 al descargar los .deb, lo que
# rompe la construcción. Se elimina ese repo (solo afecta a parches de
# seguridad de un EOL, no al build) y se limpian las listas.
RUN set -eux; \
    sed -i '/bullseye-security/d' /etc/apt/sources.list; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        libzip-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libonig-dev \
        libxml2-dev \
        libcurl4-openssl-dev \
        libicu-dev; \
    rm -rf /var/lib/apt/lists/*

# -----------------------------------------------------------------------------
# Extensiones PHP
# -----------------------------------------------------------------------------
# pdo_mysql / mysqli  -> base de datos
# zip                 -> PHPWord / PHPExcel (docx, xlsx)
# gd + intl           -> reportes y conversión de caracteres
# opcache             -> con validate_timestamps=1 para live coding
RUN set -eux; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        mysqli \
        zip \
        gd \
        intl \
        bcmath \
        exif \
        opcache

# -----------------------------------------------------------------------------
# Xdebug 3.1 (última versión compatible con PHP 7.4)
# -----------------------------------------------------------------------------
# Se instala y activa siempre, pero queda en modo "off" (ver php.ini-dev).
# Para depurar basta con XDEBUG_MODE=debug XDEBUG_START_WITH_REQUEST=yes en
# compose.yml: no hay que reconstruir la imagen.
RUN pecl install xdebug-3.1.6 && docker-php-ext-enable xdebug

# -----------------------------------------------------------------------------
# Composer
# -----------------------------------------------------------------------------
COPY --from=docker.io/library/composer:2 /usr/bin/composer /usr/local/bin/composer

# -----------------------------------------------------------------------------
# Configuración PHP
# -----------------------------------------------------------------------------
COPY docker/php/php.ini-dev /usr/local/etc/php/conf.d/zz-app.ini
COPY docker/entrypoint-dev /usr/local/bin/entrypoint-dev
RUN chmod +x /usr/local/bin/entrypoint-dev

# -----------------------------------------------------------------------------
# Aplicación
# -----------------------------------------------------------------------------
WORKDIR /var/www/html

# PHP_CLI_SERVER_WORKERS: el servidor embebido de PHP es single-thread; sin
# workers, una página que pida un recurso al mismo servidor se queda colgada.
ENV PORT=8080 \
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_MEMORY_LIMIT=-1 \
    PHP_CLI_SERVER_WORKERS=4

EXPOSE 8080

# El HEALTHCHECK vive en compose.yml (podman-compose lo descarta del build).
ENTRYPOINT ["/usr/local/bin/entrypoint-dev"]
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public", "server.php"]
