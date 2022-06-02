<?php

namespace ZMP\Plugin;

class App {

  //this is a base file --> use class xxx extends App!!!!

  /**
    * Präfix for getting values from optiontable
    * praefix_ + nameofsettingfield
    * @var string
    * @access private
    */
    private $optpra;

  /**
    * Options Präfix Getters n Setters
    */
    public function setOptPra($optpra) {

      $this->optpra = $optpra;

    }
    public function getOptPra() {

      return $this->optpra;

    }

  /**
    * Construct Function
    * Slug is required
    */
    function __construct( $optpra ){

      $this->setOptPra($optpra);

    }



}
