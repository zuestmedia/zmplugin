<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _attrs_sticky extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Sticky', 'zmplugin' );
    $this->validation = 'json';
    $this->choices = array(
      '' =>  __( 'Off', 'zmplugin' ),
      '{"uk-sticky":""}' =>  __( 'Sticky at top', 'zmplugin' ),
      '{"uk-sticky":"end: true"}' =>  __( 'Sticky until parent container ends', 'zmplugin'),
      '{"uk-sticky":"animation: uk-animation-slide-top"}' =>  __( 'Sticky slide top', 'zmplugin'),
      '{"uk-sticky":"show-on-up: true;animation: uk-animation-slide-top;"}' =>  __( 'Sticky show on scroll up', 'zmplugin'),
      '{"uk-sticky":"show-on-up: true;animation: uk-animation-slide-top;cls-active: uk-active uk-box-shadow-small"}' =>  __( 'Sticky show on scroll up w box-shadow', 'zmplugin'),
      '{"uk-sticky":"animation: uk-animation-slide-top; cls-active: uk-navbar-sticky; start: 200"}' =>  __( 'Sticky slide top', 'zmplugin'),
      '{"uk-sticky":"animation: uk-animation-slide-top; cls-active: uk-active uk-box-shadow-small; start: 200"}' =>  __( 'Sticky slide top w box-shadow', 'zmplugin'),
      '{"uk-sticky":"animation: uk-animation-slide-top; cls-active: uk-section-default uk-navbar-sticky; cls-inactive: uk-section-transparent; start: 200"}' =>  __( 'Sticky changecolor default', 'zmplugin'),
      '{"uk-sticky":"animation: uk-animation-slide-top; cls-active: uk-section-primary uk-preserve-color uk-light uk-navbar-sticky; cls-inactive: uk-section-transparent; start: 200"}' =>  __( 'Sticky changecolor primary', 'zmplugin'),
      '{"uk-sticky":"animation: uk-animation-slide-top; cls-active: uk-section-secondary uk-preserve-color uk-light uk-navbar-sticky; cls-inactive: uk-section-transparent; start: 200"}' =>  __( 'Sticky changecolor secondary', 'zmplugin'),
      '{"uk-sticky":"animation: uk-animation-slide-top; cls-active: uk-section-muted uk-navbar-sticky; cls-inactive: uk-section-transparent; start: 200"}' =>  __( 'Sticky changecolor muted', 'zmplugin'),
      '{"uk-sticky":"animation: uk-animation-slide-top; cls-active: uk-section-transparent uk-navbar-sticky; cls-inactive: uk-section-transparent; start: 200"}' =>  __( 'Stickychangecolor transparent', 'zmplugin'),
    );

  }

}
