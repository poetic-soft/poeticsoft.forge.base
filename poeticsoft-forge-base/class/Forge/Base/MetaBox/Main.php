<?php

namespace Poeticsoft\Forge\Base\MetaBox;

use Poeticsoft\Forge\Base\MetaBox\Base;

class Main
{
    protected $forge;
    protected $engine;
    
    // Metaboxes
    protected $base;
    // protected $otro

    public function __construct($forge, $engine)
    {
        
        $this->forge = $forge;
        $this->engine = $engine;

        // Instanciamos Metaboxes
        $this->base = new Base($forge, $this);
        // $this->otro = new Otro($forge, $this);
    }
    
    public function get_meta_boxes(): array
    {
        return [
            $this->base
        ];
    }
}
