<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class list_item extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //is not a list_ part --> used in taxonomyterm!

    //Values
    $this->type = 'select';
    $this->label = __( 'List Item:', 'zmplugin' );
    $this->description = __( 'Choose HTML Tag.', 'zmplugin' );
    $this->validation = 'text';
    $this->choices = array(
      'p' => __( 'Paragraph', 'zmplugin' ),
      'li' => __( 'Li', 'zmplugin' ),
      'div' => __( 'Div', 'zmplugin' ),
      'span' => __( 'Span', 'zmplugin' ),
      '' => __( 'None', 'zmplugin' ),
    );

  }

}
