#!/bin/bash
set -e

echo "============================================"
echo "[UptimeGuard] Container starting..."
echo "[UptimeGuard] PORT=$PORT"
echo "[UptimeGuard] REVERB_PORT=${REVERB_PORT:-not set}"
echo "[UptimeGuard] REVERB_HOST=${REVERB_HOST:-not set}"
echo "[UptimeGuard] REVERB_SCHEME=${REVERB_SCHEME:-not set}"
echo "[UptimeGuard] APP_ENV=${APP_ENV:-not set}"
echo "[UptimeGuard] DB_HOST=${DB_HOST:-not set}"
echo "============================================"

# Ensure storage directories exist and are writable
chmod -R 775 /app/storage /app/bootstrap/cache 2>/dev/null || true
chown -R www-data:www-data /app/storage /app/bootstrap/cache 2>/dev/null || true

# Run migrations automatically on deploy
echo "[UptimeGuard] Running migrations..."
php /app/artisan migrate --force 2>&1 || echo "[UptimeGuard] Migration warning (may already be up to date)"

# Clear and rebuild caches
echo "[UptimeGuard] Optimizing Laravel..."
php /app/artisan config:clear 2>&1
php /app/artisan route:cache 2>&1
php /app/artisan view:cache 2>&1

echo "[UptimeGuard] Starting supervisord..."
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf
