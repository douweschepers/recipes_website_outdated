#!/bin/bash

# Check if a command is provided
if [ "$#" -eq 0 ]; then
    echo "Usage: ./deployment/script/run-artisan <artisan-command>"
    exit 1
fi

# Run the artisan command inside the PHP container
docker exec -it php_recipes_outdated php /var/www/html/artisan "$@"
