<?php

namespace Poeticsoft\Forge\Alexandria;

use Poeticsoft\Heart\Main as Heart;
use Poeticsoft\Heart\Interface\Forge as ForgeInterface;
use Poeticsoft\Forge\Alexandria\Dashboard\Main as Dashboard;

class Main implements ForgeInterface
{
    private static $instance = null;

    // -------------------------------------------------------------------------------

    private $heart;

    private $id;
    private $name;
    private $version;
    private $description;
    private $plugin_path;
    private $plugin_url;

    // -------------------------------------------------------------------------------

    private $has_dashboard_widgets;
    private $has_ui_admin;
    private $has_ui_frontend;
    private $has_ui_blocks;
    private $has_ui_core_blocks;
    private $has_ui_block_control;
    private $has_ui_core_configs;
    private $has_ui_metaboxes;
    private $has_api;
    private $has_ai;

    // -------------------------------------------------------------------------------

    public Dashboard $dashboard;

    // -------------------------------------------------------------------------------

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // -------------------------------------------------------------------------------

    private function __construct()
    {

        // Metadatos
        $this->version = '0.0.0';
        $this->id = 'forge-alexandria';
        $this->name = 'Forge Alexandria';
        $this->description = 'Módulo base del ecosistema Forge';
        $this->plugin_url = '/wp-content/plugins/poeticsoft-forge-alexandria';
        $this->plugin_path = WP_PLUGIN_DIR . '/poeticsoft-forge-alexandria';

        $this->has_dashboard_widgets = true;
        $this->has_ui_admin = true;
        $this->has_ui_frontend = false;
        $this->has_ui_blocks = false;
        $this->has_ui_core_blocks = false;
        $this->has_ui_block_control = false;
        $this->has_ui_core_configs = false;
        $this->has_ui_metaboxes = false;
        $this->has_api = false;
        $this->has_ai = false;
    }

    // -------------------------------------------------------------------------------

    public function get_id()
    {
        return $this->id;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_version()
    {
        return $this->version;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_plugin_path()
    {
        return $this->plugin_path;
    }

    public function get_plugin_url()
    {
        return $this->plugin_url;
    }

    // -------------------------------------------------------------------------------

    public function get_has_dashboard_widgets()
    {
        return $this->has_dashboard_widgets;
    }

    public function get_has_ui_admin()
    {
        return $this->has_ui_admin;
    }

    public function get_has_ui_frontend()
    {
        return $this->has_ui_frontend;
    }

    public function get_has_ui_blocks()
    {
        return $this->has_ui_blocks;
    }

    public function get_has_ui_core_blocks()
    {
        return $this->has_ui_core_blocks;
    }

    public function get_has_ui_block_control()
    {
        return $this->has_ui_block_control;
    }

    public function get_has_ui_core_configs()
    {
        return $this->has_ui_core_configs;
    }

    public function get_has_ui_metaboxes()
    {
        return $this->has_ui_metaboxes;
    }

    public function get_has_api()
    {
        return $this->has_api;
    }

    public function get_has_ai()
    {
        return $this->has_ai;
    }

    // -------------------------------------------------------------------------------

    public function get_dashboard()
    {
        return $this->dashboard;
    }

    public function get_api()
    {
        return $this->api;
    }

    public function get_core_block()
    {
        return $this->core_block;
    }

    public function get_block_control()
    {
        return $this->block_control;
    }

    public function get_metabox()
    {
        return $this->metabox;
    }

    // -------------------------------------------------------------------------------

    public function init(Heart $heart)
    {

        $this->heart = $heart;

        $this->dashboard = new Dashboard($this, $heart);
    }
}
