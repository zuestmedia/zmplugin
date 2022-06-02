<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _background_image extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->type = 'media';
    $this->mime_type = 'image';
    /*$this->button_labels = array( // Optional
       'select' => __( 'Select File' ),
       'change' => __( 'Change File' ),
       'default' => __( 'Default' ),
       'remove' => __( 'Remove' ),
       'placeholder' => __( 'No file selected' ),
       'frame_title' => __( 'Select File' ),
       'frame_button' => __( 'Choose File' ),
    );*/
    $this->label = __( 'Background Image', 'zmplugin' );
    $this->description = __( 'Add a custom Image.', 'zmplugin' );
    $this->validation = 'text';

  }

}
