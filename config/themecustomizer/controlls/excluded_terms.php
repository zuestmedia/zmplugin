<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class excluded_terms extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Excluded Terms:', 'zmplugin' );
    $this->description = __( 'Add a comma-separated list of post-id\'s to exclude.', 'zmplugin' );

  }

}
