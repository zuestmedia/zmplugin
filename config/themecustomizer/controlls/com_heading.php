<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_heading {

  function __construct(){

    $this->label = __( 'Global Heading', 'zmplugin' );
    $this->description = __( 'Edit Heading Settings.', 'zmplugin' );

    $this->presets = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets(4,2);
    $this->presets->choices = \ZMP\Plugin\ThemeHelper::getPresetChoices( 'heading', __('⬤ Default', 'zmplugin'), __('↺ Reset to Default', 'zmplugin')  );

    $this->heading_font_family = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_family(10,2);
    $this->heading_text_transform = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_text_transform(10,2);
    $this->heading_font_weight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_font_weight(10,2);
    $this->heading_letter_spacing = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_letter_spacing(10,2);

    $this->article_title_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->article_title_fontsize->input_attrs['heading'] = __( 'Article Title', 'zmplugin' );
    $this->article_title_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->card_title_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->card_title_fontsize->input_attrs['heading'] = __( 'Card Title', 'zmplugin' );
    $this->card_title_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->h1_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->h1_fontsize->input_attrs['heading'] = __( 'H1', 'zmplugin' );
    $this->h1_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->h2_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->h2_fontsize->input_attrs['heading'] = __( 'H2', 'zmplugin' );
    $this->h2_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->h3_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->h3_fontsize->input_attrs['heading'] = __( 'H3', 'zmplugin' );
    $this->h3_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->h4_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->h4_fontsize->input_attrs['heading'] = __( 'H4', 'zmplugin' );
    $this->h4_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->h5_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->h5_fontsize->input_attrs['heading'] = __( 'H5', 'zmplugin' );
    $this->h5_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->h6_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->h6_fontsize->input_attrs['heading'] = __( 'H6', 'zmplugin' );
    $this->h6_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->heading_2xlarge_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->heading_2xlarge_fontsize->input_attrs['heading'] = __( 'Heading 2xLarge', 'zmplugin' );
    $this->heading_2xlarge_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->heading_xlarge_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->heading_xlarge_fontsize->input_attrs['heading'] = __( 'Heading xLarge', 'zmplugin' );
    $this->heading_xlarge_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->heading_large_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->heading_large_fontsize->input_attrs['heading'] = __( 'Heading Large', 'zmplugin' );
    $this->heading_large_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->heading_medium_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->heading_medium_fontsize->input_attrs['heading'] = __( 'Heading Medium', 'zmplugin' );
    $this->heading_medium_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

    $this->heading_small_fontsize = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_fontsize_rem(10,3);
      $this->heading_small_fontsize->input_attrs['heading'] = __( 'Heading Small', 'zmplugin' );
    $this->heading_small_lineheight = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_cssvar_lineheight(10,3);

  }

}
