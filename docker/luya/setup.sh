#!/bin/sh
set -e
chmod 777 /app/public_html/assets/
chmod 777 /app/public_html/storage/
luya migrate --interactive=0
luya import
luya admin/setup --email=admin@admin.com --password=admin --firstname=John --lastname=Doe --interactive=0