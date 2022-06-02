<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_alphacolor_marginremove extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-alphacolor-marginremove';
    $this->label = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'color';

  }

}
