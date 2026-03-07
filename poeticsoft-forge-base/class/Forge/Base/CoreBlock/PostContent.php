<?php

namespace Poeticsoft\Forge\Base\CoreBlock;

use Poeticsoft\Forge\Base\CoreBlock\Main as CoreBlock;

class PostContent
{
    protected $forge;
    protected $api;

    public function __construct($forge, CoreBlock $parent)
    {
        $this->forge = $forge;
        $this->api = $parent;
    }

    public function render($blockcontent, $block)
    {
        
        global $post;

        if (!$post) {
            
            return;
        }
        
        return '<div class="PoeticsoftHeartForgeBaseCoreBlockPostContent">' .
            $blockcontent .
        '</div>';
    }
}
