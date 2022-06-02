<?php

namespace ZMP\Plugin\Config\ThemeSettings;

class settings_status {

  function __construct(){

    //Theme Mode
    $this->type = 'select';
    $this->label = __( 'Operating Mode', 'zmplugin' );
    $this->description = __( 'In Default Configuration theme mode, all ZMTheme Settings saved with customizer will be omitted (not deleted).', 'zmplugin' );
    $this->validation = 'onetwo';
    /*$this->choices = array(
        array('option'=> __( 'Minimalist (Default configuration)', 'zmplugin' ),'value'=>'1'),
        array('option'=> __( 'Advanced (Customizer settings)', 'zmplugin' ),'value'=>'2'),
      );*/
    $this->choices = array(
        array('option'=> __( 'Default configuration (No additional options)', 'zmplugin' ),'value'=>'1'),
        array('option'=> __( 'Simple settings (No HTML or CSS knowledge necessary)', 'zmplugin' ),'value'=>'2'),
      );

  }

}
