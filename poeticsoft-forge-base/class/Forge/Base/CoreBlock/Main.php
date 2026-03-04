<?php

namespace Poeticsoft\Forge\Base\CoreBlock;

use Poeticsoft\Forge\Base\CoreBlock\PostContent;

class Main
{
    protected $forge;
    protected $engine;
    
    // Core Blocks
    protected $post_content;
    // protected $otro_block

    public function __construct($forge, $engine)
    {
        
        $this->forge = $forge;
        $this->engine = $engine;

        // Instanciamos los bblocks
        $this->post_content = new PostContent($forge, $this);
        // $this->otro_block = new OtroBlock($forge, $this);
    }
    
    public function get_core_blocks(): array
    {
        return [
            'core/post-content' => $this->post_content
            // 'core/otro_block' => $this->otro_block
        ];
    }
}
