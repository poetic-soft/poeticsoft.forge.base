<?php

namespace Poeticsoft\Forge\Base\Dashboard;

use Poeticsoft\Forge\Base\Dashboard\Main as Dashboard;

abstract class Template
{
    protected $dashboard;
    
    public $id;
    public $title;
    public $args;
    public $context;
    public $priority;

    public function __construct($forge, Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
        $this->set_values();
    }

    abstract public function set_values();
    abstract public function content();
    abstract public function controls();
}
