<?php

namespace ZMP\Plugin\ThemeSettings;

class ThemeSettings {

    //addThemeSettingsPage to admin menu
    public function addThemeSettingsPage() {

      global $zmplugin;
      //check advanced setting status
      if( isset( $zmplugin['global_constants']->template_editor_status ) !== true ){
        add_action( 'init', array( $this, 'getThemeSettingsPage' ) );
      }

      global $zmtheme;
      if( $zmtheme['theme']->getSettingsStatus() >= 2 ) {
        //check advanced setting status
        if( isset( $zmplugin['global_constants']->design_explorer_status ) !== true ){
          add_action( 'init', array( $this, 'getThemeSettingsPageTemplateBrowser' ) );
        }
      }

    }

    public function getThemeSettingsPageTemplateBrowser() {

      global $zmplugin;

      $desing_explorer = new \ZMP\Plugin\ThemeSettings\DesignExplorer( $zmplugin['global_constants']->design_explorer_api );

      //register action button
      $cleancache = new \ZMP\Plugin\ThemeSettings\AdminButtonDesignExplorerCache( 'zmdesignexplorer_cache_cleaning' );
      $cleancache->setAdminUrl('themes.php?page='.\ZMT\Theme\Helpers::getSlug().'_designs' );
      $cleancache->setAdminNotice(__('Cache cleaned.', 'zmplugin'));
      $cleancache->registerGetParams();

      /**
        * The Theme Settings Menu
        */
        $impexpmenu = new \ZMP\Plugin\AdminMenu( \ZMT\Theme\Helpers::getSlug().'_designs' );
        $impexpmenu->setSubMenuPageParent( 'themes.php' );
        $impexpmenu->setSubMenuPageName( __( 'Design Explorer', 'zmpro' ) );
        $impexpmenu->setPosition( 5 );

        global $zmtheme;

        $template = clone $zmtheme['default_admin_template'];
        $template->setOptPra( \ZMT\Theme\Helpers::getSlug().'_designs' );
        $template->setTitle( __( 'Design Explorer', 'zmpro' ) );
        $template->setDescr('');
        $template->setInfoBoxHTML( '<hr class="uk-margin"><b>'.__('Design Explorer Cache', 'zmplugin').': </b>'.$cleancache->getActionButtonWConfirm( __('Clean', 'zmplugin'), __('Are you sure?', 'zmplugin') ) );

        $impexpmenu->setSubMenuPage( $template->htmlAdminMenuStart() );

          //$impexpmenu->setSubMenuPage('<p>Happy Browsing</p>');
          $impexpmenu->setSubMenuPage( __('Discover all one-click installable designs for your ZMTheme here. The designs can be installed with or without blocks/widgets.', 'zmplugin') );
          $impexpmenu->setSubMenuPage('<div>'.$desing_explorer->getCachedHTML().'</div>');

        $impexpmenu->setSubMenuPage( $template->htmlAdminMenuEnd() );

        $impexpmenu->addSubMenuPage();

    }

