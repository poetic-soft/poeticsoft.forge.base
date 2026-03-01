<?php

namespace Poeticsoft\Forge\Base\API;

use Poeticsoft\Heart;
use Poeticsoft\Forge\Base\API\Main as API;

/**
 * Slot de endpoints plantilla para clasificar secciones de endpoints
 *
 * @since 0.0.0
 */
class Section
{
    protected $forge;
    protected $api;

    public function __construct($forge, API $parent)
    {
        $this->forge = $forge;
        $this->api = $parent;
    }

    /**
     * Lista de las rutas permitidas
     */
    public function get_whitelist()
    {
        
        return [
            'section' => [
                'public' => [
                   'a'
                ],
                'logged' => [
                   'b'
                ]
            ]
        ];
    }

    /**
     * Cada grupo (Settings, Products, etc.) define sus rutas aquí.
     * Este es el grupo section, plantilla para los grupos
     */
    public function get_routes()
    {
        
        return [
            'section' => [
                [
                    'path' => 'a',
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'api_section_a']
                ],
                [
                    'path' => 'b',
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'api_section_b']
                ]
            ]
        ];
    }
    
    public function api_section_a(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            return $this->api->send_response(
                [
                    'slot' => 'section',
                    'name' => 'a'
                ]
            );
            
        } catch (Exception $e) {
      
            return $this->api->send_response(
                $e->getMessage(),
                $e->getCode() ?: 500,
                false
            );
        }
    }
    
    public function api_section_b(\WP_REST_Request $req)
    {
        
        $res = new \WP_REST_Response();
        
        try {
            
            $user_id = get_current_user_id();
            
            return $this->api->send_response([
                'user_id' => $user_id,
                'slot' => 'section',
                'name' => 'b'
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
