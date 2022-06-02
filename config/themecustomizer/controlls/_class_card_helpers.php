<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_card_helpers extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Body Helpers', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(

      'uk-border-rounded' => __('Border: Rounded', 'zmplugin' ),
      'uk-border-circle' => __('Border: Circle', 'zmplugin' ),
      'uk-border-pill' => __('Border: Pill', 'zmplugin' ),

      'uk-overflow-hidden' =>  __( 'Overflow: Hidden', 'zmplugin' ),
      'uk-overflow-auto' =>  __( 'Overflow: Auto', 'zmplugin' ),

      'uk-text-justify' =>  __( 'Text Align: Justify', 'zmplugin' ),
      'uk-text-left' =>  __( 'Text Align: Left', 'zmplugin' ),
      'uk-text-center' =>  __( 'Text Align: Center', 'zmplugin' ),
      'uk-text-right' =>  __( 'Text Align: Right', 'zmplugin' ),


      'uk-box-shadow-small' => __('Box Shadow: Small', 'zmplugin' ),
      'uk-box-shadow-medium' => __('Box Shadow: Medium', 'zmplugin' ),
      'uk-box-shadow-large' => __('Box Shadow: Large', 'zmplugin' ),
      'uk-box-shadow-xlarge' => __('Box Shadow: XLarge', 'zmplugin' ),
      'uk-box-shadow-bottom' => __('Box Shadow: Bottom', 'zmplugin' ),

      'uk-box-shadow-hover-small' => __('Box Shadow Hover: Small', 'zmplugin' ),
      'uk-box-shadow-hover-medium' => __('Box Shadow Hover: Medium', 'zmplugin' ),
      'uk-box-shadow-hover-large' => __('Box Shadow Hover: Large', 'zmplugin' ),
      'uk-box-shadow-hover-xlarge' => __('Box Shadow Hover: XLarge', 'zmplugin' ),


      //'uk-card-hover' =>  __( 'Card: Hover Effect', 'zmplugin' ),

      'uk-float-left' =>  __( 'Float: Left', 'zmplugin' ),
      'uk-float-right' =>  __( 'Float: Right', 'zmplugin' ),
      'uk-clearfix' =>  __( 'Float: Clear Floats', 'zmplugin' ),


      'uk-display-block' =>  __( 'Display: Block', 'zmplugin' ),
      'uk-display-inline' =>  __( 'Display: Inline', 'zmplugin' ),
      'uk-display-inline-block' =>  __( 'Display: Inline-Block', 'zmplugin' ),

      'uk-inline' =>  __( 'Positioning Parent: Inline-Block & Max-Width 100%', 'zmplugin' ),
      'uk-inline-clip' =>  __( 'Positioning Parent: + Clips Overflow', 'zmplugin' ),

      'uk-overlay' =>  __( 'Overlay', 'zmplugin' ),
      'uk-overlay-default' =>  __( 'Overlay: Default', 'zmplugin' ),
      'uk-overlay-primary' =>  __( 'Overlay: Primary', 'zmplugin' ),

      'uk-position-top' =>  __( 'Position: Top', 'zmplugin' ),
      'uk-position-left' =>  __( 'Position: Left', 'zmplugin' ),
      'uk-position-right' =>  __( 'Position: Right', 'zmplugin' ),
      'uk-position-bottom' =>  __( 'Position: Bottom', 'zmplugin' ),

      'uk-position-cover' =>  __( 'Position: Cover', 'zmplugin' ),
      'uk-position-center-left-out' =>  __( 'Position: Center-Left-Out', 'zmplugin' ),
      'uk-position-center-right-out' =>  __( 'Position: Center-Right-Out', 'zmplugin' ),

      'uk-position-top-left' =>  __( 'Position: Top-Left', 'zmplugin' ),
      'uk-position-top-center' =>  __( 'Position: Top-Center', 'zmplugin' ),
      'uk-position-top-right' =>  __( 'Position: Top-Right', 'zmplugin' ),
      'uk-position-center-left' =>  __( 'Position: Center-Left', 'zmplugin' ),
      'uk-position-center' =>  __( 'Position: Center', 'zmplugin' ),
      'uk-position-center-right' =>  __( 'Position: Center-Right', 'zmplugin' ),
      'uk-position-bottom-left' =>  __( 'Position: Bottom-Left', 'zmplugin' ),
      'uk-position-bottom-center' =>  __( 'Position: Bottom-Center', 'zmplugin' ),
      'uk-position-bottom-right' =>  __( 'Position: Bottom-Right', 'zmplugin' ),

      'uk-position-small' =>  __( 'Position Mod: Small', 'zmplugin' ),
      'uk-position-medium' =>  __( 'Position Mod: Medium', 'zmplugin' ),
      'uk-position-large' =>  __( 'Position Mod: Large', 'zmplugin' ),

      'uk-position-relative' =>  __( 'Position Utility: Relative', 'zmplugin' ),
      'uk-position-absolute' =>  __( 'Position Utility: Absolute', 'zmplugin' ),
      'uk-position-fixed' =>  __( 'Position Utility: Fixed', 'zmplugin' ),
      'uk-position-z-index' =>  __( 'Position Utility: Z-Index', 'zmplugin' ),


      'uk-transition-toggle' =>  __( 'Transition Trigger: Apply to Parent', 'zmplugin' ),

      'uk-transition-fade' =>  __( 'Transition: Fade', 'zmplugin' ),

      'uk-transition-scale-up' =>  __( 'Transition: Scale Up', 'zmplugin' ),
      'uk-transition-scale-down' =>  __( 'Transition: Scale Down', 'zmplugin' ),

      'uk-transition-slide-top' =>  __( 'Transition: Slide Top', 'zmplugin' ),
      'uk-transition-slide-bottom' =>  __( 'Transition: Slide Bottom', 'zmplugin' ),
      'uk-transition-slide-left' =>  __( 'Transition: Slide Left', 'zmplugin' ),
      'uk-transition-slide-right' =>  __( 'Transition: Slide Right', 'zmplugin' ),

      'uk-transition-slide-top-small' =>  __( 'Transition: Slide Top Small', 'zmplugin' ),
      'uk-transition-slide-bottom-small' =>  __( 'Transition: Slide Bottom Small', 'zmplugin' ),
      'uk-transition-slide-left-small' =>  __( 'Transition: Slide Left Small', 'zmplugin' ),
      'uk-transition-slide-right-small' =>  __( 'Transition: Slide Right Small', 'zmplugin' ),

      'uk-transition-slide-top-medium' =>  __( 'Transition: Slide Top Medium', 'zmplugin' ),
      'uk-transition-slide-bottom-medium' =>  __( 'Transition: Slide Bottom Medium', 'zmplugin' ),
      'uk-transition-slide-left-medium' =>  __( 'Transition: Slide Left Medium', 'zmplugin' ),
      'uk-transition-slide-right-medium' =>  __( 'Transition: Slide Right Medium', 'zmplugin' ),


      'uk-animation-toggle' =>  __( 'Animation Trigger: Apply to Parent', 'zmplugin' ),

      'uk-animation-fade' =>  __( 'Animation: Fade', 'zmplugin' ),

      'uk-animation-scale-up' =>  __( 'Animation: Scale Up', 'zmplugin' ),
      'uk-animation-scale-down' =>  __( 'Animation: Scale Down', 'zmplugin' ),

      'uk-animation-slide-top' =>  __( 'Animation: Slide Top', 'zmplugin' ),
      'uk-animation-slide-bottom' =>  __( 'Animation: Slide Bottom', 'zmplugin' ),
      'uk-animation-slide-left' =>  __( 'Animation: Slide Left', 'zmplugin' ),
      'uk-animation-slide-right' =>  __( 'Animation: Slide Right', 'zmplugin' ),

      'uk-animation-slide-top-small' =>  __( 'Animation: Slide Top Small', 'zmplugin' ),
      'uk-animation-slide-bottom-small' =>  __( 'Animation: Slide Bottom Small', 'zmplugin' ),
      'uk-animation-slide-left-small' =>  __( 'Animation: Slide Left Small', 'zmplugin' ),
      'uk-animation-slide-right-small' =>  __( 'Animation: Slide Right Small', 'zmplugin' ),

      'uk-animation-slide-top-medium' =>  __( 'Animation: Slide Top Medium', 'zmplugin' ),
      'uk-animation-slide-bottom-medium' =>  __( 'Animation: Slide Bottom Medium', 'zmplugin' ),
      'uk-animation-slide-left-medium' =>  __( 'Animation: Slide Left Medium', 'zmplugin' ),
      'uk-animation-slide-right-medium' =>  __( 'Animation: Slide Right Medium', 'zmplugin' ),

      'uk-animation-kenburns' =>  __( 'Animation: Kenburns', 'zmplugin' ),
      'uk-animation-shake' =>  __( 'Animation: Shake', 'zmplugin' ),
      'uk-animation-stroke' =>  __( 'Animation: Stroke (only with SVG)', 'zmplugin' ),

      'uk-animation-reverse' =>  __( 'Animation Mod: Reverse', 'zmplugin' ),
      'uk-animation-fast' =>  __( 'Animation Mod: Fast', 'zmplugin' ),

      //to use with animation or transition
      'uk-transform-origin-top-left' =>  __( 'Origin: Top-Left', 'zmplugin' ),
      'uk-transform-origin-top-center' =>  __( 'Origin: Top-Center', 'zmplugin' ),
      'uk-transform-origin-top-right' =>  __( 'Origin: Top-Right', 'zmplugin' ),
      'uk-transform-origin-center-left' =>  __( 'Origin: Center-Left', 'zmplugin' ),
      'uk-transform-origin-center-right' =>  __( 'Origin: Center-Right', 'zmplugin' ),
      'uk-transform-origin-bottom-left' =>  __( 'Origin: Bottom-Left', 'zmplugin' ),
      'uk-transform-origin-bottom-center' =>  __( 'Origin: Bottom-Center', 'zmplugin' ),
      'uk-transform-origin-bottom-right' =>  __( 'Origin: Bottom-Right', 'zmplugin' ),


    );

  }

  protected function widgetinner() {

    $this->default();

    $this->label = __( 'Block Body Modifiers', 'zmplugin' );

  }

}
