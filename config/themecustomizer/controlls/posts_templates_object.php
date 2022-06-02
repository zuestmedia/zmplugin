<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class posts_templates_object extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'select';
    $this->label = __( 'Template Object', 'zmplugin' );
    $this->description = __( 'Chose Template Object to Render posts.', 'zmplugin' );
    $this->validation = 'class';
    $this->transport = 'refresh';//sonst geht active callback nicht, posts object does not hide / show
    $this->active_callback_item = 'custom_section_content';//only applys in queryloop settings not in articlelist
    $this->active_callback_item_functionname = 'CallbackAlt1';//only applys in queryloop settings not in articlelist
    $this->choices = \ZMT\Theme\Helpers::getPostsTemplateObjectsChoices( __('Posts', 'zmplugin') );

  }

}
