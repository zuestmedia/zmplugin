<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_container extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    $this->type = 'zm-radiocontainerwidth';
    $this->active_callback_item = 'container_element';
    $this->label = __( 'Container Width', 'zmplugin' );
    $this->description = __( 'Choose horizontal container width.', 'zmplugin' );
    $this->validation = 'class';
    /*$this->choices = array(
      'uk-container-xsmall' => __( 'XSmall', 'zmplugin' ),
      'uk-container-small' => __( 'Small', 'zmplugin' ),
      'uk-container-default' => __( 'Default', 'zmplugin' ),
      'uk-container-large' => __( 'Large', 'zmplugin' ),
      'uk-container-expand' => __( 'XLarge', 'zmplugin' ),
      'uk-container-expand uk-padding-remove-horizontal' => __( 'Full', 'zmplugin' ),
    );*/
    $this->choices = array(
      'uk-container uk-container-xsmall' => '46%',
      'uk-container uk-container-small' => '56%',
      'uk-container uk-container-default' => '66%',
      'uk-container uk-container-large' => '76%',
      'uk-container uk-container-expand' => '86%',
      'uk-container uk-container-expand uk-padding-remove-horizontal' => '95%',
    );

  }

}
