<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_background_pos extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-radiobutton-w-1-3';
    $this->label = __( 'Image Position', 'zmplugin' );
    $this->description = __( 'Choose Background Image Position.', 'zmplugin' );
    $this->validation = 'class';
    $this->choices = array(
      'uk-background-top-left' => '<span class="uk-icon zm-rotate-minus-45" uk-icon="arrow-up"></span>',
      'uk-background-top-center' => '<span class="uk-icon" uk-icon="arrow-up"></span>',
      'uk-background-top-right' => '<span class="uk-icon zm-rotate-plus-45" uk-icon="arrow-up"></span>',
      'uk-background-center-left' => '<span class="uk-icon" uk-icon="arrow-left"></span>',
      'uk-background-center-center' => '<span class="uk-icon">⬤</span>',
      'uk-background-center-right' => '<span class="uk-icon" uk-icon="arrow-right"></span>',
      'uk-background-bottom-left' => '<span class="uk-icon zm-rotate-plus-45" uk-icon="arrow-down"></span>',
      'uk-background-bottom-center' => '<span class="uk-icon" uk-icon="arrow-down"></span>',
      'uk-background-bottom-right' => '<span class="uk-icon zm-rotate-minus-45" uk-icon="arrow-down"></span>',
    );
    //KSES if has html in labels, use kses to escape in CustomizerControlls    
    $this->zm_kses = array(
      'span' => array(
        'class' => array(),
        'uk-icon' => array()
      ),
    );

  }  

}
