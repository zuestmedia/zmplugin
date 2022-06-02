<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class prev_next extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_toggle_true_false {

  protected function default() {

    parent::default();

    $this->label = __( 'Show or hide Prev / Next:', 'zmplugin' );

  }

}
