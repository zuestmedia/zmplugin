<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_image_container_size extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Image Container Size', 'zmplugin' );
    $this->description = __( 'Choose one or several size options for the featured image.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(

      'alignwide' =>  __( 'Width: Wide', 'zmplugin' ),
      'alignfull' =>  __( 'Width: Full', 'zmplugin' ),

      /*'uk-overflow-hidden' =>  __( 'Overflow: Hidden', 'zmplugin' ),
      'uk-overflow-auto' =>  __( 'Overflow: Auto', 'zmplugin' ),*/

      'uk-height-small' =>  __( 'Height: Small (150px)', 'zmplugin' ),
      'uk-height-medium' =>  __( 'Height: Medium (300px)', 'zmplugin' ),
      'uk-height-large' =>  __( 'Height: Small (450px)', 'zmplugin' ),

      'uk-height-max-small' =>  __( 'Max. Height: Small (150px)', 'zmplugin' ),
      'uk-height-max-medium' =>  __( 'Max. Height: Medium (300px)', 'zmplugin' ),
      'uk-height-max-large' =>  __( 'Max. Height: Small (450px)', 'zmplugin' ),

      'uk-flex uk-flex-top' =>  __( 'Vertical Align: Top', 'zmplugin' ),
      'uk-flex uk-flex-middle' =>  __( 'Vertical Align: Middle', 'zmplugin' ),
      'uk-flex uk-flex-bottom' =>  __( 'Vertical Align: Bottom', 'zmplugin' ),

    );

  }

}
