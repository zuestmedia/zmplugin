<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class caption extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  public function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Image Caption:', 'zmplugin' );
    $this->validation = 'int';
    $this->choices = array(
      '0' =>  __( 'Hide Caption', 'zmplugin' ),
      '1' =>  __( 'Show Caption', 'zmplugin' )
    );

  }

}
