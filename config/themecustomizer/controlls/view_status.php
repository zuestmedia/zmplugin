<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class view_status extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Display Settings:', 'zmplugin' );
    $this->description = __( 'Globally show or hide sections or choose out of the custom selection fields.', 'zmplugin' );
    $this->validation = 'int';
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->choices = array(
      '0' =>  __( 'Display on all Pages', 'zmplugin' ),
      '1' =>  __( 'Hide on all Pages', 'zmplugin' ),
      '2' =>  __( 'Display if the following condition is met', 'zmplugin' ),
      '3' =>  __( 'Do not display if the following condition is met', 'zmplugin' ),
    );

  }

}
