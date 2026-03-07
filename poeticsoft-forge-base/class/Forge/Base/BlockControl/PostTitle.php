<?php

namespace Poeticsoft\Forge\Base\BlockControl;

use Poeticsoft\Forge\Base\BlockControl\Template;

class PostTitle extends Template
{
    public function get_block_name(): string
    {
        return 'core/post-title';
    }

    public function get_block_attributes(): array
    {
        return [
            'control_text' => [
                'type' => 'string',
                'default' => 'Post Title Control'
            ]
        ];
    }
    
    protected function init()
    {
        // Lógica específica para PostContent
    }
}
