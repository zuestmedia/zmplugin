<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class comment_body_class extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class {

  protected function default() {

    parent::default();

    $this->label = __( 'Comment Body Class:', 'zmplugin' );

  }

}
