<?php

namespace Poeticsoft\Forge\Base;

use Poeticsoft\Heart\ForgeInterface;
use Poeticsoft\Heart\Engine;
use Poeticsoft\Forge\Base\API\Main as API;

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

    /** @var string Unique id del forge */
    private $id;

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

    /** @var array Slot de datos dinámicos del Forge para __get & __set*/
    private $data = [];

    /** @var boolean Declara si se han creado blocks para el proceso de registro */
    private $has_blocks;

    /** @var boolean Declara si se han creado ui admin para el proceso de carga */
    private $has_ui_admin;

    /** @var boolean Declara si se han creado ui frontend para el proceso de carga */
    private $has_ui_frontend;

    /** @var boolean Declara si se han declarado endpoints para el proceso de registro */
    private $has_api;

    /** @var API Endpoints del Forge */
    private API $api;

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
     *
     */
    private function __construct()
    {
        
        // Metadatos
        $this->version = '0.0.0';
        $this->id = 'forge-base';
        $this->name = 'Forge Base';
        $this->description = 'Módulo base del ecosistema Forge';
        $this->plugin_uri  = '/wp-content/plugins/poeticsoft-forge-base';
        $this->plugin_path = WP_PLUGIN_DIR . '/poeticsoft-forge-base';
        $this->has_blocks  = true;
        $this->has_ui_admin  = true;
        $this->has_ui_frontend  = true;
        $this->has_api = true;
    }
    
    /**
     * Getters
     *
     * @since 0.0.0
     */

    /** @return string */
    public function get_id()
    {
        return $this->id;
    }

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
    
    /** @return boolean */
    public function get_api()
    {
        return $this->api;
    }
    
    /**
     * Magic Method __get
     * * Permite acceder a propiedades dinámicas. Al usar '&', permitimos
     * que PHP modifique el contenido del array retornado directamente.
     *
     * @param string $name Nombre de la propiedad (slot).
     * @return mixed Referencia al valor en el array $data.
     */
    public function & __get(string $name)
    {
        // Si la clave no existe, la inicializamos como un array vacío.
        // Esto permite hacer $forge->nuevo_slot[] = 'dato' sin errores.
        if (!isset($this->data[$name])) {
            
            $this->data[$name] = [];
        }

        return $this->data[$name];
    }

    /**
     * Magic Method __set
     * * Permite asignar valores directamente a slots dinámicos.
     *
     * @param string $name  Nombre de la propiedad.
     * @param mixed  $value Valor a asignar.
     */
    public function __set(string $name, $value): void
    {
        $this->data[$name] = $value;
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
        
        // API
        $this->api = new API($this, $engine);

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
