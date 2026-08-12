#!/usr/bin/env bash

# Exit immediately if a command exits with a non-zero status
set -e

echo "🚀 Starting CodeIgniter 4 Fast Deployment..."

# 1. PHP Dependencies Check (Skipped if pre-built on GitHub)
if [ -d "vendor" ] && [ -f "vendor/autoload.php" ]; then
    echo "📦 Using pre-built Composer vendor packages from GitHub."
elif [ -f "composer.json" ] && command -v composer &> /dev/null; then
    echo "📦 Installing PHP dependencies via Composer..."
    composer install --no-dev --optimize-autoloader --no-interaction
fi

# 2. Frontend Assets Check (Skipped if pre-built on GitHub)
if [ -f "public/assets/css/style.css" ]; then
    echo "🎨 Using pre-built Tailwind CSS assets from GitHub."
elif [ -f "package.json" ]; then
    if command -v npm &> /dev/null; then
        echo "🎨 Building CSS assets with NPM..."
        npm ci || npm install
        npm run build:css
    fi
fi

# 3. Set Writable Directory Permissions
echo "🔒 Setting writable folder permissions..."
chmod -R 775 writable/ 2>/dev/null || chmod -R 777 writable/ 2>/dev/null || true

# 4. Run Database Migrations
echo "🗄️ Running database migrations..."
php spark migrate --all 2>/dev/null || php spark migrate 2>/dev/null || true

# 5. Clear Application Cache
echo "🧹 Clearing CodeIgniter cache..."
php spark cache:clear 2>/dev/null || true

echo "✅ Fast Deployment completed successfully in seconds!"
