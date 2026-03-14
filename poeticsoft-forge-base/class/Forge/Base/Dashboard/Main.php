<?php

namespace Poeticsoft\Forge\Base\Dashboard;

use Poeticsoft\Forge\Base\Dashboard\Base;
use Poeticsoft\Forge\Base\Dashboard\Otro;

class Main
{
    protected $forge;
    protected $heart;
    
    protected $base;
    // protected $otro;

    public function __construct($forge, $heart)
    {
        
        $this->forge = $forge;
        // $this->heart = $heart;

        $this->base = new Base($this, $heart, $forge);
        // $this->otro = new Otro($this, $heart, $forge);
    }
    
    public function get_dashboard_widgets(): array
    {
        return [
            $this->base,
            // $this->otro
        ];
    }
}
