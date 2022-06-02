<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _toggle_true_false extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

  /** --> 0 (false) is always the default value! its not possible to set 1 as default value! because it would always return the default value
    * if value = 0, default value is picked, so default value has to be 0!
    * use inverted toggle version if setting needs to be on like in module_view_status ( true = false and false = true )
    */
    $this->type = 'zm-toggleswitch-round';
    $this->description = __( 'Choose true or false.', 'zmplugin' );
    $this->validation = 'bool';

  }

}
