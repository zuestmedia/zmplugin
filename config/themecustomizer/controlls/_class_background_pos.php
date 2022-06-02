<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_background_pos extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-radiobutton-w-1-3';
    $this->label = __( 'Image Position', 'zmplugin' );
    $this->description = __( 'Choose Background Image Position.', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      //'uk-background-top-left' => __('Top Left', 'zmplugin' ),
      'uk-background-top-left' => '<span class="uk-icon" uk-icon="arrow-up" style="transform: rotate(-45deg);"></span>',
      //'uk-background-top-center' => __('Top Center', 'zmplugin' ),
      'uk-background-top-center' => '<span class="uk-icon" uk-icon="arrow-up"></span>',
      //'uk-background-top-right' => __('Top Right', 'zmplugin' ),
      'uk-background-top-right' => '<span class="uk-icon" uk-icon="arrow-up" style="transform: rotate(45deg);"></span>',
      //'uk-background-center-left' => __('Center Left', 'zmplugin' ),
      'uk-background-center-left' => '<span class="uk-icon" uk-icon="arrow-left"></span>',
      //'uk-background-center-center' => __('Center Center', 'zmplugin' ),
      'uk-background-center-center' => '<span class="uk-icon">⬤</span>',
      //'uk-background-center-right' => __('Center Right', 'zmplugin' ),
      'uk-background-center-right' => '<span class="uk-icon" uk-icon="arrow-right"></span>',
      //'uk-background-bottom-left' => __('Bottom Left', 'zmplugin' ),
      'uk-background-bottom-left' => '<span class="uk-icon" uk-icon="arrow-down" style="transform: rotate(45deg);"></span>',
      //'uk-background-bottom-center' => __('Bottom Center', 'zmplugin' ),
      'uk-background-bottom-center' => '<span class="uk-icon" uk-icon="arrow-down"></span>',
      //'uk-background-bottom-right' => __('Bottom Right', 'zmplugin' )
      'uk-background-bottom-right' => '<span class="uk-icon" uk-icon="arrow-down" style="transform: rotate(-45deg);"></span>',
    );

  }

}
