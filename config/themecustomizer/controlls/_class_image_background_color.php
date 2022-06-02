<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_image_background_color extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_color_background {

  protected function default() {

    parent::default();

    $this->choices = array(
      'uk-section-default' => __( 'Default', 'zmplugin' ),
      'uk-section-muted' => __( 'Muted', 'zmplugin' ),
      'uk-section-primary' => __( 'Primary', 'zmplugin' ),
      'uk-section-secondary' => __( 'Secondary', 'zmplugin' ),
      '' => __( 'None', 'zmplugin' ),
    );

  }

}
