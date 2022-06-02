<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class show_all extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_toggle_true_false {

  protected function default() {

    parent::default();

    $this->label = __( 'Show All Pages:', 'zmplugin' );

  }

}
