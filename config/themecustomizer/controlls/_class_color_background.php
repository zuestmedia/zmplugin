<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_color_background extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-radiocolors';
    $this->label = __( 'Background Color', 'zmplugin' );
    $this->description = __( 'Choose a background color.', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      'uk-section-default' => __( 'Default', 'zmplugin' ),
      'uk-section-primary' => __( 'Primary', 'zmplugin' ),
      'uk-section-secondary' => __( 'Secondary', 'zmplugin' ),
      'uk-section-muted' => __( 'Muted', 'zmplugin' ),
      'uk-section-transparent' => __( 'Transparent', 'zmplugin' ),
    );

  }

}
