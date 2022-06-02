<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class link_url extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Link URL:', 'zmplugin' );
    $this->description = __( 'Set an external URL.', 'zmplugin' );
    $this->validation = 'url';

  }

}
