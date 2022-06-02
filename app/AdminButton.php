<?php

namespace ZMP\Plugin;

class AdminButton {

    private $name = NULL;
    private $admin_url = '?zmaction=';
    private $admin_notice = 'You did Something!';

    public function setName($name) {
      $this->name = $name;
    }
    public function getName() {
      return $this->name;
    }

    public function setAdminUrl($admin_url) {
      $this->admin_url = $admin_url;
    }
    public function getAdminUrl() {
      return $this->admin_url;
    }

    public function setAdminNotice($admin_notice) {
      $this->admin_notice = $admin_notice;
    }
    public function getAdminNotice() {
      return $this->admin_notice;
    }

  /**
    * constructor
    */
    function __construct( $name ) {

  		$this->name   = $name;

  	}


    public function getActionButton( $label = 'Do!' ,$class = NULL, $action = 'zm_do_sth' ) {

      return '<a href="'.wp_nonce_url( admin_url($this->getAdminUrl().'&zmaction='.esc_attr( $action ) ), $this->getName(), 'zmnonce' ).'"'.Helpers::getAttribute( $class, NULL, ' class="%s"' ).'>'.esc_html( $label ).'</a>';

    }

    public function getActionButtonWConfirm( $label = 'Do!', $confirm_msg = 'Are you sure?', $class = NULL , $action = 'zm_do_sth' ) {

      return '<a onclick="return confirm(\''.esc_html( $confirm_msg ).'\')" href="'.wp_nonce_url( admin_url($this->getAdminUrl().'&zmaction='.esc_attr( $action ) ), $this->getName(), 'zmnonce' ).'"'.Helpers::getAttribute( $class, NULL, ' class="%s"' ).'>'.esc_html( $label ).'</a>';

    }

    //removes the query args after reloading the settingspage!!!
    //could prop be loaded globally when used more than once!
    public function pp_remove_query_args( $args ) {
    	$args[] = 'zmnonce';
    	$args[] = 'zmaction';

    	return $args;
    }

    public function registerGetParams() {

      add_filter( 'removable_query_args', array( $this, 'pp_remove_query_args' ) );

      if (isset($_GET['zmnonce']) && wp_verify_nonce( $_GET['zmnonce'], $this->getName() )) {

        return $this->doAction();

      } /*else {

        return 'no nonce is set or not working';

      }*/

    }

    public function doAction(){

      if ( isset($_GET['zmaction']) && $_GET['zmaction'] == 'zm_do_sth' && !isset($_GET['settings-updated']) ) {

        //return 'do something! zmaction: '.$_GET['zmaction'];

        $this->Action();

        $this->SuccessNotification();

      } /*else {

        return 'no zmaction defined';

      }*/

    }

    public function Action() {

      //nothing to do so far...

    }

    public function AdminNotice() {

      echo '<div class="update-nag  notice-success notice"><span>'.esc_html( $this->getAdminNotice() ).'</span></div>';

    }

    public function SuccessNotification(){

      add_action( 'admin_notices', array($this,'AdminNotice') );

    }

}
