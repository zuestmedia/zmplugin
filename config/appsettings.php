<?php

namespace ZMP\Plugin\Config;

class appsettings {

  function __construct(){

    $this->nonadmin_redirect_choices = array(
        array('option'=> __( 'Inactive', 'zmplugin' ),'value'=>false),
        array('option'=> __( 'Active', 'zmplugin' ),'value'=>true),
      );

  }

}
