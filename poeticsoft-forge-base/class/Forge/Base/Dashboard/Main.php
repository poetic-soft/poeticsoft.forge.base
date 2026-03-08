<?php

namespace Poeticsoft\Forge\Base\Dashboard;

use Poeticsoft\Forge\Base\Dashboard\Base;

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
    
    public function get_dashboard_widgets(): array
    {
        return [
            $this->base
        ];
    }
}
