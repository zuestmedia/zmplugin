<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_colors {

  function __construct(){

    $this->label = __( 'Global Colors', 'zmplugin' );
    $this->description = __( 'Edit global Color settings here.', 'zmplugin' );

    //one time wp original color controll needs to be loaded!!! it's necessary sonst fehlen scripts n css für eigene color controlls :-)
    //bisher wurde color_border als type="color" geladen um die scripts sicher zu laden... jetzt nicht mehr nach umstellung auf single file objects
    //then its enough to load it via custom-background color theme_support setting

    //first controll is wp custom-background (set in themecustomizer (~670) section change)

    //Background Colors
    $this->color_background_default = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove(10,2);
      $this->color_background_default->label = __( 'Background Default', 'zmplugin' );
      $this->color_background_default->description = __( 'Color & Gradient', 'zmplugin' );
    $this->color_background_gradient_default = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove(10,2);
    $this->color_background_gradient_deg_default = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_deg(10,2);
      $this->color_background_gradient_deg_default->label = __( 'Angle', 'zmplugin' );
    $this->color_background_gradient_colstop_default = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_colstop_marginremove(10,2);
      $this->color_background_gradient_colstop_default->label = __( 'Ratio 1', 'zmplugin' );
    $this->color_background_gradient_colstop2_default = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_colstop(10,2);
      $this->color_background_gradient_colstop2_default->label = __( 'Ratio 2', 'zmplugin' );

    $this->color_background_primary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove(10,2);
      $this->color_background_primary->label = __( 'Background Primary', 'zmplugin' );
      $this->color_background_primary->description = __( 'Color & Gradient', 'zmplugin' );
    $this->color_background_gradient_primary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove(10,2);
    $this->color_background_gradient_deg_primary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_deg(10,2);
      $this->color_background_gradient_deg_primary->label = __( 'Angle', 'zmplugin' );
    $this->color_background_gradient_colstop_primary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_colstop_marginremove(10,2);
      $this->color_background_gradient_colstop_primary->label = __( 'Ratio 1', 'zmplugin' );
    $this->color_background_gradient_colstop2_primary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_colstop(10,2);
      $this->color_background_gradient_colstop2_primary->label = __( 'Ratio 2', 'zmplugin' );

    $this->color_background_secondary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove(10,2);
      $this->color_background_secondary->label = __( 'Background Secondary', 'zmplugin' );
      $this->color_background_secondary->description = __( 'Color & Gradient', 'zmplugin' );
    $this->color_background_gradient_secondary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove(10,2);
    $this->color_background_gradient_deg_secondary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_deg(10,2);
      $this->color_background_gradient_deg_secondary->label = __( 'Angle', 'zmplugin' );
    $this->color_background_gradient_colstop_secondary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_colstop_marginremove(10,2);
      $this->color_background_gradient_colstop_secondary->label = __( 'Ratio 1', 'zmplugin' );
    $this->color_background_gradient_colstop2_secondary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_colstop(10,2);
      $this->color_background_gradient_colstop2_secondary->label = __( 'Ratio 2', 'zmplugin' );

    $this->color_background_muted = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove(10,2);
      $this->color_background_muted->label = __( 'Background Muted', 'zmplugin' );
      $this->color_background_muted->description = __( 'Color & Gradient', 'zmplugin' );
    $this->color_background_gradient_muted = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove(10,2);
    $this->color_background_gradient_deg_muted = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_deg(10,2);
      $this->color_background_gradient_deg_muted->label = __( 'Angle', 'zmplugin' );
    $this->color_background_gradient_colstop_muted = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_colstop_marginremove(10,2);
      $this->color_background_gradient_colstop_muted->label = __( 'Ratio 1', 'zmplugin' );
    $this->color_background_gradient_colstop2_muted = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_gradient_colstop(10,2);
      $this->color_background_gradient_colstop2_muted->label = __( 'Ratio 2', 'zmplugin' );

    $this->background_skewy_default = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_background_skewy(10,4);
      $this->background_skewy_default->input_attrs['heading'] = __( 'Background Skew-Y', 'zmplugin' );
      $this->background_skewy_default->label = __( 'Default', 'zmplugin' );
    $this->background_skewy_primary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_background_skewy(10,4);
      $this->background_skewy_primary->label = __( 'Primary', 'zmplugin' );
    $this->background_skewy_secondary = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_background_skewy(10,4);
      $this->background_skewy_secondary->type = 'zm-range';
      $this->background_skewy_secondary->label = __( 'Secondary', 'zmplugin' );

    //Text Colors
    $this->color_text_default = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,2);
      $this->color_text_default->label = __( 'Global Text Colors', 'zmplugin' );
      $this->color_text_default->description = __( 'Default', 'zmplugin' );
    $this->color_text_emphasis = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,2);
      $this->color_text_emphasis->description = __( 'Emphasis', 'zmplugin' );
    $this->color_text_muted = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,2);
      $this->color_text_muted->description = __( 'Muted', 'zmplugin' );
    $this->color_text_inverse = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_hex(10,2);
      $this->color_text_inverse->description = __( 'Inverse', 'zmplugin' );

    //Link Colors
    $this->color_text_link = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,3);
      $this->color_text_link->label = __( 'Global Link Colors', 'zmplugin' );
      $this->color_text_link->description = __( 'Default', 'zmplugin' );
    $this->color_text_link_hover = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_hex(10,3);
      $this->color_text_link_hover->description = __( 'Hover', 'zmplugin' );

    //Border Colors
    $this->color_border = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_hex(10,3);
      $this->color_border->label = __( 'Global Border Color', 'zmplugin' );
      $this->color_border->description = __( 'Default', 'zmplugin' );

    //Success, Warning, Danger
    $this->color_background_success = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,3);
      $this->color_background_success->label = __( 'Global Alert Colors', 'zmplugin' );
      $this->color_background_success->description = __( 'Success', 'zmplugin' );
    $this->color_background_warning = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_marginremove_hex(10,3);
      $this->color_background_warning->description = __( 'Warning', 'zmplugin' );
    $this->color_background_danger = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_alphacolor_hex(10,3);
      $this->color_background_danger->description = __( 'Danger', 'zmplugin' );

  }

}
