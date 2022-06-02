<?php

namespace ZMP\Plugin;

class RestRequestExternal {

    private $rest_object = 'error';//will be overwritten if successful api response!
    private $admin_notice = 'Error connecting to remote REST-API.';

    public function setAdminNotice($admin_notice) {
      $this->admin_notice = $admin_notice;
    }
    public function getAdminNotice() {
      return $this->admin_notice;
    }

    public function setRestObject($rest_object) {

      $this->rest_object = $rest_object;

    }
    public function getRestObjectorArray() {

      return $this->rest_object;

    }

    public function AdminNotice() {

      echo '<div class="update-nag  notice-warning notice"><span>'.esc_html( $this->getAdminNotice() ).'</span></div>';

    }

    public function addNotification(){

      add_action( 'admin_notices', array($this,'AdminNotice') );

    }

    function __construct( $url, $args = array() ){

      $response = wp_remote_get( $url, $args );

      if ( is_array( $response ) && ! is_wp_error( $response ) ) {
          $headers = $response['headers']; // array of http header lines
          $body    = $response['body']; // use the content
          $data = json_decode($body, false); // JSON dekodieren --> false nur interne json objekte werden zu php objekten. kann auch array von objekten ergeben!!!
          $this->setRestObject( $data );
      } else {

        //create error admin notice
        $this->addNotification();

      }

    }

}
