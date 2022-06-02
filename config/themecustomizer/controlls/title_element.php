<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class title_element extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Title Tag:', 'zmplugin' );
    $this->description = __( 'Choose HTML Tag.', 'zmplugin' );
    $this->validation = 'text';
    $this->choices = array(
      'h1' => __( 'Heading 1', 'zmplugin' ),
      'h2' => __( 'Heading 2', 'zmplugin' ),
      'h3' => __( 'Heading 3', 'zmplugin' ),
      'h4' => __( 'Heading 4', 'zmplugin' ),
      'h5' => __( 'Heading 5', 'zmplugin' ),
      'h6' => __( 'Heading 6', 'zmplugin' ),
      'p' => __( 'Paragraph', 'zmplugin' ),
      'div' => __( 'Div', 'zmplugin' ),
      'span' => __( 'Span', 'zmplugin' ),
    );

  }

}
