<?php

namespace ZMP\Plugin\Config\ThemeSettings;

class BuildObject {

  function __construct(){

    $this->defaults = new \ZMP\Plugin\Config\ThemeSettings\defaults();

    $this->settings_status = new \ZMP\Plugin\Config\ThemeSettings\settings_status();

  }

}
