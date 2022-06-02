<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_width extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Width:', 'zmplugin' );
    $this->description = __( 'Choose the width of this element.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
      'uk-width-expand' => __( 'Width: Expand', 'zmplugin' ),
      'uk-width-expand@s' => __( 'Width: Expand / Stack @s', 'zmplugin' ),
      'uk-width-expand@m' => __( 'Width: Expand / Stack @m', 'zmplugin' ),
      'uk-width-expand@l' => __( 'Width: Expand / Stack @l', 'zmplugin' ),
      'uk-width-auto' => __( 'Width: Auto', 'zmplugin' ),
      'uk-width-auto@s' => __( 'Width: Auto / Stack @s', 'zmplugin' ),
      'uk-width-auto@m' => __( 'Width: Auto / Stack @m', 'zmplugin' ),
      'uk-width-auto@l' => __( 'Width: Auto / Stack @l', 'zmplugin' ),
      'uk-width-1-1' => __( 'Width: 1-1', 'zmplugin' ),
      'uk-width-1-1@s' => __( 'Width: 1-1 / Stack @s', 'zmplugin' ),
      'uk-width-1-1@m' => __( 'Width: 1-1 / Stack @m', 'zmplugin' ),
      'uk-width-1-1@l' => __( 'Width: 1-1 / Stack @l', 'zmplugin' ),
      'uk-width-1-2' => __( 'Width: 1-2', 'zmplugin' ),
      'uk-width-1-2@s' => __( 'Width: 1-2 / Stack @s', 'zmplugin' ),
      'uk-width-1-2@m' => __( 'Width: 1-2 / Stack @m', 'zmplugin' ),
      'uk-width-1-2@l' => __( 'Width: 1-2 / Stack @l', 'zmplugin' ),
      'uk-width-1-3' => __( 'Width: 1-3', 'zmplugin' ),
      'uk-width-1-3@s' => __( 'Width: 1-3 / Stack @s', 'zmplugin' ),
      'uk-width-1-3@m' => __( 'Width: 1-3 / Stack @m', 'zmplugin' ),
      'uk-width-1-3@l' => __( 'Width: 1-3 / Stack @l', 'zmplugin' ),
      'uk-width-2-3' => __( 'Width: 2-3', 'zmplugin' ),
      'uk-width-2-3@s' => __( 'Width: 2-3 / Stack @s', 'zmplugin' ),
      'uk-width-2-3@m' => __( 'Width: 2-3 / Stack @m', 'zmplugin' ),
      'uk-width-2-3@l' => __( 'Width: 2-3 / Stack @l', 'zmplugin' ),
      'uk-width-1-4' => __( 'Width: 1-4', 'zmplugin' ),
      'uk-width-1-4@s' => __( 'Width: 1-4 / Stack @s', 'zmplugin' ),
      'uk-width-1-4@m' => __( 'Width: 1-4 / Stack @m', 'zmplugin' ),
      'uk-width-1-4@l' => __( 'Width: 1-4 / Stack @l', 'zmplugin' ),
      'uk-width-3-4' => __( 'Width: 3-4', 'zmplugin' ),
      'uk-width-3-4@s' => __( 'Width: 3-4 / Stack @s', 'zmplugin' ),
      'uk-width-3-4@m' => __( 'Width: 3-4 / Stack @m', 'zmplugin' ),
      'uk-width-3-4@l' => __( 'Width: 3-4 / Stack @l', 'zmplugin' ),
      'uk-width-1-5' => __( 'Width: 1-5', 'zmplugin' ),
      'uk-width-1-5@s' => __( 'Width: 1-5 / Stack @s', 'zmplugin' ),
      'uk-width-1-5@m' => __( 'Width: 1-5 / Stack @m', 'zmplugin' ),
      'uk-width-1-5@l' => __( 'Width: 1-5 / Stack @l', 'zmplugin' ),
      'uk-width-2-5' => __( 'Width: 2-5', 'zmplugin' ),
      'uk-width-2-5@s' => __( 'Width: 2-5 / Stack @s', 'zmplugin' ),
      'uk-width-2-5@m' => __( 'Width: 2-5 / Stack @m', 'zmplugin' ),
      'uk-width-2-5@l' => __( 'Width: 2-5 / Stack @l', 'zmplugin' ),
      'uk-width-3-5' => __( 'Width: 3-5', 'zmplugin' ),
      'uk-width-3-5@s' => __( 'Width: 3-5 / Stack @s', 'zmplugin' ),
      'uk-width-3-5@m' => __( 'Width: 3-5 / Stack @m', 'zmplugin' ),
      'uk-width-3-5@l' => __( 'Width: 3-5 / Stack @l', 'zmplugin' ),
      'uk-width-4-5' => __( 'Width: 4-5', 'zmplugin' ),
      'uk-width-4-5@s' => __( 'Width: 4-5 / Stack @s', 'zmplugin' ),
      'uk-width-4-5@m' => __( 'Width: 4-5 / Stack @m', 'zmplugin' ),
      'uk-width-4-5@l' => __( 'Width: 4-5 / Stack @l', 'zmplugin' ),
      'uk-width-1-6' => __( 'Width: 1-6', 'zmplugin' ),
      'uk-width-1-6@s' => __( 'Width: 1-6 / Stack @s', 'zmplugin' ),
      'uk-width-1-6@m' => __( 'Width: 1-6 / Stack @m', 'zmplugin' ),
      'uk-width-1-6@l' => __( 'Width: 1-6 / Stack @l', 'zmplugin' ),
      'uk-width-5-6' => __( 'Width: 5-6', 'zmplugin' ),
      'uk-width-5-6@s' => __( 'Width: 5-6 / Stack @s', 'zmplugin' ),
      'uk-width-5-6@m' => __( 'Width: 5-6 / Stack @m', 'zmplugin' ),
      'uk-width-5-6@l' => __( 'Width: 5-6 / Stack @l', 'zmplugin' ),
    );

  }

}
