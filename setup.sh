#!/bin/bash
# Script de automatización - Configuración del proyecto

echo "🚀 Configurando permisos..."
sudo chown -R www-data:www-data /var/www/html/italikasiete
sudo find /var/www/html/italikasiete -type d -exec chmod 755 {} \;
sudo find /var/www/html/italikasiete -type f -exec chmod 644 {} \;

echo "📦 Importando base de datos..."
sudo mysql < database.sql

echo "✅ Configuración completada!"
