<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _slug extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'text';
    $this->validation = 'class';

  }
  protected function meta_key() {

    $this->default();

    $this->label = __( 'Meta Key:', 'zmplugin' );

  }

}