  /**
    * Returns Theme Admin Settings Menu
    * @var object
    * @access private
    */
    public function getThemeSettingsPage() {

      global $zmtheme;

      //register action button
      $themerestoreadminbutton = new \ZMP\Plugin\ThemeSettings\AdminButtonRestore( 'zmtheme-restore' );
      $themerestoreadminbutton->setAdminUrl('themes.php?page='.\ZMT\Theme\Helpers::getSlug() );
      $themerestoreadminbutton->setAdminNotice(__('ZMTheme was reset to defaults.', 'zmplugin'));
      $themerestoreadminbutton->registerGetParams();

      //themesettings
      $theme_settings_obj = $zmtheme['default_settings'];

      $infoboxhtml = NULL;
      $infoboxhtml .= '<hr class="uk-margin"><h4 class="uk-margin-remove-top ">'.$theme_settings_obj->defaults->info_box_second_title.'</h4>';
      $infoboxhtml .= '<a href="'.esc_url( admin_url( 'customize.php' ) ).'" class="uk-button uk-width-1-1 uk-button-primary"><span uk-icon="settings" class="uk-icon"></span> '.$theme_settings_obj->defaults->info_box_customize.'</a>';
      $infoboxhtml .= '<hr class="uk-margin"><b>'.__('Theme Config', 'zmplugin').': </b>'.$themerestoreadminbutton->getActionButtonWConfirm( __('Reset to default', 'zmplugin'), __('Are you sure?', 'zmplugin') );

      //add infobox html
      $zmtheme['default_admin_template']->setInfoBoxHTML($infoboxhtml);//optional

      /**
        * The Theme Settings Menu
        */
        $admin_menu = new \ZMP\Plugin\AdminMenu( \ZMT\Theme\Helpers::getSlug() );
        $admin_menu->setSubMenuPageParent( 'themes.php' );
        $admin_menu->setSubMenuPageName( __('Theme Settings','zmplugin') );
        $admin_menu->setPosition( 4 );

      /**
        * Init Form
        */
        $zmform = new \ZMP\Plugin\FormSettings();
        $zmform->setOptionsgroupName( $zmtheme['theme']->getOptGroup() ); //optional präfix for form name and field names, to better organize, avoid duplicates and shorter names in addfield
        $zmform->setAction('options.php');
        $zmform->setMethod('post');
        $zmform->setClass('uk-form-horizontal');
        $zmform->setSettingsFields(1); //necessary hidden security and settings fields for options.php handler

      /**
        * Get Settings-Forms Parts
        */
        $zmform->addField('html',
          $zmtheme['default_admin_template']->htmlSettingsFormAccordionStart(__('General Settings','zmplugin'))
        );

        //General Settings
        $zmform = $this->getThemeSettingsFormGeneralSettings( $zmform );

        if( $zmtheme['theme']->getSettingsStatus() >= 3  && \ZMP\Plugin\PluginHelper::isPremiumVersion() ) {

          $zmform->addField('html',
            $zmtheme['default_admin_template']->htmlSettingsFormAccordionBetween( __('Template Editor','zmplugin') )
          );

          $zmform = $this->getThemeSettingsFormThemeConfig( $zmform );

          //htmlSettingsFormAccordionBetween placed inside foreach loop of components!
          $zmform = $this->getThemeSettingsFormComponentsObjects( $zmform );

        }

        $zmform->addField('html',
          $zmtheme['default_admin_template']->htmlSettingsFormAccordionEnd()
        );

        $zmform = $zmtheme['default_admin_template']->accordionFormSetup($zmform);

      /**
        * Get the Final Form Object and add it to SubMenuPage
        */
        $zmthemefinalform = $zmform->getForm();

        $admin_menu->setSubMenuPage( $zmtheme['default_admin_template']->htmlAdminMenuStart() );
          $admin_menu->setSubMenuPage($zmthemefinalform);
        $admin_menu->setSubMenuPage( $zmtheme['default_admin_template']->htmlAdminMenuEnd() );

        $admin_menu->addSubMenuPage();

    }

  /**
    * Returns Theme Admin Settings Form: General Settings
    * @var object
    * @access private
    */
    public function getThemeSettingsFormGeneralSettings($temp_form_object) {

      global $zmtheme;

      $theme_settings_obj = $zmtheme['default_settings'];

      /**
        * General Settings
        */

        /**
          * Setting: Activate Settings
          * Setters/Getters: ZMTheme
          */
          $temp_form_object->addField(
            $theme_settings_obj->settings_status->type,
              array(
                'label'=>$theme_settings_obj->settings_status->label,
                'outerelement'=>'div',
                'outerclass'=>'uk-card uk-card-body uk-card-small uk-padding-remove-left',
                'innerclass'=>'uk-form-controls',
                'labelclass'=>'uk-form-label uk-margin-remove-top',
                'class'=>'uk-select uk-form-small',
                'description'=>$theme_settings_obj->settings_status->description,
                //'description_toggle'=>$theme_settings_obj->defaults->general_description,
                'validation'=>$theme_settings_obj->settings_status->validation,
                'name'=>$zmtheme['theme']->getSettingsStatusFieldName(),
                'default_value'=>$zmtheme['theme']->getSettingsStatusDefaultValue(),
                'options'=> $theme_settings_obj->settings_status->choices
              )
          );

          if( $zmtheme['theme']->getSettingsStatus() >= 3  ){

          /**
            * Setting: CSS Choice
            * Setters/Getters: ZMTheme
            */
            $temp_form_object->addField(
              'select',
                array(
                  'label'=>'CSS Type',
                  'outerelement'=>'div',
                  'outerclass'=>'uk-card uk-card-body uk-card-small uk-padding-remove-left',
                  'innerclass'=>'uk-form-controls',
                  'labelclass'=>'uk-form-label uk-margin-remove-top',
                  'class'=>'uk-select uk-form-small',
                  'description'=>__('Depending on the color palette in use, different CSS options can be used. If you use only light or dark background colors, the respective option may be chosen to reduce the CSS file size.', 'zmplugin'),
                  //'description_toggle'=>$theme_settings_obj->defaults->general_description,
                  'validation'=>'slug',
                  'name'=>$zmtheme['theme']->getCSSTypeFieldName(),
                  'default_value'=>$zmtheme['theme']->getCSSTypeDefaultValue(),
                  'options'=> array(
                      array('option'=> __( 'Mixed Colors', 'zmplugin' ),'value'=>'default'),
                      array('option'=> __( 'Dark Colors', 'zmplugin' ),'value'=>'dark'),
                      array('option'=> __( 'Light Colors', 'zmplugin' ),'value'=>'light'),
                    )
                )
            );

          }

        return $temp_form_object;

    }

}
