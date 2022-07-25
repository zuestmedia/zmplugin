<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _attrs_navbar extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Navbar', 'zmplugin' );
    $this->validation = 'json';
    $this->choices = array(
      '{"uk-navbar":""}' =>  __( 'Default (Dropdown)', 'zmplugin' ),
      '{"uk-navbar":"dropbar:true;"}' =>  __( 'Dropbar', 'zmplugin'),
      '{"uk-navbar":"mode:click;"}' =>  __( 'Dropdown by click', 'zmplugin'),
      //'{"uk-navbar":"dropbar:true;dropbar-mode:push;"}' =>  __( 'Drop (Mode Push)', 'zmplugin'),
    );

  }

}
