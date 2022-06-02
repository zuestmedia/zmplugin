<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _wrap extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_textarea {

  protected function default() {

    parent::default();

    //Values
    $this->description = __( 'Add JSON to create wrapping HTML Elements.', 'zmplugin' );
    $this->validation = 'json';

  }

  protected function module() {
    $this->default();
    $this->label = __( 'Module HTML Wrap:', 'zmplugin' );
  }
  protected function moduleinner() {
    $this->default();
    $this->label = __( 'Moduleinner HTML Wrap:', 'zmplugin' );
  }
  protected function grid() {
    $this->default();
    $this->label = __( 'Grid HTML Wrap:', 'zmplugin' );
  }
  protected function content() {
    $this->default();
    $this->label = __( 'Content HTML Wrap:', 'zmplugin' );
  }
  protected function widgettitle() {
    $this->default();
    $this->label = __( 'Legacy Widget Title HTML Wrap:', 'zmplugin' );
  }

}
