<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class linked extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  public function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Linked', 'zmplugin' );
    $this->validation = 'int';
    $this->choices = array(
      '0' =>  __( 'No Link', 'zmplugin' ),
      '1' =>  __( 'Linked', 'zmplugin' )
    );

  }

}
