<?php

namespace Poeticsoft\Forge\Base\CoreBlocks;

use Poeticsoft\Heart\API\ForgeAPI;
use Poeticsoft\Forge\Base\API\Section;

class Main
{
    protected $forge;
    protected $engine;
    
    // Core Blocks
    protected $post_content;
    // protected $otra

    public function __construct($forge, $engine)
    {
        
        // Asignamos las propiedades de la clase template (ForgeAPI)
        $this->forge = $forge;
        $this->engine = $engine;

        // Instanciamos secciones de la api
        $this->post_content = new PostContent($forge, $this);
        // $this->otro = new Otro($forge, $this);
    }
    
    public function get_core_blocks(): array
    {
        return [
            'core/post-content' => $this->post_content
            // 'otro' => $this->otro
        ];
    }
}
