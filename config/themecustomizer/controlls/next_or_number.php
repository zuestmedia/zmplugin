<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class next_or_number extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Next or Number:', 'zmplugin' );
    $this->description = __( 'Choose wether to show "last and next page" or "page-numbers".', 'zmplugin' );
    $this->validation = 'lc';
    $this->choices = array(
      'number' =>  __( 'Page-Numbers', 'zmplugin' ),
      'next' =>  __( 'Last-Next-Page', 'zmplugin' )
    );

  }

}
