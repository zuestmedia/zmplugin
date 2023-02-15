<?php

namespace ZMP\Plugin\Config;

class BuildObject {

  public $config;

  function __construct(){

    $this->config = new \ZMP\Plugin\Config\config();

  }

}
