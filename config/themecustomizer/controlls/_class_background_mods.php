<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_background_mods extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Background Mods', 'zmplugin' );
    $this->description = __( 'Choose Background Style Modifications Settings.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
      'uk-background-norepeat' => __('No Repeat', 'zmplugin' ),
      'uk-background-fixed' => __('Position Fixed', 'zmplugin' ),
      'uk-background-image@s' => __('Image@s', 'zmplugin' ),
      'uk-background-image@m' => __('Image@m', 'zmplugin' ),
      'uk-background-image@l' => __('Image@l', 'zmplugin' ),
      'uk-background-image@xl' => __('Image@xl', 'zmplugin' ),
      'uk-background-blend-multiply' => __('Blend Multiply', 'zmplugin' ),
      'uk-background-blend-screen' => __('Blend Screen', 'zmplugin' ),
      'uk-background-blend-overlay' => __('Blend Overlay', 'zmplugin' ),
      'uk-background-blend-darken' => __('Blend Darken', 'zmplugin' ),
      'uk-background-blend-lighten' => __('Blend Lighten', 'zmplugin' ),
      'uk-background-blend-color-dodge' => __('Blend Color Dodge', 'zmplugin' ),
      'uk-background-blend-color-burn' => __('Blend Color Burn', 'zmplugin' ),
      'uk-background-blend-hard-light' => __('Blend Hard Light', 'zmplugin' ),
      'uk-background-blend-soft-light' => __('Blend Soft Light', 'zmplugin' ),
      'uk-background-blend-difference' => __('Blend Difference', 'zmplugin' ),
      'uk-background-blend-exclusion' => __('Blend Exclusion', 'zmplugin' ),
      'uk-background-blend-hue' => __('Blend Hue', 'zmplugin' ),
      'uk-background-blend-saturation' => __('Blend Saturation', 'zmplugin' ),
      'uk-background-blend-color' => __('Blend Color', 'zmplugin' ),
      'uk-background-blend-luminosity' => __('Blend Luminosity', 'zmplugin' )
    );

  }

}
