<?php

namespace Poeticsoft\Forge\Alexandria\Dashboard;

use Poeticsoft\Heart\Template\Dashboard as DashboardTemplate;

class Sections extends DashboardTemplate
{
    public function set_values()
    {

        $this->id = 'sections';
        $this->title = 'Sections';
        $this->description = 'Dashboard Sections del Forge Alexandria';

        $this->options = [
            [
                'key' => 'string_a',
                'field_type' => 'string',
                'title' => 'Base String A',
                'description' => 'Option Base String A',
                'value' => 'default',
                'type' => 'text'
            ]
        ];
    }
}
