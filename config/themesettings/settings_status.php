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
    $this->label = __( 'Mode', 'zmplugin' );
    $this->description = __( 'In default mode, all theme settings saved with the Customizer and the template editor are ignored (not deleted).', 'zmplugin' );
    
    /*
    //to reactivate restricted settings mode; in ZMPro config/themesettings/Buildobject -> reactivate settings_status
    $this->validation = 'onetwo';
    $this->choices = array(
        array('option'=> __( 'Default configuration (No additional options)', 'zmplugin' ),'value'=>'1'),
        array('option'=> __( 'Simple settings (No HTML or CSS knowledge necessary)', 'zmplugin' ),'value'=>'2'),
      );*/

    $this->validation = 'int';
    $this->choices = array(
      array('option'=> __( 'Default', 'zmplugin' ),'value'=>'1'),
      array('option'=> __( 'Simple', 'zmplugin' ),'value'=>'2'),
      array('option'=> __( 'Professional', 'zmplugin' ),'value'=>'3'),
      array('option'=> __( 'Developer', 'zmplugin' ),'value'=>'4'),
    );

  }

}
