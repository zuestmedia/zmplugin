<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_navbar {

  function __construct(){

    //Values
    $this->label = __( 'Global Navbar', 'zmplugin' );
    $this->description = __( 'Edit Navbar Settings.', 'zmplugin' );

    $this->navbar_fontfamily = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_family(10,2);
    $this->navbar_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_px(10,2);
    $this->navbar_fontweight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_weight(10,2);
    $this->navbar_fontstyle = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontstyle(10,2);
    $this->navbar_letterspacing = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_letter_spacing(10,2);

    $this->navbar_height = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_height(10,2);
      $this->navbar_height->input_attrs['heading'] = __( 'Navbar Dimensions', 'zmplugin' );
    $this->navbar_padding = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_padding(10,2);

    $this->navbar_dropdown_background = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,2);
      $this->navbar_dropdown_background->label = __( 'Dropdown Colors', 'zmplugin' );
      $this->navbar_dropdown_background->description = __( 'Background', 'zmplugin' );

  }

}
