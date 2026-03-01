<?php

namespace Poeticsoft\Forge\Base\CoreBlocks;

use Poeticsoft\Heart;
use Poeticsoft\Forge\Base\CoreBlocks\Main as CoreBlocks;

/**
 * Slot de endpoints plantilla para clasificar secciones de endpoints
 *
 * @since 0.0.0
 */
class PostContent
{
    protected $forge;
    protected $api;
    
    public $render_param_count;

    public function __construct($forge, CoreBlocks $parent)
    {
        $this->forge = $forge;
        $this->api = $parent;
        $this->render_param_count = 2;
    }

    public function render($blockcontent, $block)
    {
        
        global $post;

        if (!$post) {
            
            return;
        }
        
        return '<div class="PoeticsoftHeartForgeBaseCoreBlocksPostContent">' .
            $blockcontent .
        '</div>';
    }
}
