<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_navbar {

  function __construct(){

    //Values
    $this->label = __( 'Global Navbar', 'zmplugin' );
    $this->description = __( 'Edit Navbar Settings.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets(4,2);
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'navbar', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    $this->navbar_fontfamily = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_family(10,2);
    $this->navbar_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_px(10,2);
    $this->navbar_text_transform = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_text_transform(10,2);
    $this->navbar_fontweight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_weight(10,2);
    $this->navbar_fontstyle = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontstyle(10,2);
    $this->navbar_letterspacing = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_letter_spacing(10,2);

    $this->navbar_height = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_height(10,2);
      $this->navbar_height->input_attrs['heading'] = __( 'Navbar Dimensions', 'zmplugin' );
    $this->navbar_padding = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_padding(10,2);

  }

}
