<?php

/**
 * Uninstall script for Poeticsoft Forge Base
 *
 * @package Poeticsoft\Forge
 * @since 0.0.1
 */

// If uninstall not called from WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {

  exit;
}

// Clear any cached data

if (function_exists('wp_cache_flush')) {

  wp_cache_flush();
}
