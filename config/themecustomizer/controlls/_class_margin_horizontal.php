<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_margin_horizontal extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Horizontal Margin', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
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
      'uk-margin-remove-left' =>  __( 'Margin Remove Left', 'zmplugin' ),
      'uk-margin-remove-right' =>  __( 'Margin Remove Right', 'zmplugin' ),
      'uk-margin-auto-right' =>  __( 'Auto Margin Right', 'zmplugin' ),
      'uk-margin-auto-left' =>  __( 'Auto Margin Left', 'zmplugin' ),
      'uk-margin-auto' =>  __( 'Auto Margin Horizontal', 'zmplugin' ),
    );

  }


}
