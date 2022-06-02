<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_text_helpers extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Text helpers', 'zmplugin' );
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

      'uk-dropcap' =>  __( 'Style: Drop cap', 'zmplugin' ),

      'uk-float-left' =>  __( 'Float: Left', 'zmplugin' ),
      'uk-float-right' =>  __( 'Float: Right', 'zmplugin' ),
      'uk-clearfix' =>  __( 'Float: Clear Floats', 'zmplugin' ),

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

      'uk-column-1-2' =>  __( 'Columns: 2', 'zmplugin' ),
      'uk-column-1-3' =>  __( 'Columns: 3', 'zmplugin' ),
      'uk-column-1-4' =>  __( 'Columns: 4', 'zmplugin' ),
      'uk-column-1-5' =>  __( 'Columns: 5', 'zmplugin' ),
      'uk-column-1-6' =>  __( 'Columns: 6', 'zmplugin' ),

      'uk-column-1-2@s' =>  __( 'Columns: 2 @s', 'zmplugin' ),
      'uk-column-1-3@s' =>  __( 'Columns: 3 @s', 'zmplugin' ),
      'uk-column-1-4@s' =>  __( 'Columns: 4 @s', 'zmplugin' ),
      'uk-column-1-5@s' =>  __( 'Columns: 5 @s', 'zmplugin' ),
      'uk-column-1-6@s' =>  __( 'Columns: 6 @s', 'zmplugin' ),

      'uk-column-1-2@m' =>  __( 'Columns: 2 @m', 'zmplugin' ),
      'uk-column-1-3@m' =>  __( 'Columns: 3 @m', 'zmplugin' ),
      'uk-column-1-4@m' =>  __( 'Columns: 4 @m', 'zmplugin' ),
      'uk-column-1-5@m' =>  __( 'Columns: 5 @m', 'zmplugin' ),
      'uk-column-1-6@m' =>  __( 'Columns: 6 @m', 'zmplugin' ),

      'uk-column-1-2@l' =>  __( 'Columns: 2 @l', 'zmplugin' ),
      'uk-column-1-3@l' =>  __( 'Columns: 3 @l', 'zmplugin' ),
      'uk-column-1-4@l' =>  __( 'Columns: 4 @l', 'zmplugin' ),
      'uk-column-1-5@l' =>  __( 'Columns: 5 @l', 'zmplugin' ),
      'uk-column-1-6@l' =>  __( 'Columns: 6 @l', 'zmplugin' ),

      'uk-column-1-2@xl' =>  __( 'Columns: 2 @xl', 'zmplugin' ),
      'uk-column-1-3@xl' =>  __( 'Columns: 3 @xl', 'zmplugin' ),
      'uk-column-1-4@xl' =>  __( 'Columns: 4 @xl', 'zmplugin' ),
      'uk-column-1-5@xl' =>  __( 'Columns: 5 @xl', 'zmplugin' ),
      'uk-column-1-6@xl' =>  __( 'Columns: 6 @xl', 'zmplugin' ),

      'uk-column-divider' =>  __( 'Column-Divider', 'zmplugin' ),

    );

  }


}
