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

namespace Poeticsoft;

// Security check

if (!defined('ABSPATH')) {
    
  exit;
}

// Check if Poeticsoft Heart is active

add_action(
  'admin_init', 
  function() {

    if (!class_exists('\Poeticsoft\Heart\Engine')) {

      deactivate_plugins(plugin_basename(__FILE__));

      add_action(
        'admin_notices', 
        function() {
          echo '<div class="error"><p>';
          echo '<strong>Poeticsoft Forge Base</strong> requiere que el plugin <strong>Poeticsoft Heart</strong> esté activado.';
          echo '</p></div>';
        }
      );

      return;
    }
  }
);

// Load autoloader if available

if (file_exists(__DIR__ . '/vendor/autoload.php')) {

  require_once __DIR__ . '/vendor/autoload.php';
}

// Register module with Poeticsoft Heart

add_action(
  'poeticsoft_heart_register',
  function($engine) {

    // Load class only when Heart is available
    require_once __DIR__ . '/class/Forge/Base.php';

    $forge = new \Poeticsoft\Forge\Base();
    $engine->registrar_forge('forge-base', $forge);
  },
  10
);

// Activation hook

register_activation_hook(__FILE__, function() {

  if (!class_exists('\Poeticsoft\Heart\Engine')) {

    wp_die(
      'Este plugin requiere Poeticsoft Heart para funcionar.',
      'Dependencia Requerida',
      ['back_link' => true]
    );
  }
});

// Deactivation hook

register_deactivation_hook(__FILE__, function() {

  if (function_exists('wp_cache_flush')) {
      
    wp_cache_flush();
  }
});
