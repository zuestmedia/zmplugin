<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class sortable extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {
    //Values
    $this->type = 'zm-sortable-sections';
    $this->label = __( 'Sortable Sections', 'zmplugin' );
    $this->description = __( 'Drag and Drop the items to sort modules or sections.', 'zmplugin' );
    $this->validation = 'int';
    $this->input_attrs = array('template_editor' => __( 'Template Editor', 'zmplugin' ) );

  }

}
