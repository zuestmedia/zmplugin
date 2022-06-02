<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_flex_horizontal extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //use uk-position-top -center -bottom usw!

    //Values
    $this->type = 'select';
    $this->label = __( 'Horizontal Align', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      '' =>  __( 'None', 'zmplugin' ),
      'uk-flex uk-flex-left' =>  __( 'Left', 'zmplugin' ),
      'uk-flex uk-flex-center' =>  __( 'Center', 'zmplugin' ),
      'uk-flex uk-flex-right' =>  __( 'Right', 'zmplugin' ),
    );

  }

  protected function navbar() {

    $this->default();

    $this->label = __( 'Navbar Horizontal Align', 'zmplugin' );

  }

}
