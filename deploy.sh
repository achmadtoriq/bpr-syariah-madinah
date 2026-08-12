#!/usr/bin/env bash
set -e

echo "🔒 Setting writable permissions..."
chmod -R 775 writable/ 2>/dev/null || chmod -R 777 writable/ 2>/dev/null || true

echo "🗄️ Running migrations..."
php spark migrate --all 2>/dev/null || true

echo "🧹 Clearing cache..."
php spark cache:clear 2>/dev/null || true

echo "✅ Done."