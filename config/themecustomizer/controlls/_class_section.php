<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_section extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-radioverticalpadding';
    $this->label = __( 'Padding Vertical', 'zmplugin' );
    $this->description = __( 'Choose a vertical padding.', 'zmplugin' );
    $this->validation = 'class';
    /*$this->choices = array(
      'uk-padding-remove-vertical' => __( 'None', 'zmplugin' ),
      'uk-section-xsmall' => __( 'XSmall', 'zmplugin' ),
      'uk-section-small' => __( 'Small', 'zmplugin' ),
      'uk-section-medium' => __( 'Default', 'zmplugin' ),
      'uk-section-large' => __( 'Large', 'zmplugin' ),
      'uk-section-xlarge' => __( 'XLarge', 'zmplugin' ),
    //  'uk-section-overlap' => __( 'Overlap', 'zmplugin' ),
  );*/
    $this->choices = array(
      'uk-section uk-section-xlarge' => '60px',
      'uk-section uk-section-large' => '54px',
      'uk-section uk-section-medium' => '48px',
      'uk-section uk-section-small' => '42px',
      'uk-section uk-section-xsmall' => '36px',
      'uk-section uk-padding-remove-vertical' => '32px',
    );

  }

}
