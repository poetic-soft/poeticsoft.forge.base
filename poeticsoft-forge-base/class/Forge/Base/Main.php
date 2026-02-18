<?php

namespace Poeticsoft\Forge\Base;

use Poeticsoft\Heart\ForgeInterface;

use function Poeticsoft\Heart;

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

    /** @var string Versión del módulo */
    private $version;

    /** @var string Nombre del módulo */
    private $name;

    /** @var string Descripción del módulo */
    private $description;

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
        $this->version     = '0.0.0';
        $this->name        = 'Forge Base';
        $this->description = 'Módulo base del ecosistema Forge';
    }

    /**
     * Inicializa el módulo.
     *
     * Invocado por el Engine de Heart durante el registro.
     *
     * @param \Poeticsoft\Heart\Engine $engine Instancia del motor.
     * @return void
     */
    public function init($engine)
    {
        // Corregido: Asignación de propiedad (sin el segundo $)
        $this->engine = $engine;

        // Uso del helper global Heart()
        Heart()->log(
            'Forge Base module initialized via Heart helper',
            'INFO',
            'FORGE-BASE'
        );

        // Uso directo de la instancia del motor inyectada
        $this->engine->log('Módulo registrado: ' . $this->name, 'INFO', 'FORGE-BASE');
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
}
