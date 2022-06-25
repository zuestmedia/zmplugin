<?php

namespace ZMP\Plugin\Config;

class config {

  function __construct(){

    $this->pluginname = __( 'ZMPlugin', 'zmplugin' );

    $this->version = '0.9.1';
    $this->version_notice = __( 'Warning: Versions of ZMPlugin are not consistent!', 'zmplugin' );

  }

}
