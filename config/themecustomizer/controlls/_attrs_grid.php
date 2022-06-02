<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _attrs_grid extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'text';
    $this->label = __( 'Grid Attributes Grid', 'zmplugin' );
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->validation = 'json';
  /*  $this->choices = array(
      '' =>  __( 'Off', 'zmplugin' ),
      '{"uk-grid": ""}' =>  __( 'Default', 'zmplugin' ),
      '{"uk-grid": "masonry:true;"}' =>  __( 'Masonry', 'zmplugin'),
      '{"uk-grid": "parallax: 150"}' =>  __( 'Parallax', 'zmplugin'),
    );*/

  }

}
