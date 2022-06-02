<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class link_class extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  public function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Link Style', 'zmplugin' );
    $this->description = __( 'Choose Link Styles.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(

      'uk-link-text' => __( 'Link: Text', 'zmplugin' ),
      'uk-link-heading' => __( 'Link: Heading', 'zmplugin' ),
      'uk-link-reset' => __( 'Link:  Reset', 'zmplugin' ),
      'uk-link-muted' => __( 'Link: Muted', 'zmplugin' ),
      'uk-link-toggle' => __( 'Link: Toggle', 'zmplugin' ),
      'uk-disabled' => __( 'Link: Disabled', 'zmplugin' ),

      'uk-text-lighter' =>  __( 'Font Weight: Lighter', 'zmplugin' ),
      'uk-text-light' =>  __( 'Font Weight: Light', 'zmplugin' ),
      'uk-text-normal' =>  __( 'Font Weight: Normal', 'zmplugin' ),
      'uk-text-bold' =>  __( 'Font Weight: Bold', 'zmplugin' ),
      'uk-text-bolder' =>  __( 'Font Weight: Bolder', 'zmplugin' ),

      'uk-text-italic' =>  __( 'Font Style: Italic', 'zmplugin' ),

      'uk-text-capitalize' =>  __( 'Text Transform: Capitalize', 'zmplugin' ),
      'uk-text-uppercase' =>  __( 'Text Transform: Uppercase', 'zmplugin' ),
      'uk-text-lowercase' =>  __( 'Text Transform: Lowercase', 'zmplugin' ),

      'uk-button uk-button-default' => __( 'Button: Default', 'zmplugin' ),
      'uk-button uk-button-primary' => __( 'Button: Primary', 'zmplugin' ),
      'uk-button uk-button-secondary' => __( 'Button: Secondary', 'zmplugin' ),
      'uk-button uk-button-text' => __( 'Button: Text', 'zmplugin' ),
      'uk-button uk-button-link' => __( 'Button: Link', 'zmplugin' ),
      'uk-button uk-button-danger' => __( 'Button: Danger', 'zmplugin' ),

      'uk-button-small' => __( 'Button Size: Small', 'zmplugin' ),
      'uk-button-large' => __( 'Button Size: Large', 'zmplugin' ),

    );

  }

}
