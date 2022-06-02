<?php

namespace ZMP\Plugin\Settings;

class Settings {

    private $form;

    function __construct($template){

      global $zmplugin;

      $settings_obj = new \ZMP\Plugin\Config\appsettings();

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
          $template->htmlSettingsFormAccordionStart(__('Website Settings','zmplugin'))
        );

        $this->form->addField(
          'select',
            array(
              'label'=> __('Private Mode', 'zmplugin'),
              'description_toggle'=> __( 'When you activate the private mode, all non-logged-in site visitors will be redirected to login-page or to a custom redirect url.', 'zmplugin' ),
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
          $template->htmlSettingsFormAccordionBetween(__('Login Page','zmplugin'))
        );

          $this->form->addField('html','<p>Settings are comming soon...</p>');

        $this->form->addField('html',
          $template->htmlSettingsFormAccordionBetween(__('WP Dashboard','zmplugin'))
        );

          $this->form->addField('html','<p>Settings are comming soon...</p>');

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
