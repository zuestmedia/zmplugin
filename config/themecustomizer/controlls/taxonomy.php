<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class taxonomy extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Select a Taxonomy', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = \ZMP\Plugin\ThemeHelper::getTaxonomiesChoices();

  }

}
