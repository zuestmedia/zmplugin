<?php

namespace ZMP\Plugin\Config\ThemeSettings;

class BuildObject {

  public $defaults;
  public $settings_status;

  function __construct(){

    $this->defaults = new \ZMP\Plugin\Config\ThemeSettings\defaults();

    $this->settings_status = new \ZMP\Plugin\Config\ThemeSettings\settings_status();

  }

}
