<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_navbar_item_pos extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //use uk-position-top -center -bottom usw!

    //Values
    $this->type = 'select';
    $this->label = __( 'Navbar Position', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      '' =>  __( 'Auto', 'zmplugin' ),
      'uk-navbar-left' =>  __( 'Push Left', 'zmplugin' ),
      'uk-navbar-center' =>  __( 'Center', 'zmplugin' ),
      'uk-navbar-right' =>  __( 'Push Right', 'zmplugin' ),
    );

  }

}
