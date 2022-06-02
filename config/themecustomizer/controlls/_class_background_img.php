<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_background_img extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-radiobackgroundsize';
    $this->label = __( 'Background Image Style', 'zmplugin' );
    $this->description = __( 'Define Background Image Style Settings.', 'zmplugin' );
    $this->validation = 'class';
    /*$this->choices = array(
      'uk-background-cover' =>  __( 'Cover', 'zmplugin' ),
      'uk-background-contain' =>  __( 'Contain', 'zmplugin' ),
      '' =>  __( 'None', 'zmplugin' )
    );*/
    $this->choices = array(
      'uk-background-cover' =>  '<div class="uk-position-center uk-overflow-hidden uk-text-muted" style="top:67%;left:49%;"><i uk-icon="ratio:3.6;icon:image;"></i></div>',
      'uk-background-contain' =>  '<div class="uk-position-center uk-overflow-hidden uk-text-muted" ><i uk-icon="ratio:2.6;icon:image;"></i></div>',
      '' =>  '<div class="uk-position-center uk-overflow-hidden uk-text-muted" style="top:31%;left:22%;"><i uk-icon="ratio:1.6;icon:image;"></i></div>'
    );

  }

}
