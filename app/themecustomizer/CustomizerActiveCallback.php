<?php

namespace ZMP\Plugin\ThemeCustomizer;

class CustomizerActiveCallback {

  /**
   * Creates a Active Callback for Customizer Controlls
   * eg. to show or hide controll
   * dependent of another setting and value
   */

  /**
    * Element Setting Name
    * @var string
    * @access private
    */
    private $setting_name;

  /**
    * Setting Value
    * @var string
    * @access private
    */
    private $setting_value = NULL;

  /**
    * Alt Setting Value 1
    * @var string
    * @access private
    */
    private $setting_value_alt_1 = NULL;

  /**
    * Alt Setting Value 2
    * @var string
    * @access private
    */
    private $setting_value_alt_2 = NULL;

  /**
    * Construct Function
    */
    function __construct( $setting_name ){

      $this->setting_name = $setting_name;

    }

  /**
    * setSettingName Getters n Setters
    */
    public function setSettingName( $setting_name ) {

      $this->setting_name = $setting_name;

    }
    public function getSettingName() {

      return $this->setting_name;

    }

  /**
    * setSettingValue Getters n Setters
    */
    public function setSettingValue( $setting_value ) {

      $this->setting_value = $setting_value;

    }
    public function getSettingValue() {

      return $this->setting_value;

    }

  /**
    * setSettingValueAlt1 Getters n Setters
    */
    public function setSettingValueAlt1( $setting_value_alt_1 ) {

      $this->setting_value_alt_1 = $setting_value_alt_1;

    }
    public function getSettingValueAlt1() {

      return $this->setting_value_alt_1;

    }

  /**
    * setSettingValueAlt1 Getters n Setters
    */
    public function setSettingValueAlt2( $setting_value_alt_2 ) {

      $this->setting_value_alt_2 = $setting_value_alt_2;

    }
    public function getSettingValueAlt2() {

      return $this->setting_value_alt_2;

    }

    public function ViewStatusCallback( $control ) {

      $setting = $control->manager->get_setting( $this->getSettingName() )->value();

      if ( $setting == $this->getSettingValue() ) {

        return true;

      } else {

        return false;

      }

    }

    //!!!!!!!!!not in use!!!!!!!!!!
    public function ControllGroupCallback( $control ) {

      $setting = $control->manager->get_setting( $this->getSettingName() )->value();

      //check if has value
      if ( $setting ) {

        return true;

      } else {

        return false;

      }

    }

    public function Callback( $control ) {

      $setting = $control->manager->get_setting( $this->getSettingName() )->value();

      if($this->getSettingValue() !== NULL){

        if ( $setting == $this->getSettingValue() ) {

          return true;

        } else {

          return false;

        }

      } else {

      /**
        * Default callback
        * --> check if has value, when no SettingValue is set!
        */
        if ( $setting ) {

          return true;

        } else {

          return false;

        }

      }


    }

    public function CallbackAlt1( $control ) {

      $setting = $control->manager->get_setting( $this->getSettingName() )->value();

      if($this->getSettingValueAlt1() !== NULL){

        if ( $setting == $this->getSettingValueAlt1() ) {

          return true;

        } else {

          return false;

        }

      }

    }

    public function CallbackAlt2( $control ) {

      $setting = $control->manager->get_setting( $this->getSettingName() )->value();

      if($this->getSettingValueAlt2() !== NULL){

        if ( $setting == $this->getSettingValueAlt2() ) {

          return true;

        } else {

          return false;

        }

      }

    }


}
