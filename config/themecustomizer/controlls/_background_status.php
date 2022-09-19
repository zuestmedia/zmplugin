<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _background_status extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    //$this->section_group = 'module';
    $this->active_callback_master = 1;
    //$this->active_callback_value = 'file';//no value shows setting if is not null!!!
    $this->active_callback_value_alt_1 = 'file';//use to alt values for file and url fields!
    $this->active_callback_value_alt_2 = 'url';
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Background Image', 'zmplugin' );
    $this->validation = 'slug';
    $this->choices = array(
      '' =>  __( 'No Background Image', 'zmplugin' ),
      'file' =>  __( 'Image from File', 'zmplugin' ),
      'url' =>  __( 'Image from URL', 'zmplugin' ),
    );

  }

}
