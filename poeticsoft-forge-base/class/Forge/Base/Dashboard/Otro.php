<?php

namespace Poeticsoft\Forge\Base\Dashboard;

use Poeticsoft\Heart\Forge\DashboardTemplate;

class Otro extends DashboardTemplate
{
    public function set_values()
    {
        
        $this->id = 'otro';
        $this->title = 'Un forge titulo';
        $this->description = 'Dashboard Otro del Forge Base';
        
        $this->options = [
            [
                'key' => 'string_a',
                'field_type' => 'string',
                'title' => 'Otro String A',
                'description' => 'Option Otro String A',
                'value' => 'default',
                'type' => 'text'
            ],
            [
                'key' => 'string_b',
                'field_type' => 'string',
                'title' => 'Otro String B',
                'description' => 'Option Otro String B',
                'value' => 'default',
                'type' => 'text'
            ]
        ];
    }
}
