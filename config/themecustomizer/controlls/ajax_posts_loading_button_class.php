<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class ajax_posts_loading_button_class extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class {

  protected function default() {

    parent::default();

    $this->label = __( 'AJAX Button Class:', 'zmplugin' );

  }

}
