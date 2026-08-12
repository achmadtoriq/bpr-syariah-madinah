#!/usr/bin/env bash

# Exit immediately if a command exits with a non-zero status
set -e

echo "🚀 Starting CodeIgniter 4 Deployment..."

# 1. Update Composer dependencies
if [ -f "composer.json" ]; then
    echo "📦 Installing PHP dependencies..."
    composer install --no-dev --optimize-autoloader --no-interaction
fi

# 2. Build Frontend Assets (Tailwind CSS)
if [ -f "package.json" ]; then
    if command -v npm &> /dev/null; then
        echo "🎨 Building CSS assets with NPM..."
        npm ci || npm install
        npm run build:css
    elif command -v npx &> /dev/null; then
        echo "🎨 Building CSS assets with NPX..."
        npx tailwindcss@3 -i ./resources/css/input.css -o ./public/assets/css/style.css --minify
    else
        echo "ℹ️ NPM/Node.js tidak ditemukan di hosting. Menggunakan CSS hasil kompilasi GitHub Actions."
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

echo "✅ Deployment script completed successfully!"
