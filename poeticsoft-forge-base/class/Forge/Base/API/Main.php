<?php

namespace Poeticsoft\Forge\Base\API;

use Poeticsoft\Heart\API\ForgeAPI;
use Poeticsoft\Forge\Base\API\Section;

class Main extends ForgeAPI
{
    protected $forge;
    protected $engine;
    
    // API Sections
    protected $section;
   // protected $otra

    public function __construct($forge, $engine)
    {
        
        // Asignamos las propiedades de la clase template (ForgeAPI)
        $this->forge = $forge;
        $this->engine = $engine;

        // Instanciamos secciones de la api
        $this->section = new Section($forge, $this);
        // $this->otra = new Otra($forge, $this);
    }
    
    public function get_whitelist(): array
    {
        return [
            'v1' => array_merge(
                $this->section->get_whitelist(),
                // $this->otra->get_whitelist()
            )
        ];
    }
    
    public function get_endpoints(): array
    {

        return [
            'v1' => array_merge(
                $this->section->get_routes(),
                // $this->otra->get_routes()
            )
        ];
    }
}
