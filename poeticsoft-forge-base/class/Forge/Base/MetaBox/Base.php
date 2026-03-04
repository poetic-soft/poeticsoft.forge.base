<?php

namespace Poeticsoft\Forge\Base\MetaBox;

use Poeticsoft\Heart as Heart;
use Poeticsoft\Forge\Base\MetaBox\Main as MetaBox;

/**
 * Slot de endpoints plantilla para clasificar secciones de endpoints
 *
 * @since 0.0.0
 */
class Base
{
    protected $forge;
    protected $meta_box;
    
    public $id;
    public $title;
    public $screen;
    public $context;
    public $priority;
    public $callback_args;

    public function __construct($forge, MetaBox $parent)
    {
        $this->forge = $forge;
        $this->meta_box = $parent;
        
        $this->id = 'id';
        $this->title = 'title';
        $this->screen = 'page';
        $this->context = 'side';
        $this->priority = 'default';
        $this->callback_args = [
            'arg' => 'value'
        ];
    }

    public function callback($post)
    {
        echo '<div class="MetaBox">Meta Box</div>';
    }
}
