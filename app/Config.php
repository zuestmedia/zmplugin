<?php

namespace ZMP\Plugin;

use ZMP\Plugin\PluginHelper;

class Config {

    function __construct( ){

      /**
      * define global var
      */
      global $zmplugin;

      //preload textdomain TODO: recheck when translation is on wp.org if it works like this!!! --> check action reference (reihenfolge textdomain wird erst nach plugins_loaded geladen!!!)
      PluginHelper::LoadTextDomainbeforeConfigFiles( $zmplugin['plugin_basename'] );

      $zmplugin['default_config'] = new \ZMP\Plugin\Config\config();

      $config = $zmplugin['default_config'];

      //before register extension --> checks license server!!!!
      //add global constants & also in zmpro! --> zmplugin_load_admin_config
      Helpers::setServicesConstants();

    /**
      * Register extension
      */
      PluginHelper::registerExtension( $zmplugin['plugin_basename'] );

      /**
      * create ZMPlugin Object from Basename from global var declared in main plugin file
      */
      $zmplugin['zmplugin'] = new \ZMP\Plugin\Plugin( $zmplugin['plugin_basename'] );

      /**
      * set an alternative Display Name (MainMenuPage)
      */
      $zmplugin['zmplugin']->setDisplayName( $config->pluginname ); //this is autogenerated from slug

      //do a quick version comparison of pluginfile version and config version
      $zmplugin['zmplugin']->setConfigVersion( $config->version );
      $zmplugin['zmplugin']->checkVersion();

      /**
      * Set Admin Pages Assets (for all zmplugin-settings-pages --> ?page=xxx)
      */
      $zmplugin['admin_scripts'] = new \ZMP\Plugin\ScriptsAdmin( $zmplugin['zmplugin']->getPluginUrl(), $config->version );
      $zmplugin['admin_scripts']->setCss('/assets/css/uikit.zmplugin.min.css');
      $zmplugin['admin_scripts']->setCssRtl('/assets/css/uikit.zmplugin-rtl.min.css');
      $zmplugin['admin_scripts']->setCssPropArray(
        array(
          array( 'css_slug' => 'zmp-mods-css' , 'css_url' => '/assets/css/zmplugin.css' )
        )
      );
      $zmplugin['admin_scripts']->setJsPropArray(
        array(
          array( 'js_slug' => 'zmp-js' , 'js_url' => '/assets/js/uikit.min.js', 'js_deps' => array('jquery') ),
          array( 'js_slug' => 'zmp-icons' , 'js_url' => '/assets/js/uikit-icons.min.js', 'js_deps' => array('zmp-js') )
        )
      );
      $zmplugin['admin_scripts']->addAdminAssetstoallAdminPages();//uses global var set from AdminMenu
      $zmplugin['admin_scripts']->addAdminAssetstoCustomizerControls();//adds style n script to controlls in customizer

    }

}
