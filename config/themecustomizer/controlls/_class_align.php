<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_align extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Alignement', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(

      'uk-align-left' =>  __( 'Align: Left', 'zmplugin' ),
      'uk-align-center' =>  __( 'Align: Center', 'zmplugin' ),
      'uk-align-right' =>  __( 'Align: Right', 'zmplugin' ),

      'uk-align-left@s' =>  __( 'Align: Left @s', 'zmplugin' ),
      'uk-align-right@s' =>  __( 'Align: Right @s', 'zmplugin' ),

      'uk-align-left@m' =>  __( 'Align: Left @m', 'zmplugin' ),
      'uk-align-right@m' =>  __( 'Align: Right @m', 'zmplugin' ),

      'uk-align-left@l' =>  __( 'Align: Left @l', 'zmplugin' ),
      'uk-align-right@l' =>  __( 'Align: Right @l', 'zmplugin' ),

      'uk-align-left@xl' =>  __( 'Align: Left @xl', 'zmplugin' ),
      'uk-align-right@xl' =>  __( 'Align: Right @xl', 'zmplugin' ),

    );

  }


}
