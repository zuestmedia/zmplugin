<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_visibility extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Responsive Visibility', 'zmplugin' );
    $this->description = __( 'Show or hide this Element on different devices.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
      'zm-hidden-mobile' => __('Hide on Mobile', 'zmplugin' ).'<i uk-icon="phone" class="uk-align-right uk-margin-remove"></i>',
      'zm-hidden-tablet' => __('Hide on Tablet Portrait', 'zmplugin' ).'<i uk-icon="tablet" class="uk-align-right uk-margin-remove"></i>',
      'zm-hidden-tablet-landscape' => __('Hide on Tablet Landscape', 'zmplugin' ).'<i uk-icon="tablet-landscape" class="uk-align-right uk-margin-remove"></i>',
      'zm-hidden-desktop' => __('Hide on Desktop', 'zmplugin' ).'<i uk-icon="desktop" class="uk-align-right uk-margin-remove"></i>',
    );

  }

}
