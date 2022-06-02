<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_commentscontainer {

  function __construct(){

    //Values
    $this->label = __( 'Comments Container', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

  }

}
