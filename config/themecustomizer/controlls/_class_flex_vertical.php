<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_flex_vertical extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //use uk-position-top -center -bottom usw!

    //Values
    $this->type = 'select';
    $this->label = __( 'Vertical Align', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      '' =>  __( 'None', 'zmplugin' ),
      'uk-flex uk-flex-top' =>  __( 'Top', 'zmplugin' ),
      'uk-flex uk-flex-middle' =>  __( 'Middle', 'zmplugin' ),
      'uk-flex uk-flex-bottom' =>  __( 'Bottom', 'zmplugin' ),
    );

  }

}
