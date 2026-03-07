<?php

namespace Poeticsoft\Forge\Base\BlockControl;

use Poeticsoft\Forge\Base\BlockControl\PostContent;

class Main
{
    protected $forge;
    protected $heart;
    
    protected $post_content;
    protected $post_title;

    public function __construct($forge, $heart)
    {
        
        $this->forge = $forge;
        $this->heart = $heart;

        $this->post_content = new PostContent($forge, $this);
        $this->post_title = new PostTitle($forge, $this);
    }
    
    public function get_block_controls(): array
    {
        return [
            $this->post_content,
            $this->post_title
        ];
    }
}
