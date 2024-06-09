<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_articlelinks {

  function __construct(){

    //Values
    $this->label = __( 'Last / Next Articlelinks', 'zmplugin' );

    //$this->last_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\last_wrap();
    //$this->next_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\next_wrap();
    //$this->excluded_terms = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\excluded_terms();
    //$this->in_same_term = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\in_same_term();         //callbackmaster?! not yet...
    //$this->taxonomy = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\taxonomy();                //only working if in_same_term is true!!

  }

}
