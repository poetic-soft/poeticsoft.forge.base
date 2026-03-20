<?php

namespace Poeticsoft\Forge\Alexandria\API;

use Poeticsoft\Heart\Template\API as ForgeAPI;
use Poeticsoft\Forge\Alexandria\Sections;

class Main extends ForgeAPI
{
    protected $forge;
    protected $heart;

    protected $section;

    public function __construct($heart, $forge)
    {

        $this->heart = $heart;
        $this->forge = $forge;

        $this->section = new Sections($this, $forge);
    }

    public function get_whitelist(): array
    {
        return [
            'v1' => array_merge(
                $this->section->get_whitelist()
            )
        ];
    }

    public function get_endpoints(): array
    {

        return [
            'v1' => array_merge(
                $this->section->get_routes()
            )
        ];
    }
}
