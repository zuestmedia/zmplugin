<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class query_args_json extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json {

  protected function default() {

    parent::default();

    //Values
    //$this->description = __( 'Add here your custom WP_Query in JSON Format. The simplest way is to use an online WP_Query Generator.', 'zmplugin' );
    //$this->validation = 'json';
    $this->active_callback_item = 'custom_section_content';
    $this->active_callback_item_functionname = 'CallbackAlt1';

  }

}
