<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_font_family extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Font Family', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'sanitize';
    $this->choices = array(
      '-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji' =>  __( 'Default', 'zmplugin' ),
      '"DejaVu Sans Mono", Menlo, Consolas, "Liberation Mono", Monaco, "Lucida Console", monospace' =>  __( 'DejaVu Sans Mono', 'zmplugin' ),
      'Arial, sans-serif' =>  __( 'Arial', 'zmplugin' ),
      'Arial Black, sans-serif' =>  __( 'Arial Black', 'zmplugin' ),
      'Helvetica, sans-serif' =>  __( 'Helvetica', 'zmplugin' ),
      'Impact, sans-serif' =>  __( 'Impact', 'zmplugin' ),
      'Lucida Sans Unicode, sans-serif' =>  __( 'Lucida Sans Unicode', 'zmplugin' ),
      'Tahoma, sans-serif' =>  __( 'Tahoma', 'zmplugin' ),
      'Trebuchet MS, sans-serif' =>  __( 'Trebuchet MS', 'zmplugin' ),
      'Verdana, sans-serif' =>  __( 'Verdana', 'zmplugin' ),
      'American Typewriter, serif' =>  __( 'American Typewriter', 'zmplugin' ),
      'Didot, serif' =>  __( 'Didot', 'zmplugin' ),
      'Garamond, serif' =>  __( 'Garamond', 'zmplugin' ),
      'Georgia, serif' =>  __( 'Georgia', 'zmplugin' ),
      'Times New Roman, serif' =>  __( 'Times New Roman', 'zmplugin' ),
      'Bradley Hand, cursive' =>  __( 'Bradley Hand', 'zmplugin' ),
      'Brush Script MT, cursive' =>  __( 'Brush Script MT', 'zmplugin' ),
      'Comic Sans MS, cursive' =>  __( 'Comic Sans MS', 'zmplugin' ),
      'Courier, monospace' =>  __( 'Courier Mono', 'zmplugin' ),
      'Courier New, monospace' =>  __( 'Courier New Mono', 'zmplugin' ),
      'Lucida Console, monospace' =>  __( 'Lucida Console Mono', 'zmplugin' ),
      'Monaco, monospace' =>  __( 'Monaco Mono', 'zmplugin' ),
      'Luminari, fantasy' =>  __( 'Luminari', 'zmplugin' ),
    );

  }

}
