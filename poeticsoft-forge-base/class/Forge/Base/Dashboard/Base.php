<?php

namespace Poeticsoft\Forge\Base\Dashboard;

use Poeticsoft\Forge\Base\Dashboard\Template;

class Base extends Template
{
    public function set_values()
    {
        
        $this->id = 'base';
        $this->title = 'Base';
        $this->args = [];
        $this->context = 'normal'; // 'normal', 'side', 'column3', or 'column4'. Default 'normal'
        $this->priority = 'core'; // 'high', 'core', 'default', or 'low'. Default 'core'.
    }
    
    public function content()
    {
        
        echo '<div class="Content">Content</div>';
    }
    
    public function controls()
    {
        
        echo '<div class="Controls">Controls</div>';
    }
}
