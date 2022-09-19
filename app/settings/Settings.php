<?php

namespace ZMP\Plugin\Settings;

class Settings {

    private $form;

    function __construct($template){

      global $zmplugin;

      $settings_obj = new \ZMP\Plugin\Config\appsettings();

      //register action button
      $cleancache = new \ZMP\Plugin\Settings\AdminButtonBlockPatternsCache( 'zm_blockpatterns_cache_cleaning' );
      $cleancache->setAdminUrl('admin.php?page='.$zmplugin['zmplugin']->getSlug().'-settings' );
      $cleancache->setAdminNotice(__('Blockpatterns cache cleaned.', 'zmplugin'));
      $cleancache->registerGetParams();

      /**
      * ZMPluginForm
      */
      $this->form = new \ZMP\Plugin\FormSettings();
      $this->form->setOptionsgroupName( $zmplugin['zmplugin']->getOptGroup().'-settings' ); //optional präfix for form name and field names, to better organize, avoid duplicates and shorter names in addfield
      $this->form->setAction('options.php');
      $this->form->setMethod('post');
      $this->form->setClass('uk-form-horizontal');
      $this->form->setOuterClass('uk-card uk-card-body uk-card-small uk-padding-remove-left');
      $this->form->setInnerClass('uk-form-controls');
      $this->form->setSettingsFields(1); //necessary hidden security and settings fields for options.php handler
      //$uikitform->setWpNonce(1);

      $this->form->addField('html','<div>');


        $this->form->addField('html',
          $template->htmlSettingsFormAccordionStart(__('Block Patterns','zmplugin'))
        );

          $this->form->addField('html',
            '<div class="uk-card uk-card-body uk-card-small uk-padding-remove-top uk-padding-remove-left"><label class="uk-form-label">'.__('Clean Block Patterns Cache','zmplugin').' </label><div class="uk-form-controls">'.$cleancache->getActionButton( __('Clean cache', 'zmplugin'), 'uk-button uk-button-primary uk-button-small' ).'</div></div>'
          );




        $this->form->addField('html',
          $template->htmlSettingsFormAccordionBetween(__('Cookie Consent Banner','zmplugin'), false)
        );


          $this->form->addField('html','<p>'.__('Load "Tracking & Analytics" Scripts only after Cookie Consent Banner has been accepted.', 'zmplugin').'</p>');

          $this->form->addField(
            'select',
              array(
                'label'=> __('Status', 'zmplugin'),
                'class'=>'uk-select uk-form-width-large',
                'options'=>$settings_obj->nonadmin_redirect_choices,
                'name'=>$zmplugin['app']->getCookieConsentStatusTextFieldName(),
                'default_value'=>$zmplugin['app']->getCookieConsentStatusDefaultValue()
              ),
              'option_mod',//type
              '_bool',//optionsgroup + "_option_mod_name"
              'boolarray'
          );

          $this->form->addField(
            'textarea',
              array(
                'label'=> __('Text', 'zmp-breadcrumbs'),
                'class'=>'uk-textarea uk-form-width-large',
                'name'=>$zmplugin['app']->getCookieConsentTextTextFieldName(),
                'default_value'=>$zmplugin['app']->getCookieConsentTextDefaultValue()
              ),
              'option_mod',//type
              '_text',//optionsgroup + "_option_mod_name"
              'textarray'
          );

          $this->form->addField(
            'input',
              array(
                'type'=> 'url',
                'label'=> __('Privacy URL', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'https://example.com/privacy/',
                'icon'=>'world',
                'name'=>$zmplugin['app']->getCookieConsentPrivacyUrlTextFieldName(),
                'default_value'=>$zmplugin['app']->getCookieConsentPrivacyUrlDefaultValue()
              ),
              'option_mod',//type
              '_url',//optionsgroup + "_option_mod_name"
              'urlarray'
          );

        $this->form->addField('html',
          $template->htmlSettingsFormAccordionBetween(__('Private Mode','zmplugin'))
        );


          $this->form->addField(
            'select',
              array(
                'label'=> __('Redirect Visitors', 'zmplugin'),
                'description_toggle'=> __( 'When you activate this option, all non-logged-in site visitors will be redirected to login-page or to a custom redirect url.', 'zmplugin' ),
                'class'=>'uk-select uk-form-width-large',
                'options'=>$settings_obj->nonadmin_redirect_choices,
                'name'=>$zmplugin['app']->getNonAdminRedirectFieldName(),
                'default_value'=>$zmplugin['app']->getNonAdminRedirectDefaultValue()
              ),
              'option_mod',//type
              '_bool',//optionsgroup + "_option_mod_name"
              'boolarray'
          );

          if($zmplugin['app']->getNonAdminRedirect()){

            $this->form->addField(
              'input',
                array(
                  'type'=> 'url',
                  'label'=> __('Custom Redirect URL', 'zmplugin'),
                  'description_toggle'=> __('By default visitors will be redirected to wp-login page. Place a custom URL where you want your visitors to land if not on login page. Don\'t forget to exclude this page.', 'zmplugin'),
                  'class'=>'uk-input uk-form-width-large',
                  'placeholder'=>home_url('/wp-login.php'),
                  'icon'=>'world',
                  'name'=>$zmplugin['app']->getNonAdminRedirectTargetFieldName(),
                  'default_value'=>$zmplugin['app']->getNonAdminRedirectTargetDefaultValue()
                ),
                'option_mod',//type
                '_url',//optionsgroup + "_option_mod_name"
                'urlarray'
            );

            $this->form->addField(
              'input',
                array(
                  'type'=> 'text',
                  'label'=> __('Excluded Pages', 'zmplugin'),
                  'description_toggle'=> __('Add a commaseparated list of pages, that will be excluded from private mode. Use page-id\'s or page-slug\'s.', 'zmplugin'),
                  'class'=>'uk-input uk-form-width-large',
                  'placeholder'=>'3,8,49',
                  'name'=>$zmplugin['app']->getNonAdminRedirectExceptionsFieldName(),
                  'default_value'=>$zmplugin['app']->getNonAdminRedirectExceptionsDefaultValue()
                ),
                'option_mod',//type
                '_text',//optionsgroup + "_option_mod_name"
                'textarray'
            );

          }


        $this->form->addField('html',
          $template->htmlSettingsFormAccordionBetween(__('Tracking & Analytics','zmplugin'))
        );

          $this->form->addField('html','<h3>'.__('Matomo', 'zmplugin').'</h3>');
          $this->form->addField('html','<p>'.__('Only works with self-hosted Matomo version.', 'zmplugin').'</p>');

          $this->form->addField(
            'input',
              array(
                'type'=> 'url',
                'label'=> __('Server URL', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'https://example.com/',
                'icon'=>'world',
                'name'=>$zmplugin['app']->getMatomoUrlTextFieldName(),
                'default_value'=>$zmplugin['app']->getMatomoUrlDefaultValue()
              ),
              'option_mod',//type
              '_url',//optionsgroup + "_option_mod_name"
              'urlarray'
          );

          $this->form->addField(
            'input',
              array(
                'type'=> 'number',
                'label'=> __('Site-ID', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'33',
                'name'=>$zmplugin['app']->getMatomoSiteIdTextFieldName(),
                'default_value'=>$zmplugin['app']->getMatomoSiteIdDefaultValue()
              ),
              'option_mod',//type
              '_int',//optionsgroup + "_option_mod_name"
              'intarray'
          );

          $this->form->addField(
            'select',
              array(
                'label'=> __('No Cookie Tracking?', 'zmplugin'),
                'class'=>'uk-select uk-form-width-large',
                'description_toggle'=> __('To load Matomo Analytics GDPR compliant without cookie consent, activate "No Cookie Tracking" on your Server and activate this option. So Matomo Analytics Script will be loaded without cookie consent question.', 'zmplugin'),
                'options'=>$settings_obj->no_yes,
                'name'=>$zmplugin['app']->getMatomoNoCookieTrackingStatusTextFieldName(),
                'default_value'=>$zmplugin['app']->getMatomoNoCookieTrackingStatusDefaultValue()
              ),
              'option_mod',//type
              '_bool',//optionsgroup + "_option_mod_name"
              'boolarray'
          );

          $this->form->addField('html','<h3>'.__('Google Analytics 4', 'zmplugin').'</h3>');

          $this->form->addField(
            'input',
              array(
                'type'=> 'text',
                'label'=> __('Measurement-ID', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'G-XXXXXXXXXX',
                'name'=>$zmplugin['app']->getG4AIdTextFieldName(),
                'default_value'=>$zmplugin['app']->getG4AIdDefaultValue()
              ),
              'option_mod',//type
              '_text',//optionsgroup + "_option_mod_name"
              'textarray'
          );

          $this->form->addField('html','<h3>'.__('Google Tag Manager', 'zmplugin').'</h3>');

          $this->form->addField(
            'input',
              array(
                'type'=> 'text',
                'label'=> __('Container-ID', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'GTM-XXXXXXX',
                'name'=>$zmplugin['app']->getGTMIdTextFieldName(),
                'default_value'=>$zmplugin['app']->getGTMIdDefaultValue()
              ),
              'option_mod',//type
              '_text',//optionsgroup + "_option_mod_name"
              'textarray'
          );

        $this->form->addField('html',
          $template->htmlSettingsFormAccordionBetween(__('WP Dashboard','zmplugin'))
        );


          $this->form->addField(
            'select',
              array(
                'label'=> __('Dashboard Logo', 'zmplugin'),
                'class'=>'uk-select uk-form-width-large',
                'options'=>$settings_obj->show_hide,
                'name'=>$zmplugin['app']->getRemoveDashboardLogoFieldName(),
                'default_value'=>$zmplugin['app']->getRemoveDashboardLogoDefaultValue()
              ),
              'option_mod',//type
              '_bool',//optionsgroup + "_option_mod_name"
              'boolarray'
          );

          $this->form->addField(
            'select',
              array(
                'label'=> __('Help Tabs', 'zmplugin'),
                'class'=>'uk-select uk-form-width-large',
                'options'=>$settings_obj->show_hide,
                'name'=>$zmplugin['app']->getRemoveHelpTabsFieldName(),
                'default_value'=>$zmplugin['app']->getRemoveHelpTabsDefaultValue()
              ),
              'option_mod',//type
              '_bool',//optionsgroup + "_option_mod_name"
              'boolarray'
          );

          $this->form->addField(
            'input',
              array(
                'type'=> 'text',
                'label'=> __('Footer Text', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'Thank you for creating with WordPress.',
                'name'=>$zmplugin['app']->getDashboardFooterTextFieldName(),
                'default_value'=>$zmplugin['app']->getDashboardFooterTextDefaultValue()
              ),
              'option_mod',//type
              '_text',//optionsgroup + "_option_mod_name"
              'textarray'
          );


        $this->form->addField('html',
          $template->htmlSettingsFormAccordionBetween(__('WP Login','zmplugin'))
        );


          $this->form->addField(
            'input',
              array(
                'type'=> 'text',
                'label'=> __('Login Logo Title', 'zmplugin'),
                'description_toggle'=> __('Add a title instead of an image.', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'Your Page Title',
                'name'=>$zmplugin['app']->getLoginLogoTitleFieldName(),
                'default_value'=>$zmplugin['app']->getLoginLogoTitleDefaultValue()
              ),
              'option_mod',//type
              '_text',//optionsgroup + "_option_mod_name"
              'textarray'
          );

          $this->form->addField(
            'input',
              array(
                'type'=> 'url',
                'label'=> __('Login Logo Image-URL', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'https://example.com/image.jpg',
                'icon'=>'world',
                'name'=>$zmplugin['app']->getLoginLogoUrlFieldName(),
                'default_value'=>$zmplugin['app']->getLoginLogoUrlDefaultValue()
              ),
              'option_mod',//type
              '_url',//optionsgroup + "_option_mod_name"
              'urlarray'
          );

          $this->form->addField(
            'input',
              array(
                'type'=> 'url',
                'label'=> __('Login Logo Target-URL', 'zmplugin'),
                'class'=>'uk-input uk-form-width-large',
                'placeholder'=>'https://example.com/target-page',
                'icon'=>'world',
                'name'=>$zmplugin['app']->getLoginLogoTargetFieldName(),
                'default_value'=>$zmplugin['app']->getLoginLogoTargetDefaultValue()
              ),
              'option_mod',//type
              '_url',//optionsgroup + "_option_mod_name"
              'urlarray'
          );

          $this->form->addField(
            'select',
              array(
                'label'=> __('Redirect after Login to Home', 'zmplugin'),
                'class'=>'uk-select uk-form-width-large',
                'options'=>$settings_obj->nonadmin_redirect_choices,
                'name'=>$zmplugin['app']->getLoginRedirectStatusFieldName(),
                'default_value'=>$zmplugin['app']->getLoginRedirectStatusDefaultValue()
              ),
              'option_mod',//type
              '_bool',//optionsgroup + "_option_mod_name"
              'boolarray'
          );


        $this->form->addField('html',
          $template->htmlSettingsFormAccordionEnd()
        );


      $this->form->addField('html','</div>');

      //button for single form without accordion...
      //$this->form->addField( 'html','<button class="zm-theme-save-button uk-button uk-button-primary uk-margin-top" type="submit"><span uk-icon="cog"></span> '.__('Save Changes').'</button>');

      //accordionformtemplate setup (for buttons and success/error messages)
      //!!!must be at the end, when form is created
      $this->form = $template->accordionFormSetup($this->form);

    }

    public function getForm(){

      return $this->form->getForm();

    }

}
