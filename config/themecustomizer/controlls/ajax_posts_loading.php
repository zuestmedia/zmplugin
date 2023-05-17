<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class ajax_posts_loading extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  public function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'AJAX Posts Loading', 'zmplugin' );
    $this->validation = 'int';
    $this->choices = array(
      '0' =>  __( 'Off', 'zmplugin' ),
      '1' =>  __( 'On', 'zmplugin' )
    );

  }

}
