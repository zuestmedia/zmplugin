<?php

namespace ZMP\Plugin;

class FormSettings extends Form {

  public function showNotifictionAlert($attributes_array_or_name) {

    $html = NULL;

    //print out error message from \ZMP\Plugin\Validations created and added to array before..
    //test array --> $this->expandTempForm(print_r($errorobject, true));
    if( is_array($attributes_array_or_name)){

      if( array_key_exists('error',$attributes_array_or_name)){

        foreach ($attributes_array_or_name['error'] as $key => $value) {

          if($value['type'] == 'success') {

            $html .= '<script>UIkit.notification({message: \'<div class="uk-card uk-card-body uk-card-small uk-text-center"><div uk-icon="icon:check;ratio:2.5"></div><div>'.esc_html($value['message']).'</div></div>\', pos: \'bottom-center\', status: \'success\', timeout: \'3000\'})</script>';

          }

          if($value['type'] == 'error') {

            //only show notification box if has general input field (hidden or not) ONCE! shows up for success and fails jeweils einmal
            if( array_key_exists('name',$attributes_array_or_name) && $attributes_array_or_name['name'] == 'general' ){

              $html .= '<script>UIkit.notification({message: \'<div class="uk-card uk-card-body uk-card-small uk-text-center"><div uk-icon="icon:bolt;ratio:2.5"></div><div>'.__('There have been errors! Please check your input again.','zmplugin').'</div></div>\', pos: \'bottom-center\', status: \'danger\', timeout: \'3000\'})</script>';

            } else {

              //this message is shown directly below input fields according to field
              $html .= '<div class="uk-alert-danger" uk-alert>';
                $html .= '<a class="uk-alert-close" uk-close></a>';
                $html .= '<p>'.esc_html($value['message']).'</p>';
              $html .= '</div>';

            }



          }

          //to test array
          //$html .= print_r($attributes_array_or_name['error'], true);

        }

      }

    }

    return $html;

  }

  private $validation_objects_arr = array();
/**
  * Options Präfix Getters n Setters
  */
  public function addValidationObjecttoarray($key,$obj) {

    $this->validation_objects_arr[ $key ] = $obj;

  }
  public function getValidationObjectArray() {

    return $this->validation_objects_arr;

  }
  public function getValidationObject($key) {

    return $this->validation_objects_arr[ $key ];

  }


