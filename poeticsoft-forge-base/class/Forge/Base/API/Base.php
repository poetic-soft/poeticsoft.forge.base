<?php

namespace Poeticsoft\Forge\Base\API;

/**
 * Slot de endpoints plantilla para clasificar secciones de endpoints
 *
 * @since 0.0.0
 */
class Base
{
    protected $forge;

    public function __construct($forge)
    {
        $this->forge = $forge;
    }

    /**
     * Cada grupo (Settings, Products, etc.) define sus rutas aquí.
     * Este es el grupo base, plantilla para los grupos
     */
    public function get_routes()
    {
        
        return [
            'base' => [
                [
                    'path' => 'base/test/a',
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'api_base_test_a'],
                    'public' => true
                ],
                [
                    'path' => 'base/test/b',
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'api_base_test_a'],
                    'public' => true
                ]
            ]
        ];
    }
    
    public function api_base_test_a(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            $res->set_data([
                'slot' => 'base',
                'name' => 'test b'
            ]);
            
        } catch (Exception $e) {
      
            $res->set_status($e->getCode());
            $res->set_data($e->getMessage());
        }

        return $res;
    }
    
    public function api_base_test_b(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            $res->set_data([
                'slot' => 'base',
                'name' => 'test b'
            ]);
            
        } catch (Exception $e) {
      
            $res->set_status($e->getCode());
            $res->set_data($e->getMessage());
        }

        return $res;
    }
}
