<?php

namespace ZMP\Plugin;

use WP_REST_Request;

//not yet in use...

class RestRequestInternal {

    private $rest_object;

    public function setRestObject($rest_object) {

      $this->rest_object = $rest_object;

    }
    public function getRestObjectorArray() {

      return $this->rest_object;

    }

    function __construct( $method = 'GET', $path = '/wp/v2/posts' ){

      $request = new WP_REST_Request( $method, $path );
      //$request->set_query_params( [ 'per_page' => 12 ] );
      $response = rest_do_request( $request );

      //var_dump($response);

      $server = rest_get_server();
      $data = $server->response_to_data( $response, false );

      //var_dump($data);

      //$json = wp_json_encode( $data );

      $this->setRestObject( $data );

    }

}
