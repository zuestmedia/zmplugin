<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_color_helpers extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Color Options', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
      'zmgradient' =>  __( 'Background Gradient', 'zmplugin' ),
      'uk-preserve-color' => __('Preserve Color', 'zmplugin' ),
      'uk-light' => __('Light on Dark Color', 'zmplugin' ),
    );

  }

}
