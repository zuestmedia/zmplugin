<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_menu {

  function __construct(){

    $this->label = __( 'Menu', 'zmplugin' );
    $this->description = __( 'Edit Menu.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets();
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'menu', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //$this->menu_container_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\menu_container_class();
    //$this->menu_ul_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\menu_ul_class();

    //missing:
    // menu_items_wrap
    // menu_walker on/off & walkersettings: menu_walker_wrap_first usw.

  }

}
