<?php

namespace ZMP\Plugin\ThemeCustomizer;

class CustomizerActiveCallbackPanels {

  /**
    * Setting Value
    * @var string
    * @access private
    */
    private $com_type_object_name = NULL;

  /**
    * setSettingValue Getters n Setters
    */
    public function setComTypeObjectName( $com_type_object_name ) {

      $this->com_type_object_name = $com_type_object_name;

    }
    public function getComTypeObjectName() {

      return $this->com_type_object_name;

    }

    public function is_active_com_object(){

      if( $this->getComTypeObjectName() ){

        global $zmtheme;

        if( array_key_exists( 'zmpaneactivecomobject', $zmtheme ) ){

          if( in_array($this->getComTypeObjectName(), $zmtheme['zmpaneactivecomobject']) ){

            return true;

          }

        }

      }

      return false;

    }

}
