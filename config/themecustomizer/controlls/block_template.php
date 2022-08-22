<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class block_template extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Select Block Template', 'zmplugin' );
    $this->validation = 'slug';
    $this->choices = \ZMT\Theme\Helpers::getTemplateBlockChoices();

  }

}
