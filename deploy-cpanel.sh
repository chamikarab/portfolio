#!/bin/bash
set -euo pipefail

APP_DIR="${APP_DIR:-$HOME/laravel_app/portfolio}"
PUBLIC_HTML="${PUBLIC_HTML:-$HOME/public_html}"
BRANCH="${BRANCH:-main}"

cd "$APP_DIR"

git fetch origin
git checkout "$BRANCH"
git pull origin "$BRANCH"

composer install --no-dev --optimize-autoloader

npm ci
npm run build

php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Sync built assets and static files when public_html is separate from Laravel public/
if [ ! -L "$PUBLIC_HTML" ] && [ -d "$PUBLIC_HTML" ]; then
    mkdir -p "$PUBLIC_HTML/build" "$PUBLIC_HTML/images"
    rsync -av --delete "$APP_DIR/public/build/" "$PUBLIC_HTML/build/"
    rsync -av "$APP_DIR/public/images/" "$PUBLIC_HTML/images/"
fi

echo "Deploy complete."
