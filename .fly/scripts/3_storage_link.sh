if [ -z "$RELEASE_COMMAND" ]; then
    php /var/www/html/artisan storage:link
fi
