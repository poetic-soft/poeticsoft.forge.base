<?php

/**
 * Script de desinstalación para Poeticsoft Forge Base.
 *
 * Este archivo se ejecuta cuando el usuario elimina el plugin desde el panel.
 * Se encarga de limpiar cualquier rastro específico de este módulo.
 *
 * @package Poeticsoft\Forge
 * @since 0.0.1
 */

namespace Poeticsoft\Forge;

/**
 * Verificación de seguridad: Salir si no es una llamada oficial de WordPress.
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

/**
 * Limpieza de caché.
 * Asegura que no queden rastros de hooks o estados del módulo en el sistema de objetos.
 */
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}

/**
 * Nota para el futuro:
 * Si este módulo llegara a guardar configuraciones en la base de datos (options),
 * aquí es donde deberías añadir:
 * delete_option('poeticsoft_forge_base_settings');
 */
