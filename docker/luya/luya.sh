#!/bin/sh
set -e
cd /app/public_html/
exec php index.php "$@"