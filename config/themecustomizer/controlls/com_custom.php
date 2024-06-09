<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_custom {

  function __construct(){

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets(4,2);

  }

}
