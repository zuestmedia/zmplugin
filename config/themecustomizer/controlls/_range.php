<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _range extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-range';//standard range
    $this->validation = 'numeric';//or html if has unit
    $this->description = 'hide';

  }

}
