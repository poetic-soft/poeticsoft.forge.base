<?php

namespace Poeticsoft\Forge\Base\API;

use Poeticsoft\Heart\API\ForgeAPI;
use Poeticsoft\Forge\Base\API\Base;

class Main extends ForgeAPI
{
    protected $forge;
    protected $engine;
    protected $base;

    public function __construct($forge, $engine)
    {
        
        // 1. Asignamos las propiedades de la clase padre (ForgeAPI)
        $this->forge = $forge;
        $this->engine = $engine;

        // 2. Instanciamos Base pasando los 2 argumentos requeridos
        $this->base = new Base($forge, $this);
    }
    
    public function get_whitelist(): array
    {
        return [
            'v1' => array_merge(
                $this->get_default_whitelist(),
                $this->base->get_whitelist()
            )
        ];
    }
    
    public function get_endpoints(): array
    {

        return [
            'v1' => array_merge(
                $this->get_default_routes(),
                $this->base->get_routes()
            )
        ];
    }

    private function get_default_whitelist(): array
    {
        return [
            'default' => [
                'public' => [
                    'status-a'
                ],
                'logged' => [
                    'status-b'
                ]
            ]
        ];
    }

    private function get_default_routes(): array
    {
        return [
            'default' => [
                [
                    'path' => 'status-a',
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'api_default_status_a']
                ],
                [
                    'path' => 'status-b',
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'api_default_status_b']
                ]
            ]
        ];
    }
    
    public function api_default_status_a(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            return $this->send_response([
                'slot' => 'default',
                'name' => 'status-a'
            ]);
            
        } catch (Exception $e) {
      
            return $this->send_response(
                $e->getMessage(),
                $e->getCode() ?: 500,
                false
            );
        }
    }
    
    public function api_default_status_b(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            return $this->send_response([
                'slot' => 'default',
                'name' => 'status-b'
            ]);
            
        } catch (Exception $e) {
      
            return $this->send_response(
                $e->getMessage(),
                $e->getCode() ?: 500,
                false
            );
        }
    }
}
