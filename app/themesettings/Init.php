<?php

namespace ZMP\Plugin\ThemeSettings;

class Init {

    function __construct( ){

      $this->initThemeSettings();

    }

    public function initThemeSettings(){

      //app n config needed in frontend to
      if (class_exists('\ZMP\Plugin\ThemeSettings\Config')) {

        new \ZMP\Plugin\ThemeSettings\Config();

      }

      //admin_menu & settings
      if( is_admin() ){

        if (class_exists('\ZMP\Plugin\ThemeSettings\ThemeSettingsInit')) {

          new \ZMP\Plugin\ThemeSettings\ThemeSettingsInit();

        }

      }

    }



}
