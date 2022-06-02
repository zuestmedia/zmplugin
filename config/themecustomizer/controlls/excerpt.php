<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class excerpt extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Only Excerpt?', 'zmplugin' );
    $this->description = __( 'Choose out of showing the complete article, the excerpt or automatic.', 'zmplugin' );
    $this->validation = 'int';
    $this->choices = array(
      '0' =>  __( 'Complete Article', 'zmplugin' ),
      '1' =>  __( 'Auto Excerpt', 'zmplugin' ),
      //'2' =>  __( 'Auto', 'zmplugin' ),//no used anymore when having always posts AND singular template
      '3' =>  __( 'Manual Excerpt or nothing', 'zmplugin' ),
    );

  }

}
