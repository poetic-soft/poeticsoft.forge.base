<?php

namespace Poeticsoft\Forge\Base\API;

use Poeticsoft\Heart\Template\API as ForgeAPI;
use Poeticsoft\Forge\Base\API\Section;

class Main extends ForgeAPI
{
    protected $forge;
    protected $heart;

    protected $section;
    // protected $otra

    public function __construct($forge, $heart)
    {

        $this->forge = $forge;
        $this->heart = $heart;

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
