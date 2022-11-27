<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class custom_section_content extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->section_group = 'content';
    //$this->active_callback_master = 1;
    //$this->active_callback_value = 'default';
    //$this->active_callback_value_alt_1 = 'queryloop';
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Select Content', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = \ZMP\Plugin\ThemeHelper::getCustomSectionContentChoices( __('Default Widget', 'zmplugin') );

  }

}
