<?php

namespace Poeticsoft\Forge\Base\BlockControl;

use Poeticsoft\Heart\Forge\BlockControlTemplate;

class PostContent extends BlockControlTemplate
{
    public function get_block_name(): string
    {
        return 'core/post-content';
    }

    public function get_block_attributes(): array
    {
        return [
            'control_text' => [
                'type' => 'string',
                'default' => 'Post Content Control'
            ]
        ];
    }
    
    protected function init()
    {
        // Lógica específica para PostContent
    }
}
