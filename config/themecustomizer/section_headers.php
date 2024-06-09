<?php

namespace ZMP\Plugin\Config\ThemeCustomizer;

#[\AllowDynamicProperties]

class section_headers {

  function __construct(){

    $this->settings = new \stdClass();
    $settings = $this->settings;
      $settings->type = 'zm-toggleheader';
      $settings->access_level = 2;
      $settings->label = __( 'Settings', 'zmplugin' );
      $settings->priority = 200;

    $this->module = new \stdClass();
    $module = $this->module;
      $module->type = 'zm-toggleheader';
      $module->access_level = 2;
      $module->label = __( 'Module', 'zmplugin' );
      $module->priority = 400;

    $this->content = new \stdClass();
    $content = $this->content;
      $content->type = 'zm-toggleheader';
      $content->access_level = 2;
      $content->label = __( 'Content', 'zmplugin' );
      $content->priority = 800;

    $this->html = new \stdClass();
    $html = $this->html;
      $html->type = 'zm-toggleheader';
      $html->access_level = 3;
      $html->label = __( 'HTML', 'zmplugin' );
      $html->priority = 4000;

    //lower than 10000 (hidden modules in themecustomizer)
    $this->developer = new \stdClass();
    $developer = $this->developer;
      $developer->type = 'zm-toggleheader';
      $developer->access_level = 4;
      $developer->label = __( 'Developer', 'zmplugin' );
      $developer->priority = 5000;

  }

}
