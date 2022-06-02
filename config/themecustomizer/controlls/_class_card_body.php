<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_card_body extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-radiocontainercardpadding';
    $this->label = __( 'Body', 'zmplugin' );
    $this->description = __( 'Choose out of different body paddings.', 'zmplugin' );
    $this->validation = 'class';
    /*$this->choices = array(
      'uk-card uk-card-body uk-card-small'   =>  __( 'Small', 'zmplugin' ),
      'uk-card uk-card-body'                 =>  __( 'Medium', 'zmplugin' ),
      'uk-card uk-card-body uk-card-large'   =>  __( 'Large', 'zmplugin' ),
      ''                                     =>  __( 'None', 'zmplugin' ),
    );*/
    $this->choices = array(
      'uk-card uk-card-body uk-card-large'   =>  '50%',
      'uk-card uk-card-body'                 =>  '70%',
      'uk-card uk-card-body uk-card-small'   =>  '90%',
      ''                              =>  '97%',
    );

  }

  protected function widgetinner() {

    $this->default();

    $this->label = __( 'Block Body', 'zmplugin' );

  }

}
