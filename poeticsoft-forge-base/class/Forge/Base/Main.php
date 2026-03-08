<?php

namespace Poeticsoft\Forge\Base;

use Poeticsoft\Heart\Main as Heart;
use Poeticsoft\Heart\Forge\ForgeInterface;
use Poeticsoft\Forge\Base\Dashboard\Main as Dashboard;
use Poeticsoft\Forge\Base\API\Main as API;
use Poeticsoft\Forge\Base\CoreBlock\Main as CoreBlock;
use Poeticsoft\Forge\Base\MetaBox\Main as MetaBox;
use Poeticsoft\Forge\Base\BlockControl\Main as BlockControl;

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
    private $plugin_uri;
    private $data = [];
    
    // -------------------------------------------------------------------------------
    
    private $has_dashboard_widgets;
    private $has_ui_admin;
    private $has_ui_frontend;
    private $has_ui_blocks;
    private $has_ui_core_blocks;
    private $has_ui_block_control;
    private $has_ui_core_configs;
    private $has_ui_meta_boxes;
    private $has_api;
    
    // -------------------------------------------------------------------------------
    
    private Dashboard $dashboard;
    private API $api;
    private BlockControl $blockcontrol;
    private CoreBlock $core_block;
    private MetaBox $meta_box;

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
        $this->id = 'forge-base';
        $this->name = 'Forge Base';
        $this->description = 'Módulo base del ecosistema Forge';
        $this->plugin_uri = '/wp-content/plugins/poeticsoft-forge-base';
        $this->plugin_path = WP_PLUGIN_DIR . '/poeticsoft-forge-base';
        
        $this->has_dashboard_widgets = true;
        $this->has_ui_admin = true;
        $this->has_ui_frontend = true;
        $this->has_ui_blocks = true;
        $this->has_ui_core_blocks = true;
        $this->has_ui_block_control = true;
        $this->has_ui_core_configs = true;
        $this->has_ui_meta_boxes = true;
        $this->has_api = true;
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
    
    public function get_plugin_uri()
    {
        return $this->plugin_uri;
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
    
    public function get_has_ui_meta_boxes()
    {
        return $this->has_ui_meta_boxes;
    }
    
    public function get_has_api()
    {
        return $this->has_api;
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
    
    public function get_meta_box()
    {
        return $this->meta_box;
    }
    
    // -------------------------------------------------------------------------------
    
    public function & __get(string $name)
    {
        
        if (!isset($this->data[$name])) {
            
            $this->data[$name] = [];
        }

        return $this->data[$name];
    }

    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
    }

    // -------------------------------------------------------------------------------
    
    public function init(Heart $heart)
    {
        
        $this->heart = $heart;
        
        $this->dashboard = new Dashboard($this, $heart);
        $this->api = new API($this, $heart);
        $this->core_block = new CoreBlock($this, $heart);
        $this->block_control = new BlockControl($this, $heart);
        $this->meta_box = new MetaBox($this, $heart);
    }
}
