<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_flex_order extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Responsive Order:', 'zmplugin' );
    $this->description = __( 'Choose the position of element by screensize.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
      'uk-flex-first' => __( 'Left', 'zmplugin' ),
      'uk-flex-last' => __( 'Right', 'zmplugin' ),
      'uk-flex-first@s' => __( 'Left @s', 'zmplugin' ),
      'uk-flex-last@s' => __( 'Right @s', 'zmplugin' ),
      'uk-flex-first@m' => __( 'Left @m', 'zmplugin' ),
      'uk-flex-last@m' => __( 'Right @m', 'zmplugin' ),
      'uk-flex-first@l' => __( 'Left @l', 'zmplugin' ),
      'uk-flex-last@l' => __( 'Right @l', 'zmplugin' ),
      'uk-flex-first@xl' => __( 'Left @xl', 'zmplugin' ),
      'uk-flex-last@xl' => __( 'Right @xl', 'zmplugin' ),
    );

  }

}
