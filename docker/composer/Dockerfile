FROM composer:latest
COPY ./github_token.txt /github_token
RUN composer config -g github-oauth.github.com $(cat /github_token)
RUN composer global require "fxp/composer-asset-plugin:~1.4"