<?php

namespace ZMP\Plugin;

class Init {

    function __construct( ){

      do_action( 'zmplugin_load_admin_config' );

      $this->initPlugin();
      $this->initPluginSettings();

      do_action( 'zmplugin_load_zmpro' );

      do_action( 'zmplugin_loaded' );

    }

    public function initPlugin(){

      if (class_exists ('\ZMP\Plugin\Config')) {

        new \ZMP\Plugin\Config();

      }

      if (class_exists ('\ZMP\Plugin\Settings\Config')) {

        new \ZMP\Plugin\Settings\Config();

      }

    }

    public function initPluginSettings(){
      add_action('zmplugin_loaded', array( $this, 'PluginSettingsStart' ));
    }

    public function PluginSettingsStart(){

      if(is_admin()) {

        if (class_exists ('\ZMP\Plugin\Settings\SettingsInit')) {

          new \ZMP\Plugin\Settings\SettingsInit();

        }

      }


    }



}
