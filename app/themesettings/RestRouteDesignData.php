<?php

namespace ZMP\Plugin\ThemeSettings;

class RestRouteDesignData extends \ZMP\Plugin\RestRoute {

  public function restResponse($request){

    $parameters = $request->get_params();

    $args = array();

    $pid = NULL;
    if( array_key_exists('pid', $parameters) && is_numeric($parameters['pid']) ){
      $pid = $parameters['pid'];
      $args['body']['pid'] = $pid;
    }

    //return $pid;

    $installtype = NULL;
    if( array_key_exists('installtype', $parameters) && preg_match('/^[a-z0-9\-\s]+$/', $parameters['installtype']) ){
      $installtype = $parameters['installtype'];
    }

    $apiurl = NULL;
    if ( array_key_exists('apiurl', $parameters) && filter_var( rawurldecode( $parameters['apiurl'] ), FILTER_VALIDATE_URL ) ) {
      $apiurl = rawurldecode( $parameters['apiurl'] );
    }

    //return $apiurl;

    //$license_key = NULL;
    if( class_exists ('\ZMP\Pro\Init') ){
      global $zmplugin;
      $auth = new \ZMP\Pro\App( $zmplugin['zmpro']->getOptGroup() );
      $license_key = $auth->getSavedLicenseKey();
      $domain = $auth->getDomain();
      $args['body']['license_key'] = $license_key;
      $args['body']['domain'] = $domain;
    }

    //return $license_key;


    //get design-json-data to import from server
    $rest_request = new \ZMP\Plugin\RestRequestExternal( $apiurl.'wp-json/zmp/v1/designjson/'.$pid, $args );//testing plugin on same site.

    $rest_object = $rest_request->getRestObjectorArray();

    if($rest_object != 'error'){

      $partial = false;
      if($installtype == 'partial'){
        $partial = true;
      }

      $json_import = new \ZMP\Plugin\ThemeSettings\ThemeImport();
      $result = $json_import->importJsonData($rest_object,$partial);

      return 'success ('.$result.')';//deactivate return of success to get object in js responce...

    }

    //rest object ist entweder error oder json-data
    //not necessary to json_encode this, because happened before!
    return $rest_object;

  }

}
