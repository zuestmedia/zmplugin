<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _textarea extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'textarea';
    $this->description = __( 'Add custom text.', 'zmplugin' );
    $this->validation = 'sanitize';
    $this->input_attrs = array('class' => 'uk-textarea');

  }

  protected function moderation_note_1() {
    $this->default();
    $this->label = __( 'Moderation Note 1:', 'zmplugin' );
  }
  protected function moderation_note_2() {
    $this->default();
    $this->label = __( 'Moderation Note 2:', 'zmplugin' );
  }

}
