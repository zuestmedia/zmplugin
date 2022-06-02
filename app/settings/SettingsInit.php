<?php

namespace ZMP\Plugin\Settings;

class SettingsInit {

    private $admin_menu;

    function __construct( ){

      global $zmplugin;

      $this->admin_menu = new \ZMP\Plugin\AdminMenu( $zmplugin['zmplugin']->getSlug() );
      $this->admin_menu->setSubMenuPageParent( $zmplugin['zmplugin']->getSlug() );
      $this->admin_menu->setMenuPageName($zmplugin['zmplugin']->getDisplayName());
      $this->admin_menu->addMenuPage();
      $this->admin_menu->setPosition( 70 );
      $this->admin_menu->setSubMenuPageName( __('Dashboard', 'zmplugin') );

      $zmplugin['default_settings'] = new \ZMP\Plugin\Config\settings();
      $default_settings = $zmplugin['default_settings'];

      //default admin menu template frame
      $zmplugin['default_admin_template'] = new \ZMP\Plugin\SettingsTemplate();
        $zmplugin['default_admin_template']->setOptPra( $zmplugin['zmplugin']->getSlug() );
        $zmplugin['default_admin_template']->setDisplayName( $zmplugin['zmplugin']->getDisplayName() );
        $zmplugin['default_admin_template']->setTitle( __('Dashboard', 'zmplugin') );
        $zmplugin['default_admin_template']->setDescr('The ZMPlugin Dashboard displays installed, available and beta Addons.');
        $zmplugin['default_admin_template']->setInfoBoxTitle( $default_settings->info_box_title );
        $zmplugin['default_admin_template']->setInfoBoxLinks( $default_settings->info_box_links );
        /*$zmplugin['default_admin_template']->setInfoBoxHTML(\ZMP\Plugin\PluginHelper::getRequiredPluginsTable(
          $zmplugin['zmplugin']->getRequiredPluginsNVersions(),
          $zmplugin['zmplugin']->getSlug()
        ));//optional */
        $zmplugin['default_admin_template']->setVersionTextWrap( $default_settings->version_text_wrap );
        $zmplugin['default_admin_template']->setVersion( $zmplugin['zmplugin']->getConfigVersion() );

      //HTML
      //start container
      $this->admin_menu->setSubMenuPage( $zmplugin['default_admin_template']->htmlAdminMenuStart() );
        $settingsform = new \ZMP\Plugin\Settings\Dashboard($zmplugin['default_admin_template']);
        $this->admin_menu->setSubMenuPage( $settingsform->getForm() );
      $this->admin_menu->setSubMenuPage( $zmplugin['default_admin_template']->htmlAdminMenuEnd() );
      //end container

      $this->admin_menu->addSubMenuPage();


      //installed add-ons menu
      $this->admin_menu2 = new \ZMP\Plugin\AdminMenu( $zmplugin['zmplugin']->getSlug().'-settings' );//slug is = optgroup of form!
      $this->admin_menu2->setSubMenuPageParent( $zmplugin['zmplugin']->getSlug() );
      $this->admin_menu2->setSubMenuPageName( __('Settings', 'zmplugin') );

      $template = clone $zmplugin['default_admin_template'];
      $template->setOptPra( $zmplugin['zmplugin']->getSlug().'-settings' );
      $template->setTitle( __('Settings', 'zmplugin') );
      $template->setDescr( __('ZMPlugin contains a set of helper functions and options to customize your website and manage some WordPress core features. Furthermore it\'s the base of all ZMPlugin-Addons and adds ZMTheme settings and customizer controlls.','zmplugin') );

      $this->admin_menu2->setSubMenuPage( $template->htmlAdminMenuStart() );
        $settingsform2 = new \ZMP\Plugin\Settings\Settings($template);
        $this->admin_menu2->setSubMenuPage( $settingsform2->getForm() );
      $this->admin_menu2->setSubMenuPage( $template->htmlAdminMenuEnd() );
      //end adminpage container

      $this->admin_menu2->addSubMenuPage();


    }

}
