<?php

namespace Poeticsoft\Forge\Base\Dashboard;

use Poeticsoft\Heart\Forge\DashboardTemplate;

class Base extends DashboardTemplate
{
    public function set_values()
    {
        
        $this->id = 'base';
        $this->title = 'Base';
        $this->description = 'Dashboard Base del Forge Base';
        // $this->args = [];
        $this->context = 'normal'; // 'normal', 'side', 'column3', or 'column4'. Default 'normal'
        $this->priority = 'core'; // 'high', 'core', 'default', or 'low'. Default 'core'.
        
        $this->options = [
            [
                'key' => 'string_a',
                'field_type' => 'string',
                'title' => 'Base String A',
                'description' => 'Option Base String A',
                'value' => 'default',
                'type' => 'text'
            ],
            [
                'key' => 'string_b',
                'field_type' => 'string',
                'title' => 'Base String B',
                'description' => 'Option Base String B',
                'value' => 'default',
                'type' => 'text'
            ]
        ];
    }
}
