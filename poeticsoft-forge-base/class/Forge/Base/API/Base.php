<?php

namespace Poeticsoft\Forge\Base\API;

use Poeticsoft\Forge\Base\API\Main as API;

/**
 * Slot de endpoints plantilla para clasificar secciones de endpoints
 *
 * @since 0.0.0
 */
class Base
{
    protected $forge;
    protected $api;

    public function __construct($forge, API $parent)
    {
        $this->forge = $forge;
        $this->api = $parent;
    }

    /**
     * Lista de las rutas que no han de autenticarse
     */
    public function get_whitelist()
    {
        
        return [
            'base' => [
                'public' => [
                   'base/test/a'
                ],
                'logged' => [
                    'base/test/b'
                ]
            ]
        ];
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
                    'callback' => [$this, 'api_base_test_a']
                ],
                [
                    'path' => 'base/test/b',
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'api_base_test_a']
                ]
            ]
        ];
    }
    
    public function api_base_test_a(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            return $this->api->send_response([
                'slot' => 'base',
                'name' => 'test a'
            ]);
            
        } catch (Exception $e) {
      
            return $this->api->send_response(
                $e->getMessage(),
                $e->getCode() ?: 500,
                false
            );
        }
    }
    
    public function api_base_test_b(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            return $this->api->send_response([
                'slot' => 'base',
                'name' => 'test b'
            ]);
            
        } catch (Exception $e) {
      
            return $this->api->send_response(
                $e->getMessage(),
                $e->getCode() ?: 500,
                false
            );
        }
    }
}
