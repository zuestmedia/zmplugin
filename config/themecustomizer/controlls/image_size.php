<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class image_size extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  public function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Image Size:', 'zmplugin' );
    $this->validation = 'slug';
    $this->choices = array(
      'thumbnail' =>  __( 'Thumbnail', 'zmplugin' ),
      'medium' =>  __( 'Medium', 'zmplugin' ),
      'large' =>  __( 'Large', 'zmplugin' ),
      'full' =>  __( 'Full', 'zmplugin' )
    );

  }

}
