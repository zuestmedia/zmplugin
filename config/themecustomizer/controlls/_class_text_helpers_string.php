<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_text_helpers_string extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Helper Classes', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(

      'uk-text-lead' =>  __( 'Type: Lead', 'zmplugin' ),
      'uk-text-meta' =>  __( 'Type: Meta', 'zmplugin' ),

      'uk-text-small' =>  __( 'Font Size: Small', 'zmplugin' ),
      'uk-text-default' =>  __( 'Font Size: Default', 'zmplugin' ),
      'uk-text-large' =>  __( 'Font Size: Large', 'zmplugin' ),

      'uk-text-lighter' =>  __( 'Font Weight: Lighter', 'zmplugin' ),
      'uk-text-light' =>  __( 'Font Weight: Light', 'zmplugin' ),
      'uk-text-normal' =>  __( 'Font Weight: Normal', 'zmplugin' ),
      'uk-text-bold' =>  __( 'Font Weight: Bold', 'zmplugin' ),
      'uk-text-bolder' =>  __( 'Font Weight: Bolder', 'zmplugin' ),

      'uk-text-italic' =>  __( 'Font Style: Italic', 'zmplugin' ),

      'uk-display-block' =>  __( 'Display: Block', 'zmplugin' ),
      'uk-display-inline' =>  __( 'Display: Inline', 'zmplugin' ),
      'uk-display-inline-block' =>  __( 'Display: Inline-Block', 'zmplugin' ),

      'uk-float-left' =>  __( 'Float: Left', 'zmplugin' ),
      'uk-float-right' =>  __( 'Float: Right', 'zmplugin' ),

      'uk-text-capitalize' =>  __( 'Text Transform: Capitalize', 'zmplugin' ),
      'uk-text-uppercase' =>  __( 'Text Transform: Uppercase', 'zmplugin' ),
      'uk-text-lowercase' =>  __( 'Text Transform: Lowercase', 'zmplugin' ),

      'uk-text-decoration-none' =>  __( 'Text Decoration: None', 'zmplugin' ),

      'uk-text-truncate' =>  __( 'Text Wrapping: Truncate', 'zmplugin' ),
      'uk-text-break' =>  __( 'Text Wrapping: Break', 'zmplugin' ),
      'uk-text-nowrap' =>  __( 'Text Wrapping: No Wrap', 'zmplugin' ),

      'uk-text-muted' =>  __( 'Color: Muted', 'zmplugin' ),
      'uk-text-emphasis' =>  __( 'Color: Emphasis', 'zmplugin' ),
      'uk-text-primary' =>  __( 'Color: Primary', 'zmplugin' ),
      'uk-text-secondary' =>  __( 'Color: Secondary', 'zmplugin' ),
      'uk-text-success' =>  __( 'Color: Success', 'zmplugin' ),
      'uk-text-warning' =>  __( 'Color: Warning', 'zmplugin' ),
      'uk-text-danger' =>  __( 'Color: Danger', 'zmplugin' ),

      'uk-text-justify' =>  __( 'Text Align: Justify', 'zmplugin' ),
      'uk-text-left' =>  __( 'Text Align: Left', 'zmplugin' ),
      'uk-text-center' =>  __( 'Text Align: Center', 'zmplugin' ),
      'uk-text-right' =>  __( 'Text Align: Right', 'zmplugin' ),

      'uk-text-left@s' =>  __( 'Text Align: Left @s', 'zmplugin' ),
      'uk-text-center@s' =>  __( 'Text Align: Center @s', 'zmplugin' ),
      'uk-text-right@s' =>  __( 'Text Align: Right @s', 'zmplugin' ),

      'uk-text-left@m' =>  __( 'Text Align: Left @m', 'zmplugin' ),
      'uk-text-center@m' =>  __( 'Text Align: Center @m', 'zmplugin' ),
      'uk-text-right@m' =>  __( 'Text Align: Right @m', 'zmplugin' ),

      'uk-text-left@l' =>  __( 'Text Align: Left @l', 'zmplugin' ),
      'uk-text-center@l' =>  __( 'Text Align: Center @l', 'zmplugin' ),
      'uk-text-right@l' =>  __( 'Text Align: Right @l', 'zmplugin' ),

      'uk-text-left@xl' =>  __( 'Text Align: Left @xl', 'zmplugin' ),
      'uk-text-center@xl' =>  __( 'Text Align: Center @xl', 'zmplugin' ),
      'uk-text-right@xl' =>  __( 'Text Align: Right @xl', 'zmplugin' ),

      'uk-margin-left' =>  __( 'Margin Left', 'zmplugin' ),
      'uk-margin-right' =>  __( 'Margin Right', 'zmplugin' ),
      'uk-margin-small-left' =>  __( 'Small Margin Left', 'zmplugin' ),
      'uk-margin-small-right' =>  __( 'Small Margin Right', 'zmplugin' ),
      'uk-margin-medium-left' =>  __( 'Medium Margin Left', 'zmplugin' ),
      'uk-margin-medium-right' =>  __( 'Medium Margin Right', 'zmplugin' ),
      'uk-margin-large-left' =>  __( 'Large Margin Left', 'zmplugin' ),
      'uk-margin-large-right' =>  __( 'Large Margin Right', 'zmplugin' ),
      'uk-margin-xlarge-left' =>  __( 'X-Large Margin Left', 'zmplugin' ),
      'uk-margin-xlarge-right' =>  __( 'X-Large Margin Right', 'zmplugin' ),

      'uk-margin-auto' =>  __( 'Auto Margin', 'zmplugin' ),
      'uk-margin-auto-left' =>  __( 'Auto Margin Left', 'zmplugin' ),
      'uk-margin-auto-right' =>  __( 'Auto Margin Right', 'zmplugin' ),

      'uk-margin-auto@s' =>  __( 'Auto Margin @s', 'zmplugin' ),
      'uk-margin-auto-left@s' =>  __( 'Auto Margin Left @s', 'zmplugin' ),
      'uk-margin-auto-right@s' =>  __( 'Auto Margin Right @s', 'zmplugin' ),

      'uk-margin-auto@m' =>  __( 'Auto Margin @m', 'zmplugin' ),
      'uk-margin-auto-left@m' =>  __( 'Auto Margin Left @m', 'zmplugin' ),
      'uk-margin-auto-right@m' =>  __( 'Auto Margin Right @m', 'zmplugin' ),

      'uk-margin-auto@l' =>  __( 'Auto Margin @l', 'zmplugin' ),
      'uk-margin-auto-left@l' =>  __( 'Auto Margin Left @l', 'zmplugin' ),
      'uk-margin-auto-right@l' =>  __( 'Auto Margin Right @l', 'zmplugin' ),

      'uk-margin-auto@xl' =>  __( 'Auto Margin @xl', 'zmplugin' ),
      'uk-margin-auto-left@xl' =>  __( 'Auto Margin Left @xl', 'zmplugin' ),
      'uk-margin-auto-right@xl' =>  __( 'Auto Margin Right @xl', 'zmplugin' ),

    );

  }


}
