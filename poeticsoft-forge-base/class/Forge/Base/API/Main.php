<?php

namespace Poeticsoft\Forge\Base\API;

use Poeticsoft\Heart\API\ForgeAPI;
use Poeticsoft\Forge\Base\API\Base;

class Main extends ForgeAPI
{
    public function get_endpoints(): array
    {
        // Aquí instanciarías tus clases que extiendan de Base.php
        $base = new Base($this->forge);

        return [
            'v1' => array_merge(
                $this->get_default_routes(),
                $base->get_routes()
            )
        ];
        
        $this->test_auxiliar();
    }

    private function get_default_routes(): array
    {
        return [
            'default' => [
                [
                    'path' => 'status',
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'api_default_status'],
                    'public' => true
                ]
            ]
        ];
    }
    
    public function api_default_status(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            $res->set_data([
                'slot' => 'default'
            ]);
            
        } catch (Exception $e) {
      
            $res->set_status($e->getCode());
            $res->set_data($e->getMessage());
        }

        return $res;
    }
}
