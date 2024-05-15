# ----------------------------------------

# We're forced to use php 8.2 till this issue is not resolved (imagick related)
# https://github.com/mlocati/docker-php-extension-installer/issues/857#issuecomment-1904396267

# Application CLI
FROM php:8.1-cli-alpine3.19 as cli

# Install composer
COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

ARG UID=1000
ARG GID=1000

WORKDIR /opt/apps/app

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader --prefer-dist

COPY . .

RUN composer install --prefer-dist

# Default stage when none given
FROM cli