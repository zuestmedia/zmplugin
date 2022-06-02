<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class template_part extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Template:', 'zmplugin' );
    $this->description = __( 'You can choose custom static templates here, if there are files in template-parts folder. Checkout the example! <b>Note:</b> Be aware that static templates do not support all settings in customizer as the sortable function eg.', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = \ZMT\Theme\Helpers::getTemplatePartsChoices( __( 'Default Behavior'  , 'zmplugin' ));

  }

}
