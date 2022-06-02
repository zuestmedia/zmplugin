<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _element extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->description = __( 'Choose Tag.', 'zmplugin' );
    $this->validation = 'text';
    $this->choices = array(
      'div' => __( 'div', 'zmplugin' ),
      'span' => __( 'span', 'zmplugin' ),
      'p' => __( 'p', 'zmplugin' ),
      'ul' => __( 'ul', 'zmplugin' ),
      'li' => __( 'li', 'zmplugin' ),
      'section' => __( 'section', 'zmplugin' ),
      'header' => __( 'header', 'zmplugin' ),
      'footer' => __( 'footer', 'zmplugin' ),
      'article' => __( 'article', 'zmplugin' ),
      'nav' => __( 'nav', 'zmplugin' ),
      '' => __( 'Not in use', 'zmplugin' ),
    );

  }

  //modSection
  protected function gridchild() {
    $this->default();
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Gridchild Element:', 'zmplugin' );
  }
  protected function section() {
    $this->default();
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Section Element:', 'zmplugin' );
  }
  protected function container() {
    $this->default();
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Container Element:', 'zmplugin' );
  }
  protected function grid() {
    $this->default();
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Grid Element:', 'zmplugin' );
  }

  //Modules
  protected function moduleouter() {
    $this->default();
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Module Outer Container Tag:', 'zmplugin' );
  }
  protected function module() {
    $this->default();
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Module Container Tag:', 'zmplugin' );
  }
  protected function moduleinner() {
    $this->default();
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Module Inner Container Tag:', 'zmplugin' );
  }

  //modSidebar, Widget
  protected function widget() {
    $this->default();
    $this->label = __( 'Block Container Element:', 'zmplugin' );
    //special setting, needs always an element, no hide or empty possible via register_sidebar
    $this->choices = array(
      'div' => __( 'div', 'zmplugin' ),
      'li' => __( 'li', 'zmplugin' ),
      'section' => __( 'section', 'zmplugin' ),
      'header' => __( 'header', 'zmplugin' ),
      'footer' => __( 'footer', 'zmplugin' ),
      'nav' => __( 'nav', 'zmplugin' ),
    );
  }
  protected function widgetinner() {
    $this->default();
    $this->label = __( 'Block Inner Container Tag:', 'zmplugin' );
  }

  protected function menutitle() {
    $this->default();
    $this->active_callback_master = 1;
    $this->transport = 'refresh';//sonst geht active callback nicht...
    $this->label = __( 'Menu Title:', 'zmplugin' );
    $this->description = __( 'Choose heading element or hide menu title.', 'zmplugin' );
    $this->choices = array(
      '' => __( 'Hide Title', 'zmplugin' ),
      'h1' => __( 'Heading 1', 'zmplugin' ),
      'h2' => __( 'Heading 2', 'zmplugin' ),
      'h3' => __( 'Heading 3', 'zmplugin' ),
      'h4' => __( 'Heading 4', 'zmplugin' ),
      'h5' => __( 'Heading 5', 'zmplugin' ),
      'h6' => __( 'Heading 6', 'zmplugin' ),
      'div' => __( 'Div', 'zmplugin' )
    );
  }

}
