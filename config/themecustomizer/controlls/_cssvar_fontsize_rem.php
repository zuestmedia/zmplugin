<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_fontsize_rem extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-range-marginremove';
    $this->label = __( 'Font size', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'text';
    $this->input_attrs = array(
      'unit' => 'rem',
      'step' => 0.025,
      'max' => 12,
    );

  }

}
