<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _attrs extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'text';
    $this->description = __( 'Add custom attributes in simple JSON Format.', 'zmplugin' );
    $this->validation = 'json';

  }

  protected function gridchild() {
    $this->default();
    $this->label = __( 'Grid Child Attributes:', 'zmplugin' );
  }
  protected function section() {
    $this->default();
    $this->label = __( 'Section Attributes:', 'zmplugin' );
  }
  protected function container() {
    $this->default();
    $this->label = __( 'Container Attributes:', 'zmplugin' );
  }
  protected function grid() {
    $this->default();
    $this->label = __( 'Grid Attributes:', 'zmplugin' );
  }
  protected function list() {
    $this->default();
    $this->label = __( 'List Attributes:', 'zmplugin' );
  }

  protected function moduleouter() {
    $this->default();
    $this->label = __( 'Module Outer Attributes:', 'zmplugin' );
  }
  protected function module() {
    $this->default();
    $this->label = __( 'Module Attributes:', 'zmplugin' );
  }
  protected function moduleinner() {
    $this->default();
    $this->label = __( 'Module Inner Attributes:', 'zmplugin' );
  }

}
