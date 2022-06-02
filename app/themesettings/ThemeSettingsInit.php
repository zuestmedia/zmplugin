<?php

namespace ZMP\Plugin\ThemeSettings;

class ThemeSettingsInit {

    function __construct( ){

      global $zmplugin;
      global $zmtheme;

    /**
      * default_settings with Namespace and Alt-Namespace(s)
      */
      $ns_def_set = new \ZMT\Theme\Namespaces( '\ZMP\Plugin\Config\ThemeSettings\\', '\ZMP\Pro\Config\ThemeSettings\\' );

      $full_classname_set = $ns_def_set->getClass('BuildObject');

      $zmtheme['default_settings'] = new $full_classname_set();

      //theme-editor
      //add css n js for ajax and creating virtual sections / components
      $zmthemeadminsettingspage = new \ZMP\Plugin\ScriptsAdmin( $zmplugin['zmplugin']->getPluginUrl(), $zmplugin['zmplugin']->getConfigVersion() );
      $zmthemeadminsettingspage->setCssPropArray(
        array(
          array( 'css_slug' => 'zmp-themesettings-css' , 'css_url' => '/app/themesettings/css/themesettings.css' )
        )
      );
      $zmthemeadminsettingspage->setJsPropArray(
        array(
          array( 'js_slug' => 'zmp-themesettings-js' , 'js_url' => '/app/themesettings/js/themesettings.js', 'js_deps' => array('jquery','jquery-ui-core','jquery-ui-mouse','jquery-ui-sortable','jquery-touch-punch') )
        )
      );
      $zmthemeadminsettingspage->setAdminPageSlug( \ZMT\Theme\Helpers::getSlug() );
      $zmthemeadminsettingspage->addAdminAssetstothisAdminPage();

      //design_explorer
      //load and localize script for using ajax w rest api
      $designexplorerscript = new \ZMP\Plugin\ScriptsAdminAjax( $zmplugin['zmplugin']->getPluginUrl(), $zmplugin['zmplugin']->getConfigVersion() );
      $designexplorerscript->setJsPropArray(
        array(
          array( 'js_slug' => 'zmpdesignexplorer' , 'js_url' => '/app/themesettings/js/designexplorer.js', 'js_deps' => array('jquery') )
        )
      );
      $designexplorerscript->setAdminPageSlug( \ZMT\Theme\Helpers::getSlug().'_designs' );
      $designexplorerscript->addAdminAssetstothisAdminPage();


      //template vorlage
      $theme_settings_obj = $zmtheme['default_settings'];
      //default theme admin menu template frame
      $zmtheme['default_admin_template'] = new \ZMP\Plugin\SettingsTemplate();
        $zmtheme['default_admin_template']->setOptPra( \ZMT\Theme\Helpers::getSlug() );
        $zmtheme['default_admin_template']->setDisplayName( $zmtheme['theme']->getDisplayName() );
        $zmtheme['default_admin_template']->setTitle( __('Template Editor', 'zmplugin') );
        $zmtheme['default_admin_template']->setDescr( __('In short, every part of ZMT theme is editable! The longer Version: All ZMT modules can be easily customized via the WP-Customizer. All ZMT themes are completly modular and configurable through the ZMPlugin template editor. The template editor lets you create templates for each posttype, archive, taxonomy you are using. Also you can edit and create custom templates for navigation, offcanvas-containers and more.', 'zmplugin') );
        $zmtheme['default_admin_template']->setInfoBoxTitle( $theme_settings_obj->defaults->info_box_title );
        $zmtheme['default_admin_template']->setInfoBoxLinks( $theme_settings_obj->defaults->info_box_links );
        //$zmtheme['default_admin_template']->setInfoBoxHTML($infoboxhtml);//optional
        $zmtheme['default_admin_template']->setVersionTextWrap( $theme_settings_obj->defaults->version_text_wrap );
        $zmtheme['default_admin_template']->setVersion( \ZMT\Theme\Helpers::getThemeDetails('Version') );


      //load premium css n scripts if zmpro is activated
      if( $zmtheme['theme']->getSettingsStatus() >= 3 && \ZMP\Plugin\PluginHelper::isPremiumVersion() ){

        $zmthemeadminpremium = new \ZMP\Pro\ThemeSettings\ThemeSettingsInit();

      } else {

        /**
        * ThemeSettings: Generate Settings Menu
        */
        $zmthemesettings = new \ZMP\Plugin\ThemeSettings\ThemeSettings();

        //$zmthemesettings->addAjaxHandler();

        $zmthemesettings->addThemeSettingsPage();//mit verzögerung filter init damit zb. get_post_types nicht vor plugin init abgefragt wird

      }

    }

}
