<?php

namespace ZMP\Plugin\Config\ThemeSettings;

class settings_status {

  public $type;
  public $label;
  public $description;
  public $validation;
  public $choices;

  function __construct(){

    //Theme Mode
    $this->type = 'select';
    $this->label = __( 'Operating Mode', 'zmplugin' );
    $this->description = __( 'In default configuration mode, all ZMTheme settings saved with the Customizer and the Template Editor are ignored (not deleted).', 'zmplugin' );
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
