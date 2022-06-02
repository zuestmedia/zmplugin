<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _text extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'text';
    $this->description = __( 'Change text. <b>Note:</b> Please use translation files if you wish to make your site multilingual.', 'zmplugin' );
    $this->validation = 'sanitize';


  }

  protected function datentime_sprintf() {
    $this->default();
    $this->label = __( 'Date:', 'zmplugin' );
    $this->description = __( 'Use the sprintf() variables %1$s and %2$s to display date and/or time.', 'zmplugin' );
  }
  protected function comment_date_format() {
    $this->default();
    $this->label = __( 'Date Format:', 'zmplugin' );
    $this->description = __( 'Use PHP date function to display date in custom format. Eg. "F j, Y" to get "March 10, 2001".', 'zmplugin' );
  }
  protected function comment_time_format() {
    $this->default();
    $this->label = __( 'Time Format:', 'zmplugin' );
    $this->description = __( 'Use PHP date function to display time in custom format. Eg. "g:i a" to get "5:16 pm".', 'zmplugin' );
  }

}
