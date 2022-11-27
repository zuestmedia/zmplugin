<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class image_class extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Image Style', 'zmplugin' );
    $this->description = __( 'Choose one or several styling options for Images.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(

      //must be doubled if has background and blend mode...      
      'uk-display-block' =>  __( 'Display: Block', 'zmplugin' ),

      'uk-border-rounded' =>  __( 'Border: Rounded', 'zmplugin' ),
      'uk-border-circle' =>  __( 'Border: Circle', 'zmplugin' ),
      'uk-border-pill' =>  __( 'Border: Pill', 'zmplugin' ),

      'uk-blend-multiply' => __('Blend Mode: Multiply', 'zmplugin' ),
      'uk-blend-screen' => __('Blend Mode: Screen', 'zmplugin' ),
      'uk-blend-overlay' => __('Blend Mode: Overlay', 'zmplugin' ),
      'uk-blend-darken' => __('Blend Mode: Darken', 'zmplugin' ),
      'uk-blend-lighten' => __('Blend Mode: Lighten', 'zmplugin' ),
      'uk-blend-color-dodge' => __('Blend Mode: Color Dodge', 'zmplugin' ),
      'uk-blend-color-burn' => __('Blend Mode: Color Burn', 'zmplugin' ),
      'uk-blend-hard-light' => __('Blend Mode: Hard Light', 'zmplugin' ),
      'uk-blend-soft-light' => __('Blend Mode: Soft Light', 'zmplugin' ),
      'uk-blend-difference' => __('Blend Mode: Difference', 'zmplugin' ),
      'uk-blend-exclusion' => __('Blend Mode: Exclusion', 'zmplugin' ),
      'uk-blend-hue' => __('Blend Mode: Hue', 'zmplugin' ),
      'uk-blend-saturation' => __('Blend Mode: Saturation', 'zmplugin' ),
      'uk-blend-color' => __('Blend Mode: Color', 'zmplugin' ),
      'uk-blend-luminosity' => __('Blend Mode: Luminosity', 'zmplugin' ),

      'uk-animation-kenburns' =>  __( 'Animation: Kenburns', 'zmplugin' ),



    );

  }

}