  public function getOptionModValidation($option_mod_name, $validation_type = 'sanitizearray'){

    if( ! array_key_exists( $option_mod_name, $this->getValidationObjectArray() ) ){

      $old_value = \ZMP\Plugin\Helpers::getOption($option_mod_name,NULL,99);

      $validation = new Validation();
      $validation->setErrorHandler('WPSettingsErrors');//before it was options with s!!!!
      $validation->setOldValue($old_value);
      $validation->setInputName($option_mod_name);
      $validation->setOptionMod(true);//so gets only the value of the desired option_mod

      $args = array();
      $args['sanitize_callback'] = array( $validation, $validation_type );

      register_setting( $this->getOptionsgroupName(), $option_mod_name, $args );

      $this->addValidationObjecttoarray($option_mod_name,$validation);

    }

    return $this->getValidationObject($option_mod_name);

  }

/**
  * Prepare Values and add_option and register_setting
  * add sanitize and validation
  * Formhandler:
  *  - option
  *  - option_mod
  */
  public function prepareField(
    $fieldtype,
    $attributes_array_or_name,
    $type = 'option',
    $option_mod = NULL,
    $validation_type = 'sanitizearray'
  ) {

    if( $fieldtype == 'html') {
      return $attributes_array_or_name;
    }

    if($this->getOptionsgroupName()) {

      if($type == 'option') {

        //special case file upload...
        //if file upload needs to be used create a child class
        //see in zmpro themesettings
        if( method_exists($this,'prepareCustomHandling') ){

          if( is_array($attributes_array_or_name) ) {

            if(array_key_exists('type',$attributes_array_or_name)) {

              if( $attributes_array_or_name['type'] == 'file' || $attributes_array_or_name['type'] == 'custom' ) {

                $attributes_array_or_name = $this->prepareCustomHandling( $attributes_array_or_name );

                return $attributes_array_or_name;

              }

            }

          }

        }

        $validation = NULL;
        if( is_array($attributes_array_or_name) ) {

          if(array_key_exists('name',$attributes_array_or_name)) {

            $name = $attributes_array_or_name['name'];

            //set here default value for input
            $default_value = false;
            if(array_key_exists('default_value',$attributes_array_or_name)){
              $default_value = $attributes_array_or_name['default_value'];
            }

            $validation = new Validation();
            $validation->setErrorHandler('WPSettingsErrors');

            if($name != 'general'){//general field is dummy for success and error notification

              //optionsvalue
              $attributes_array_or_name['value'] = Helpers::getOption(
                $name,
                $default_value,
                99
              );

              //keep old value in db if validation error instead of empty return
              $validation->setOldValue( $attributes_array_or_name['value'] );

            }
            //add input name to validation object
            $validation->setInputName($name);

            //empty $args array
            $args = array();

            if($fieldtype == 'checkbox') {
              //default multiple input sanitizing
              $args['sanitize_callback'] = array($validation,'sanitizearray');
            } else {
              //default single input sanitizing
              $args['sanitize_callback'] = array($validation,'sanitize');
            }

            //check for custom set validation functions in $attributes_array_or_name
            if(array_key_exists('validation',$attributes_array_or_name)){
              $args['sanitize_callback'] = array($validation,$attributes_array_or_name['validation']);
            }

            //add arg default values if there is one defined in $attributes_array_or_name
            $args['default'] = '';
            if($default_value){
              $args['default'] = $default_value;
            }

            if($name != 'general'){//general field is dummy for success and error notification

              //if validation fails, default_value will be shown if is set in addField!
              register_setting( $this->getOptionsgroupName(), $name, $args );
            }

          }

        } else {

          $name = $attributes_array_or_name;

          $attributes_array_or_name = array();
          $attributes_array_or_name['name'] = $name;

          //optionsvalue
          $attributes_array_or_name['value'] = Helpers::getOption(
            $name,
            NULL,
            99
          );

          $validation = new Validation();
          $validation->setErrorHandler('WPSettingsErrors');

          //keep old value in db if validation error instead of empty return
          $validation->setOldValue( $attributes_array_or_name['value'] );

          //add input name to validation object
          $validation->setInputName($name);

          //default args, because cant be set in this case
          $args = array();
          $args['sanitize_callback'] = array($validation,'sanitize');
          $args['default'] = '';

          //register field
          register_setting( $this->getOptionsgroupName(), $name, $args );

        }

        //kann hier stehen und nur als array hinzugefügt werde, weil single string addField nie validation failen kann --> nur trim und htmlspecialchars
        if ( is_object($validation) && !empty($validation->getWPSettingsErrors()) ) {

          $errorobject = $validation->getWPSettingsErrors();
          $attributes_array_or_name['error'] = $errorobject;

        }


      } elseif ($type == 'option_mod') {

        if( $option_mod ) {

          //create option_mod name with opt-group in front
          $option_mod = $this->getOptionsgroupName().$option_mod;

          $name = NULL;
          $value = NULL;
          if( is_array($attributes_array_or_name) ) {

            if(array_key_exists('name',$attributes_array_or_name)) {

              $name = $attributes_array_or_name['name'];

              $default_value = NULL;
              //set here default value for input
              if(array_key_exists('default_value',$attributes_array_or_name)){
                $default_value = $attributes_array_or_name['default_value'];
              }

              //if optionsvalue add to array if not add default_value to array if exists
              $attributes_array_or_name['value'] = Helpers::getOption(
                $name,
                $default_value,
                99,
                'option_mod',
                $option_mod
              );

            }

          } else { // if $attributes_array_or_name is not array

            $name = $attributes_array_or_name;
            //now there are two values! create array!
            $attributes_array_or_name = array();

            //check if has already option value
            $value = Helpers::getOption(
              $name,
              NULL,
              99,
              'option_mod',
              $option_mod
            );

          }

          if($name){

            //validation-->errorobject
            $opt_mod_validation = $this->getOptionModValidation($option_mod, $validation_type);
            if (!empty($opt_mod_validation->getWPSettingsErrors($name))) {
              $newerrorobject = $opt_mod_validation->getWPSettingsErrors($name);
              $attributes_array_or_name['error'] = $newerrorobject;
            }

            //create new name for option_mod input fields
            $attributes_array_or_name['name'] = $option_mod.'['.$name.']';
          }
          if($value){
            //create new name for option_mod input fields
            $attributes_array_or_name['value'] = $value;
          }

        }  else { $this->expandTempForm('<p><strong>Error:</strong> Option_mod error</p>'); }

      } else { $this->expandTempForm('<p><strong>Error:</strong> This Formhandler does not exist yet!</p>'); }

    } else { $this->expandTempForm('<p><strong>Error:</strong> Set either setNAme or setOptionsgroupName to use options handler..</p>'); }

    return $attributes_array_or_name;

  }

}
