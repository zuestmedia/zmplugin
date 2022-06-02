<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class title_sprintf extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Title', 'zmplugin' );
    $this->description = __( 'Use the sprintf() variable %s to get the archive name. Leave empty to get default preformated WordPress values.', 'zmplugin' );

  }
  
}
