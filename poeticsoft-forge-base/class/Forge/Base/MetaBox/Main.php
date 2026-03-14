<?php

namespace Poeticsoft\Forge\Base\MetaBox;

use Poeticsoft\Forge\Base\MetaBox\Base;

class Main
{
    protected $forge;
    protected $heart;
    
    protected $base;
    // protected $otro

    public function __construct($forge, $heart)
    {
        
        $this->forge = $forge;
        $this->heart = $heart;

        $this->base = new Base($forge, $this);
        // $this->otro = new Otro($forge, $this);
    }
    
    public function get_metaboxes(): array
    {
        return [
            $this->base
        ];
    }
}
