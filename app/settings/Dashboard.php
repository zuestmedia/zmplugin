<?php

namespace ZMP\Plugin\Settings;

class Dashboard {

    private $form;

    function __construct($template){

      global $zmplugin;

      /**
      * ZMPluginForm
      */
      $this->form = new \ZMP\Plugin\FormSettings();
      $this->form->setOptionsgroupName( $zmplugin['zmplugin']->getOptGroup() ); //optional präfix for form name and field names, to better organize, avoid duplicates and shorter names in addfield
      $this->form->setAction('options.php');
      $this->form->setMethod('post');
      $this->form->setClass('uk-form-horizontal');
      $this->form->setSettingsFields(1); //necessary hidden security and settings fields for options.php handler

      $this->form->addField('html',
        $template->htmlSettingsFormAccordionStart(__('Overview','zmplugin'))
      );


        $this->form->addField('html', '<div class="uk-card uk-card-body uk-card-small zmaddonsheader">' );
          $this->form->addField('html', '<div uk-grid class="uk-child-width-expand">' );
            $this->form->addField('html', '<p>'. __('Installed Add-ons', 'zmplugin').'</p>' );
            $this->form->addField('html','<p class="uk-text-right">');
            $this->form->addField('html','<a href="plugins.php?s=zmplugin&plugin_status=all">'.__('Manage', 'zmplugin').'</a>');
            $this->form->addField('html',' | <a href="plugin-install.php?s=zmplugin&tab=search&type=term">'.__('Add new', 'zmplugin').'</a>');
            $this->form->addField('html','</p>');
          $this->form->addField('html','</div>');
        $this->form->addField('html','</div>');


        $this->form->addField('html', \ZMP\Plugin\PluginHelper::getExtCards() );

        $this->form->addField('html', '<div class="uk-text-right zmaddonsfooter">' );
          $this->form->addField('html', '<b>'.sprintf( __('You have used %1$s of %2$s available Slots for Add-ons.', 'zmplugin'), \ZMP\Plugin\PluginHelper::getNrOfExt(), \ZMP\Plugin\PluginHelper::getNrAllowedOfExt() ).'</b>' );
        $this->form->addField('html','</div>');

      $this->form->addField('html',
        $template->htmlSettingsFormAccordionBetween(__('About ZMPlugin','zmplugin'),false)
      );

        $this->form->addField('html','<p>'. __('ZMPlugin offers various website management and configuration settings and extends the customizer functionality for themes based on ZMTheme-Framework.', 'zmplugin'). '</p>' );
/*
      $this->form->addField('html',
        $template->htmlSettingsFormAccordionBetween(__('Available','zmplugin'),false)
      );

        $this->form->addField('html','<p>Get list of add-ons from zuestmedia.com via rest api and then get information from wordpress.org api</p>');


      $this->form->addField('html',
        $template->htmlSettingsFormAccordionBetween(__('Premium','zmplugin'),false)
      );

        $this->form->addField('html','<p>Get list of premium add-ons exclusivly via rest api.</p>');

      $this->form->addField('html',
        $template->htmlSettingsFormAccordionBetween(__('Beta','zmplugin'),false)
      );

        $this->form->addField('html','<p>Get list of beta add-ons from zuestmedia.com via rest api. those add-ons are not yet released on wordpress.org and having instead a connection to own update-server-api.</p>');

      //$this->form->addField( 'html','<button class="zm-theme-save-button uk-button uk-button-primary uk-margin-top" type="submit"><span uk-icon="cog"></span> '.__('Save Changes').'</button>');
*/
      $this->form->addField('html',
        $template->htmlSettingsFormAccordionEnd(false)
      );

      //accordionformtemplate setup (for buttons and success/error messages)
      //!!!must be at the end, when form is created
      $this->form = $template->accordionFormSetup($this->form);

    }

    public function getForm(){

      return $this->form->getForm();

    }

}
