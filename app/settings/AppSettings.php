<?php

namespace ZMP\Plugin\Settings;

use ZMP\Plugin\Helpers;

class AppSettings extends \ZMP\Plugin\App {

  function __construct($optpra){
    parent::__construct($optpra);

    //add functions to desired action here
    $this->addNonAdminRedirect();

  }

  private $nonadmin_redirect = false;
  private $nonadmin_redirect_field_name = '_nonadmin_redirect';

  private $nonadmin_redirect_exceptions = NULL;
  private $nonadmin_redirect_exceptions_field_name = '_nonadmin_redirect_exceptions';

  private $nonadmin_redirect_target = NULL;
  private $nonadmin_redirect_target_field_name = '_nonadmin_redirect_target';

  /**
  * getNonAdminRedirect
  */
  public function getNonAdminRedirectDefaultValue(){
    return $this->nonadmin_redirect;
  }
  public function getNonAdminRedirectFieldName() {
    return $this->nonadmin_redirect_field_name;
  }
  public function getNonAdminRedirect(){
    return Helpers::getOption(
      $this->getNonAdminRedirectFieldName(),
      $this->getNonAdminRedirectDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  /**
  * getNonAdminRedirectExceptions
  */
  public function getNonAdminRedirectExceptionsDefaultValue(){
    return $this->nonadmin_redirect_exceptions;
  }
  public function getNonAdminRedirectExceptionsFieldName() {
    return $this->nonadmin_redirect_exceptions_field_name;
  }
  public function getNonAdminRedirectExceptions(){
    return Helpers::getOption(
      $this->getNonAdminRedirectExceptionsFieldName(),
      $this->getNonAdminRedirectExceptionsDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_text'
    );
  }

  /**
  * getNonAdminRedirectTarget
  */
  public function getNonAdminRedirectTargetDefaultValue(){
    return $this->nonadmin_redirect_target;
  }
  public function getNonAdminRedirectTargetFieldName() {
    return $this->nonadmin_redirect_target_field_name;
  }
  public function getNonAdminRedirectTarget(){
    return Helpers::getOption(
      $this->getNonAdminRedirectTargetFieldName(),
      $this->getNonAdminRedirectTargetDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_url'
    );
  }

  /**
  * NonAdminRedirectTarget Function
  */
  public function NonAdminRedirect(){

    if($this->getNonAdminRedirect()){

      if ( is_user_logged_in() || is_page( explode( ',', $this->getNonAdminRedirectExceptions() ) ) ) {
    		//do nothing
    	} else {

        $url = home_url('/wp-login.php');

        if($this->getNonAdminRedirectTarget()){
          $url = $this->getNonAdminRedirectTarget();
        }

    		wp_redirect($url);
    		exit();

    	}

    }

  }
  public function addNonAdminRedirect(){
    add_action( 'template_redirect', array( $this, 'NonAdminRedirect' ) );
  }


}
