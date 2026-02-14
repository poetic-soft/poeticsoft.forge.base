<?php

namespace Poeticsoft\Forge;

use Poeticsoft\Heart\ForgeInterface;
use function Poeticsoft\Heart;

class Base implements ForgeInterface {

    /**
     * Inicializa el módulo
     */
    public function init() {

      Heart()->log(
        'Forge Base module initialized', 
        'INFO', 
        'FORGE-BASE'
      );
    }

    public function get_name() { return 'Forge Base'; }
    public function get_version() { return '0.0.0'; } // Versión hardcoded o desde una constante propia del Forge
    public function get_description() { return 'Módulo base del ecosistema.'; }
}