<?php

namespace Poeticsoft\Forge\Alexandria\Dashboard;

use Poeticsoft\Heart\Main as Heart;
use Poeticsoft\Forge\Alexandria\Dashboard\Sections;

class Main
{
    protected $forge;
    protected $heart;

    protected $sections;

    public function __construct($forge, $heart)
    {

        $this->forge = $forge;

        $this->sections = new Sections($this, $heart, $forge);
    }

    public function get_dashboard_widgets(): array
    {
        return [
            $this->sections
        ];
    }
}
