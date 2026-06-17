#!/bin/bash
set -e

echo "============================================"
echo "[UptimeGuard] Container starting..."
echo "[UptimeGuard] PORT=$PORT"
echo "[UptimeGuard] APP_ENV=${APP_ENV:-not set}"
echo "[UptimeGuard] APP_URL=${APP_URL:-not set}"
echo "[UptimeGuard] DB_HOST=${DB_HOST:-not set}"
echo "[UptimeGuard] DB_DATABASE=${DB_DATABASE:-not set}"
echo "[UptimeGuard] BROADCAST_CONNECTION=${BROADCAST_CONNECTION:-not set}"
echo "[UptimeGuard] QUEUE_CONNECTION=${QUEUE_CONNECTION:-not set}"
echo "============================================"

# Ensure storage directories exist and are writable
mkdir -p /app/storage/logs /app/storage/framework/{cache/data,sessions,views} /app/bootstrap/cache
chmod -R 775 /app/storage /app/bootstrap/cache 2>/dev/null || true
chown -R www-data:www-data /app/storage /app/bootstrap/cache 2>/dev/null || true

# Generate .env file from environment variables for PHP-FPM compatibility
echo "[UptimeGuard] Generating .env from environment..."
env | grep -E '^(APP_|DB_|SESSION_|QUEUE_|CACHE_|BROADCAST_|REVERB_|VITE_|TELEGRAM_|LOG_|MAIL_|PORT=)' > /app/.env 2>/dev/null || true
echo "[UptimeGuard] .env file created with $(wc -l < /app/.env) variables"

# Run migrations automatically on deploy
echo "[UptimeGuard] Running migrations..."
php /app/artisan migrate --force 2>&1 || echo "[UptimeGuard] Migration warning (may already be up to date)"

# Clear and rebuild caches with actual env vars
echo "[UptimeGuard] Optimizing Laravel..."
php /app/artisan config:cache 2>&1
php /app/artisan route:cache 2>&1
php /app/artisan view:cache 2>&1
php /app/artisan event:cache 2>&1

echo "[UptimeGuard] Optimization complete!"

# Quick DB connection test
echo "[UptimeGuard] Testing database connection..."
php /app/artisan tinker --execute="try { DB::connection()->getPdo(); echo 'DB OK: '.DB::connection()->getDatabaseName(); } catch(\Exception \$e) { echo 'DB FAIL: '.\$e->getMessage(); }" 2>&1 || echo "[UptimeGuard] DB test skipped"

echo "[UptimeGuard] Starting supervisord (all services)..."
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf
