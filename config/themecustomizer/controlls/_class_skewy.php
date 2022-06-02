<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_skewy extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Section Skew-Y', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      '' =>  __( 'No Skew-Y', 'zmplugin' ),
      'zm-background-skewy-default' =>  __( 'Default', 'zmplugin' ),
      'zm-background-skewy-primary' =>  __( 'Primary', 'zmplugin' ),
      'zm-background-skewy-secondary' =>  __( 'Secondary', 'zmplugin' ),
    );

  }

}
