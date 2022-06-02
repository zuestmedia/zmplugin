<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_text_align extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //use uk-position-top -center -bottom usw!

    //Values
    $this->type = 'select';
    $this->label = __( 'Text Align', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      '' =>  __( 'None', 'zmplugin' ),
      'uk-text-left' =>  __( 'Left', 'zmplugin' ),
      'uk-text-center' =>  __( 'Center', 'zmplugin' ),
      'uk-text-right' =>  __( 'Right', 'zmplugin' ),
      'uk-text-justify' =>  __( 'Justify', 'zmplugin' ),
    );

  }


}
