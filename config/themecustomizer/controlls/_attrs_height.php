<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _attrs_height extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Viewport Height', 'zmplugin' );
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->validation = 'json';
    $this->choices = array(
      '' =>  __( 'Off', 'zmplugin' ),
      '{"uk-height-viewport":""}' =>  __( 'Default', 'zmplugin' ),
      '{"uk-height-viewport":"offset-top: true"}' =>  __( 'Offset Top', 'zmplugin'),
      '{"uk-height-viewport":"offset-bottom: true"}' =>  __( 'Offset Bottom', 'zmplugin'),
      '{"uk-height-viewport":"expand: true"}' =>  __( 'Expand', 'zmplugin'),
    );

  }

}
