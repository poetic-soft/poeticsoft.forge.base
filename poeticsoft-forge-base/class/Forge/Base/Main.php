<?php

namespace Poeticsoft\Forge\Base;

use Poeticsoft\Heart\ForgeInterface;
use Poeticsoft\Heart\Engine;

/**
 * Clase Base - Implementación del módulo Forge Base.
 *
 * Este módulo sirve como cimiento para el ecosistema Forge, demostrando
 * la integración con el motor central de Poeticsoft.
 *
 * @package Poeticsoft\Forge
 * @since 0.0.0
 */
class Main implements ForgeInterface
{
    /** @var self|null Instancia única */
    private static $instance = null;

    /** @var \Poeticsoft\Heart\Engine Instancia del motor central */
    private $engine;

    /** @var string Nombre del módulo */
    private $name;

    /** @var string Versión del módulo */
    private $version;

    /** @var string Descripción del módulo */
    private $description;

    /** @var string Path del plugin para el calculo de rutas */
    private $plugin_path;

    /** @var string Uri del plugin para el calculo de urls */
    private $plugin_uri;

    /** @var boolean Declara si se han creado blocks para el proceso de registro */
    private $has_blocks;

    /** @var boolean Declara si se han creado ui admin para el proceso de carga */
    private $has_ui_admin;

    /** @var boolean Declara si se han creado ui frontend para el proceso de carga */
    private $has_ui_frontend;

    /** @var boolean Declara si se han declarado endpoints para el proceso de registro */
    private $has_api;

    /**
     * Obtiene la instancia única (Singleton).
     *
     * @return self
     */
    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Constructor privado.
     * Define los metadatos iniciales del módulo.
     */
    private function __construct()
    {
        
        $this->version = '0.0.0';
        $this->name = 'Forge Base';
        $this->description = 'Módulo base del ecosistema Forge';
        $this->plugin_path = WP_PLUGIN_DIR . '/poeticsoft-forge-base';
        $this->plugin_uri  = WP_PLUGIN_URL . '/poeticsoft-forge-base';
        $this->has_blocks  = true;
        $this->has_ui_admin  = true;
        $this->has_ui_frontend  = true;
        $this->has_api = false;
    }
    
    /**
     * Getters
     *
     * @since 0.0.0
     */

    /** @return string */
    public function get_name()
    {
        return $this->name;
    }

    /** @return string */
    public function get_version()
    {
        return $this->version;
    }

    /** @return string */
    public function get_description()
    {
        return $this->description;
    }
    
    /** @return string */
    public function get_plugin_path()
    {
        return $this->plugin_path;
    }
    
    /** @return string */
    public function get_plugin_uri()
    {
        return $this->plugin_uri;
    }
    
    /** @return boolean */
    public function get_has_blocks()
    {
        return $this->has_blocks;
    }
    
    /** @return boolean */
    public function get_has_ui_admin()
    {
        return $this->has_ui_admin;
    }
    
    /** @return boolean */
    public function get_has_ui_frontend()
    {
        return $this->has_ui_frontend;
    }
    
    /** @return boolean */
    public function get_has_api()
    {
        return $this->has_api;
    }

    /**
     * Inicializa el módulo.
     *
     * Invocado por el Engine de Heart durante el registro.
     *
     * @param \Poeticsoft\Heart\Engine $engine Instancia del motor.
     * @return void
     */
    public function init(Engine $engine)
    {
        $this->engine = $engine;

        // $this->engine->logging->log(
        //     'Forge Base module initialized via Heart helper',
        //     'INFO',
        //     'FORGE-BASE'
        // );

        // // Uso directo de la instancia del motor inyectada
        // $this->engine->logging->log(
        //     'Módulo registrado: ' . $this->name,
        //     'INFO',
        //     'FORGE-BASE'
        // );
    }
}
