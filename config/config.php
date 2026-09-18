<?php

namespace ZMP\Plugin\Config;

class config {

  public $pluginname;
  public $version;

  function __construct(){

    $this->pluginname = __( 'ZMPlugin', 'zmplugin' );

    $this->version = '3.0.0';

  }

}
