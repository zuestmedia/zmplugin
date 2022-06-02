<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class image_link extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  public function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Image Link:', 'zmplugin' );
    $this->validation = 'int';
    $this->choices = array(
      '0' =>  __( 'No Link', 'zmplugin' ),
      '1' =>  __( 'Postlink', 'zmplugin' ),
      '2' =>  __( 'Imagelink', 'zmplugin' )
    );

  }

}
