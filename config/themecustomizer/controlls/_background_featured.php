<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _background_featured extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

  /** --> 0 (false) is always the default value! its not possible to set 1 as default value! because it would always return the default value
    * if value = 0, default value is picked, so default value has to be 0!
    * use inverted toggle version if setting needs to be on like in module_view_status ( true = false and false = true )
    */
    $this->type = 'zm-toggleswitch-round'; //return always 0 or true! --> 0 is the default value!
    $this->label = __( 'Use featured image', 'zmplugin' );
    $this->description = __( 'Shows featured image if available.', 'zmplugin' );
    $this->validation = 'bool';

  }

}
