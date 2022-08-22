<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_logo {

  function __construct(){

    $this->label = __( 'Global Logo', 'zmplugin' );
    $this->description = __( 'Edit Logo Settings.', 'zmplugin' );

    //logo font
    $this->logo_fontfamily = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_family(10,2);
    $this->logo_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_px(10,2);
    $this->logo_fontweight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_weight(10,2);
    $this->logo_fontstyle = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontstyle(10,2);
    $this->logo_letterspacing = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_letter_spacing(10,2);

    //Logo colors
    $this->logo_color = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,2);
      $this->logo_color->label = __( 'Global Logo Colors', 'zmplugin' );
      $this->logo_color->description = __( 'Color on Light Background', 'zmplugin' );
    $this->logo_color_hover = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,2);
      $this->logo_color_hover->description = __( 'Hover color on Light Background', 'zmplugin' );
    $this->logo_color_inverse = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,2);
      $this->logo_color_inverse->description = __( 'Color on Dark Background', 'zmplugin' );
    $this->logo_color_inverse_hover = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_hex(10,2);
      $this->logo_color_inverse_hover->description = __( 'Hover Color on Dark Background', 'zmplugin' );

  }

}
