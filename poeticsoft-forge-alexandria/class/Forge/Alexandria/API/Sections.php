<?php

namespace Poeticsoft\Forge\Alexandria\API;

use Poeticsoft\Heart;
use Poeticsoft\Forge\Alexandria\API\Main as API;

class Sections
{
    protected $forge;
    protected $api;

    public function __construct(API $parent, $forge)
    {
        $this->forge = $forge;
        $this->api = $parent;
    }

    public function get_whitelist()
    {

        return [
            'sections' => [
                'public' => [
                    'a'
                ],
                'logged' => [
                    'b'
                ]
            ]
        ];
    }

    public function get_routes()
    {

        return [
            'sections' => [
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
                    'slot' => 'sections',
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
                'slot' => 'sections',
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
