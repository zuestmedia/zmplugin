<?php

namespace ZMP\Plugin\Config;

class appsettings {

  public $nonadmin_redirect_choices;
  public $show_hide;
  public $no_yes;
  public $tls_ssl;

  function __construct(){

    $this->nonadmin_redirect_choices = array(
        array('option'=> __( 'Inactive', 'zmplugin' ),'value'=>false),
        array('option'=> __( 'Active', 'zmplugin' ),'value'=>true),
      );

    $this->show_hide = array(
        array('option'=> __( 'Show', 'zmplugin' ),'value'=>false),
        array('option'=> __( 'Hide', 'zmplugin' ),'value'=>true),
      );

    $this->no_yes = array(
        array('option'=> __( 'No', 'zmplugin' ),'value'=>false),
        array('option'=> __( 'Yes', 'zmplugin' ),'value'=>true),
      );

    $this->tls_ssl = array(
        array('option'=> 'TLS','value'=>'tls'),
        array('option'=> 'SSL','value'=>'ssl'),
      );

  }

}
