<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'text';
    $this->description = __( 'Add a class.', 'zmplugin' );
    $this->validation = 'class';

  }

  protected function disabled() {
    $this->default();
    //$this->label = 'hide';
    $this->description = __( 'Core Class', 'zmplugin' );
    $this->input_attrs = array('disabled' => 'disabled');
  }
  protected function gridchild() {
    $this->default();
    $this->label = __( 'Grid Child Class:', 'zmplugin' );
  }
  protected function section() {
    $this->default();
    $this->label = __( 'Section Class:', 'zmplugin' );
  }
  protected function container() {
    $this->default();
    $this->label = __( 'Container Class:', 'zmplugin' );
  }
  protected function grid() {
    $this->default();
    $this->label = __( 'Grid Class:', 'zmplugin' );
  }

  protected function moduleouter() {
    $this->default();
    $this->label = __( 'Module Outer Class:', 'zmplugin' );
  }
  protected function module() {
    $this->default();
    $this->label = __( 'Module Class:', 'zmplugin' );
  }
  protected function moduleinner() {
    $this->default();
    $this->label = __( 'Module Inner Class:', 'zmplugin' );
  }

  protected function widget() {
    $this->default();
    $this->label = __( 'Block Class:', 'zmplugin' );
  }

  protected function widgetinner() {
    $this->default();
    $this->label = __( 'Block Inner Class:', 'zmplugin' );
  }


  protected function header_class() {
    $this->default();
    $this->label = __( 'Header Class:', 'zmplugin' );
  }
  protected function meta_class() {
    $this->default();
    $this->label = __( 'Meta Class:', 'zmplugin' );
  }
  protected function meta_subnav_class() {
    $this->default();
    $this->label = __( 'Meta Nav Class:', 'zmplugin' );
  }
  protected function avatar_class() {
    $this->default();
    $this->label = __( 'Avatar Class:', 'zmplugin' );
  }

}
