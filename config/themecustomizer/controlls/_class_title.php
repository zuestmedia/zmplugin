<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_title extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Title Style', 'zmplugin' );
    $this->description = __( 'Choose one or several styling options for titles.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(

      'uk-article-title' => __('Type: Article Title', 'zmplugin' ),
      'uk-card-title' => __('Type: Card Title', 'zmplugin' ),

      'uk-heading-small' => __('Font Size: Small Heading', 'zmplugin' ),
      'uk-heading-medium' => __('Font Size: Medium Heading', 'zmplugin' ),
      'uk-heading-large' => __('Font Size: Large Heading', 'zmplugin' ),
      'uk-heading-xlarge' => __('Font Size: X-Large Heading', 'zmplugin' ),
      'uk-heading-2xlarge' => __('Font Size: 2X-Large Heading', 'zmplugin' ),

      'uk-text-lighter' =>  __( 'Font Weight: Lighter', 'zmplugin' ),
      'uk-text-light' =>  __( 'Font Weight: Light', 'zmplugin' ),
      'uk-text-normal' =>  __( 'Font Weight: Normal', 'zmplugin' ),
      'uk-text-bold' =>  __( 'Font Weight: Bold', 'zmplugin' ),
      'uk-text-bolder' =>  __( 'Font Weight: Bolder', 'zmplugin' ),

      'uk-text-italic' =>  __( 'Font Style: Italic', 'zmplugin' ),

      'uk-heading-divider' => __('Style: Divider', 'zmplugin' ),
      'uk-heading-bullet' => __('Style: Bullet', 'zmplugin' ),

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

      'uk-margin' =>  __( 'Margin: Top & Bottom', 'zmplugin' ),
      'uk-margin-top' =>  __( 'Margin: Top', 'zmplugin' ),
      'uk-margin-bottom' =>  __( 'Margin: Bottom', 'zmplugin' ),
      'uk-margin-small' =>  __( 'Margin: Small Top & Bottom', 'zmplugin' ),
      'uk-margin-small-top' =>  __( 'Margin: Small Top', 'zmplugin' ),
      'uk-margin-small-bottom' =>  __( 'Margin: Small Bottom', 'zmplugin' ),
      'uk-margin-medium' =>  __( 'Margin: Medium Top & Bottom', 'zmplugin' ),
      'uk-margin-medium-top' =>  __( 'Margin: Medium Top', 'zmplugin' ),
      'uk-margin-medium-bottom' =>  __( 'Margin: Medium Bottom', 'zmplugin' ),
      'uk-margin-large' =>  __( 'Margin: Large Top & Bottom', 'zmplugin' ),
      'uk-margin-large-top' =>  __( 'Margin: Large Top', 'zmplugin' ),
      'uk-margin-large-bottom' =>  __( 'Margin: Large Bottom', 'zmplugin' ),
      'uk-margin-xlarge' =>  __( 'Margin: X-Large Top & Bottom', 'zmplugin' ),
      'uk-margin-xlarge-top' =>  __( 'Margin: X-Large Top', 'zmplugin' ),
      'uk-margin-xlarge-bottom' =>  __( 'Margin: X-Large Bottom', 'zmplugin' ),
      'uk-margin-remove-vertical' =>  __( 'Margin: Remove', 'zmplugin' ),
      'uk-margin-remove-bottom' =>  __( 'Margin: Remove Bottom', 'zmplugin' ),
      'uk-margin-remove-top' =>  __( 'Margin: Remove Top', 'zmplugin' ),

    );

  }

  protected function menutitle() {
    $this->default();
    $this->label = __( 'Menu Title Style:', 'zmplugin' );
  }

}
