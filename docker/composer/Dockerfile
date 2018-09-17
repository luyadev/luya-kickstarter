FROM composer:latest
ARG GITHUB_TOKEN
RUN composer config --global --auth github-oauth.github.com "$GITHUB_TOKEN"
RUN composer global require "fxp/composer-asset-plugin:~1.4"
