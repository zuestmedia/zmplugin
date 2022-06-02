<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_card_color_background extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_color_background {

  protected function default() {

    parent::default();

    $this->choices = array(
      'uk-card-default' => __( 'Default', 'zmplugin' ),
      'uk-card-primary' => __( 'Primary', 'zmplugin' ),
      'uk-card-secondary' => __( 'Secondary', 'zmplugin' ),
      'uk-card-transparent' => __( 'Transparent', 'zmplugin' ),
    );

  }

  protected function widgetinner() {

    $this->default();

    $this->label = __( 'Block Background Color', 'zmplugin' );

  }

}
