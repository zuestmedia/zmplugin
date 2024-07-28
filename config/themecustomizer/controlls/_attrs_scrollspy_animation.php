<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _attrs_scrollspy_animation extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Grid Animation', 'zmplugin' );
    $this->validation = 'json';
    $this->choices = array(
      '' =>  __( 'Off', 'zmplugin' ),
      '{"uk-scrollspy":"target: > *; cls: uk-animation-fade; delay: 500"}' =>  __( 'Fade', 'zmplugin' ),
      '{"uk-scrollspy":"target: > *; cls: uk-animation-scale-up; delay: 500"}' =>  __( 'Scale Up', 'zmplugin' ),
      '{"uk-scrollspy":"target: > *; cls: uk-animation-scale-down; delay: 500"}' =>  __( 'Scale Down', 'zmplugin' ),
      '{"uk-scrollspy":"target: > *; cls: uk-animation-slide-top; delay: 500"}' =>  __( 'Slide Top', 'zmplugin'),
      '{"uk-scrollspy":"target: > *; cls: uk-animation-slide-bottom; delay: 500"}' =>  __( 'Slide Bottom', 'zmplugin'),
      '{"uk-scrollspy":"target: > *; cls: uk-animation-slide-left; delay: 500"}' =>  __( 'Slide Left', 'zmplugin'),
      '{"uk-scrollspy":"target: > *; cls: uk-animation-slide-right; delay: 500"}' =>  __( 'Slide Right', 'zmplugin'),
      '{"uk-parallax":"opacity: 0,1; y: -100,0; scale: 2,1; viewport: 0.5; easing: -2;"}' =>  __( 'Parallax Example', 'zmplugin'),
    );

  }

}
