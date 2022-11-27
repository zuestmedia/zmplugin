<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class offcanvas_module extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Offcanvas Module', 'zmplugin' );
    $this->description = __( 'Connect this button to a offcanvas or modal module.', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = \ZMP\Plugin\ThemeHelper::getOffcanvasChoices();

  }

}
