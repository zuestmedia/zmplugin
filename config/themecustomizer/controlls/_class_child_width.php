<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_child_width extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Grid:', 'zmplugin' );
    $this->description = __( 'Choose default width of child grid elements.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
      'uk-child-width-expand' => __( 'Grid: Expand', 'zmplugin' ),
      'uk-child-width-expand@s' => __( 'Grid: Expand / Stack @s', 'zmplugin' ),
      'uk-child-width-expand@m' => __( 'Grid: Expand / Stack @m', 'zmplugin' ),
      'uk-child-width-expand@l' => __( 'Grid: Expand / Stack @l', 'zmplugin' ),
      'uk-child-width-auto' => __( 'Grid: Auto', 'zmplugin' ),
      'uk-child-width-auto@s' => __( 'Grid: Auto / Stack @s', 'zmplugin' ),
      'uk-child-width-auto@m' => __( 'Grid: Auto / Stack @m', 'zmplugin' ),
      'uk-child-width-auto@l' => __( 'Grid: Auto / Stack @l', 'zmplugin' ),
      'uk-child-width-1-1' => __( 'Grid: 1-1', 'zmplugin' ),
      'uk-child-width-1-1@s' => __( 'Grid: 1-1 / Stack @s', 'zmplugin' ),
      'uk-child-width-1-1@m' => __( 'Grid: 1-1 / Stack @m', 'zmplugin' ),
      'uk-child-width-1-1@l' => __( 'Grid: 1-1 / Stack @l', 'zmplugin' ),
      'uk-child-width-1-2' => __( 'Grid: 1-2', 'zmplugin' ),
      'uk-child-width-1-2@s' => __( 'Grid: 1-2 / Stack @s', 'zmplugin' ),
      'uk-child-width-1-2@m' => __( 'Grid: 1-2 / Stack @m', 'zmplugin' ),
      'uk-child-width-1-2@l' => __( 'Grid: 1-2 / Stack @l', 'zmplugin' ),
      'uk-child-width-1-3' => __( 'Grid: 1-3', 'zmplugin' ),
      'uk-child-width-1-3@s' => __( 'Grid: 1-3 / Stack @s', 'zmplugin' ),
      'uk-child-width-1-3@m' => __( 'Grid: 1-3 / Stack @m', 'zmplugin' ),
      'uk-child-width-1-3@l' => __( 'Grid: 1-3 / Stack @l', 'zmplugin' ),
      'uk-child-width-1-4' => __( 'Grid: 1-4', 'zmplugin' ),
      'uk-child-width-1-4@s' => __( 'Grid: 1-4 / Stack @s', 'zmplugin' ),
      'uk-child-width-1-4@m' => __( 'Grid: 1-4 / Stack @m', 'zmplugin' ),
      'uk-child-width-1-4@l' => __( 'Grid: 1-4 / Stack @l', 'zmplugin' ),
      'uk-child-width-1-5' => __( 'Grid: 1-5', 'zmplugin' ),
      'uk-child-width-1-5@s' => __( 'Grid: 1-5 / Stack @s', 'zmplugin' ),
      'uk-child-width-1-5@m' => __( 'Grid: 1-5 / Stack @m', 'zmplugin' ),
      'uk-child-width-1-5@l' => __( 'Grid: 1-5 / Stack @l', 'zmplugin' ),
      'uk-child-width-1-6' => __( 'Grid: 1-6', 'zmplugin' ),
      'uk-child-width-1-6@s' => __( 'Grid: 1-6 / Stack @s', 'zmplugin' ),
      'uk-child-width-1-6@m' => __( 'Grid: 1-6 / Stack @m', 'zmplugin' ),
      'uk-child-width-1-6@l' => __( 'Grid: 1-6 / Stack @l', 'zmplugin' )
    );

  }

}
