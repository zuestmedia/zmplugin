<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_image {

  function __construct(){

    //Values
    $this->label = __( 'Featured Image', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'image', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );


    //$this->image_link = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\image_link();
    //$this->image_size = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\image_size();
    //$this->image_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\image_class();
    //$this->caption = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\caption();
    //$this->caption_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\caption_wrap();

  }

}
