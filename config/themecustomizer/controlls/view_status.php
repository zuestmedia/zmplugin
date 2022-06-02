<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class view_status extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Where to show this section:', 'zmplugin' );
    $this->description = __( 'Globally show or hide sections or choose out of the custom selection fields.', 'zmplugin' );
    $this->validation = 'int';
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->choices = array(
      '0' =>  __( 'Show on all Pages', 'zmplugin' ),
      '1' =>  __( 'Hide on all Pages', 'zmplugin' ),
      '2' =>  __( 'Use Custom Settings', 'zmplugin' ),
    );

  }

}
