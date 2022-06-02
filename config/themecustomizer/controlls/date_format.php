<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class date_format extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Date Format:', 'zmplugin' );
    $this->description = __( 'Use PHP date function to display date and/or time in custom format. Eg. "F j, Y, g:i a" to get "March 10, 2001, 5:16 pm".', 'zmplugin' );

  }

}
