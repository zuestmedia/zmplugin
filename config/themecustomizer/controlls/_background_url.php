<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _background_url extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Image URL:', 'zmplugin' );
    $this->description = __( 'Set an external URL.', 'zmplugin' );

    $this->active_callback_item_functionname = 'CallbackAlt2';//Alt2 = active_callback_value_alt_2 of background_status

    $this->validation = 'url';

  }

}
