<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_body {

  function __construct(){

    $this->label = __( 'Global Body', 'zmplugin' );
    $this->description = __( 'Edit Body Settings.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets(4,2);
    $this->presets->choices = \ZMT\Theme\Helpers::getPresetChoices( 'body', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    $this->body_font_family = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_family(10,2);
    $this->body_default_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_px(10,2);
      $this->body_default_fontsize->description = __( 'The Default Body Font Size is the base-size of all other Fonts (1rem is equal to "Global Body Font Size").', 'zmplugin' );
    $this->body_default_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,2);
      $this->body_default_lineheight->type = 'zm-range-marginremove';
    $this->body_font_weight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_weight(10,2);
    $this->body_letter_spacing = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_letter_spacing(10,2);

    $this->text_lead_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
    $this->text_lead_fontsize->input_attrs['heading'] = __( 'Text Lead', 'zmplugin' );
    $this->text_lead_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->text_large_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->text_large_fontsize->input_attrs['heading'] = __( 'Text Large', 'zmplugin' );
    $this->text_large_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->article_meta_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->article_meta_fontsize->input_attrs['heading'] = __( 'Article Meta', 'zmplugin' );
    $this->article_meta_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->text_meta_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->text_meta_fontsize->input_attrs['heading'] = __( 'Text Meta', 'zmplugin' );
    $this->text_meta_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->text_small_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->text_small_fontsize->input_attrs['heading'] = __( 'Text Small', 'zmplugin' );
    $this->text_small_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

  }

}
