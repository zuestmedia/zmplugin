<?php

namespace ZMP\Plugin;

class RestRoute {

  private $namespace = 'zmp/v1';
  private $route;

  public function setNamespace($namespace) {
    $this->namespace = $namespace;
  }
  public function getNamespace() {
    return $this->namespace;
  }

  public function setRoute($route) {
    $this->route = $route;
  }
  public function getRoute() {
    return $this->route;
  }

  public function restResponse($request){

    /* get params or request data
    $parameters = $request->get_params();
    return $request['pid'].$request['installtype'].$parameters['installtype'];
    */

      return 'success';

  }

  public function addRestRoute(){

    //https://dev-zmp.lndo.site/wp-json/zmp/v1/designdata/2
    add_action('rest_api_init', function(){
        register_rest_route( $this->getNamespace(), $this->getRoute(), array(
            'methods' => 'GET',
            'callback' => array( $this, 'restResponse' ),
            'permission_callback' => '__return_true'
        ));
    });

  }

}
