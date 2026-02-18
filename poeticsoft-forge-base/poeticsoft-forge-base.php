<?php

/**
 * Plugin Name: Poeticsoft Forge Base
 * Plugin URI: https://poeticsoft.com/plugins/poeticsoft-forge-base
 * Description: Base module for Poeticsoft Forge with admin panel functionality
 * Version: 0.0.1
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Author: Poeticsoft Team
 * License: GPL-3.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Author URI: https://poeticsoft.com/team
 * Text Domain: poeticsoft-forge-base
 * Domain Path: /languages
 */

namespace Poeticsoft\Forge;

/**
 * Verificación de seguridad: Evitar acceso directo.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Control de Dependencia: Verifica si Poeticsoft Heart está activo.
 * Si no está presente, el plugin se desactiva automáticamente con un aviso.
 */
add_action('admin_init', function () {
    if (!class_exists('\Poeticsoft\Heart\Engine')) {
        deactivate_plugins(plugin_basename(__FILE__));

        add_action('admin_notices', function () {
            $message = __(
                'Poeticsoft Forge Base requiere que el plugin Poeticsoft Heart esté activado.',
                'poeticsoft-forge-base'
            );
            echo '<div class="error"><p><strong>' . esc_html($message) . '</strong></p></div>';
        });
    }
});

/**
 * Carga del autoloader de Composer para este módulo.
 */
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Registro del módulo en el motor central (Heart).
 * * Se engancha al action personalizado 'poeticsoft_heart_register'
 * que dispara el Engine durante su inicialización.
 */
add_action('poeticsoft_heart_register', function ($engine) {
    // Usamos la clase Base del módulo actual
    $forge = \Poeticsoft\Forge\Base::instance();
    $engine->registrar_forge('forge-base', $forge);
}, 10);

/**
 * Hook de activación.
 * Previene la activación si el núcleo no está presente.
 */
register_activation_hook(__FILE__, function () {
    if (!class_exists('\Poeticsoft\Heart\Engine')) {
        wp_die(
            esc_html__('Este plugin requiere Poeticsoft Heart para funcionar.', 'poeticsoft-forge-base'),
            esc_html__('Dependencia Requerida', 'poeticsoft-forge-base'),
            ['back_link' => true]
        );
    }
});

/**
 * Hook de desactivación.
 * Limpia la caché del sistema para evitar residuos de hooks.
 */
register_deactivation_hook(__FILE__, function () {
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
    }
});
