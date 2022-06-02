<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_alphacolor_hex extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-alphacolor';
    $this->label = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'color';
    $this->input_attrs = array(
      'onlyhexcolors' => true,
    );

  }

}
