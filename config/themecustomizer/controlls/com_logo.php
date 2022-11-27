<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_logo {

  function __construct(){

    $this->label = __( 'Global Logo', 'zmplugin' );
    $this->description = __( 'Edit Logo Settings.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets(4,2);
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'logo', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    //logo font
    $this->logo_fontfamily = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_family(10,2);
    $this->logo_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_px(10,2);
    $this->logo_text_transform = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_text_transform(10,2);
    $this->logo_fontweight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_weight(10,2);
    $this->logo_fontstyle = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontstyle(10,2);
    $this->logo_letterspacing = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_letter_spacing(10,2);

  }

}
