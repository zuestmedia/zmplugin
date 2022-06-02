<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class icon_type extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Icon', 'zmplugin' );
    $this->description = __( 'Choose Icon.', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      'navbar-toggle-icon' => __( 'navbar-toggle-icon', 'zmplugin' ),
      'plus' => __( 'Plus', 'zmplugin' ),
      'plus-circle' => __( 'plus-circle', 'zmplugin' ),
      'more' => __( 'more', 'zmplugin' ),
      'more-vertical' => __( 'more-vertical', 'zmplugin' ),
      'menu' => __( 'menu', 'zmplugin' ),
      'list' => __( 'list', 'zmplugin' ),
      'table' => __( 'table', 'zmplugin' ),
      'grid' => __( 'Grid', 'zmplugin' ),
      'thumbnails' => __( 'thumbnails', 'zmplugin' ),
    );

  }

}
