<?php

namespace Poeticsoft\Forge\Base\BlockControl;

use Poeticsoft\Forge\Base\BlockControl\Main as BlockControl;

abstract class Template
{
    protected $forge;
    protected $block_control;
    
    public $block_name;
    public $block_attributes;

    public function __construct($forge, BlockControl $parent)
    {
        $this->forge = $forge;
        $this->block_control = $parent;
        
        // Asignamos desde los métodos abstractos
        $this->block_name = $this->get_block_name();
        $this->block_attributes = $this->get_block_attributes();
        
        // Aquí podrías añadir funcionalidad extra común para todos los slots
        $this->init();
    }

    abstract public function get_block_name(): string;
    abstract public function get_block_attributes(): array;

    // Hook opcional para funcionalidad extra en clases hijas
    protected function init()
    {
    }
}
