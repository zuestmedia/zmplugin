<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class in_same_term extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'In same term:', 'zmplugin' );
    $this->description = __( 'Choose wether to show posts only from same taxonomy term or all.', 'zmplugin' );
    $this->validation = 'bool';
    $this->choices = array(
      0 =>  __( 'False', 'zmplugin' ),
      1 =>  __( 'True', 'zmplugin' )
    );

  }

}
