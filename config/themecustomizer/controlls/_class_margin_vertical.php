<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_margin_vertical extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Vertical Margin', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
      'uk-margin' =>  __( 'Margin', 'zmplugin' ),
      'uk-margin-top' =>  __( 'Margin Top', 'zmplugin' ),
      'uk-margin-bottom' =>  __( 'Margin Bottom', 'zmplugin' ),
      'uk-margin-small' =>  __( 'Small Margin', 'zmplugin' ),
      'uk-margin-small-top' =>  __( 'Small Margin Top', 'zmplugin' ),
      'uk-margin-small-bottom' =>  __( 'Small Margin Bottom', 'zmplugin' ),
      'uk-margin-medium' =>  __( 'Medium Margin', 'zmplugin' ),
      'uk-margin-medium-top' =>  __( 'Medium Margin Top', 'zmplugin' ),
      'uk-margin-medium-bottom' =>  __( 'Medium Margin Bottom', 'zmplugin' ),
      'uk-margin-large' =>  __( 'Large Margin', 'zmplugin' ),
      'uk-margin-large-top' =>  __( 'Large Margin Top', 'zmplugin' ),
      'uk-margin-large-bottom' =>  __( 'Large Margin Bottom', 'zmplugin' ),
      'uk-margin-xlarge' =>  __( 'X-Large Margin', 'zmplugin' ),
      'uk-margin-xlarge-top' =>  __( 'X-Large Margin Top', 'zmplugin' ),
      'uk-margin-xlarge-bottom' =>  __( 'X-Large Margin Bottom', 'zmplugin' ),
      'uk-margin-remove-vertical' =>  __( 'Margin Remove Vertical', 'zmplugin' ),
      'uk-margin-remove-top' =>  __( 'Margin Remove Top', 'zmplugin' ),
      'uk-margin-remove-bottom' =>  __( 'Margin Remove Bottom', 'zmplugin' ),
      'uk-margin-remove-adjacent' =>  __( 'Margin Remove Adjacent', 'zmplugin' ),
      'uk-margin-remove-first-child' =>  __( 'Margin Remove First Child Top', 'zmplugin' ),
      'uk-margin-remove-last-child' =>  __( 'Margin Remove First Child Bottom', 'zmplugin' ),
      'uk-margin-auto-top' =>  __( 'Auto Margin Top', 'zmplugin' ),
      'uk-margin-auto-bottom' =>  __( 'Auto Margin Bottom', 'zmplugin' ),
      'uk-margin-auto-vertical' =>  __( 'Auto Margin Vertical', 'zmplugin' ),
    );

  }


}
