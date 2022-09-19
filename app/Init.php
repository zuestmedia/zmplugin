<?php

namespace ZMP\Plugin;

class Init {

    function __construct( ){

      do_action( 'zmplugin_load_admin_config' );

      $this->initPlugin();
      $this->initPluginLoaded();

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

    public function initPluginLoaded(){
      add_action('zmplugin_loaded', array( $this, 'PluginLoadedStart' ));
    }

    public function PluginLoadedStart(){

      //start block patterns
      if (class_exists ('\ZMP\Plugin\Settings\InitBlockPatterns')) {

        new \ZMP\Plugin\Settings\InitBlockPatterns();

      }

      if(is_admin()) {

        //start plugin admin settings
        if (class_exists ('\ZMP\Plugin\Settings\SettingsInit')) {

          new \ZMP\Plugin\Settings\SettingsInit();

        }

      }


    }



}
