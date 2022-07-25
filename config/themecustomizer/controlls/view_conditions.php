<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class view_conditions extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //SPECIAL CASE in THEMECUSTOMIZER.php
    //creates foreach choice one controll

    //$this->type = 'zm-toggleswitch-small-round';
    $this->type = 'zm-multicheckbox';

    //$this->label = NULL;
    $this->description = 'hide';

    //$this->validation = 'bool';
    $this->validation = 'classarray';

    //$this->transport = 'refresh';
    /*$this->choices = array(
      'frontpage' =>  __( 'FrontPage', 'zmplugin' ),
      'blogpage' =>  __( 'BlogPage', 'zmplugin' ),
      'page' =>  __( 'Pages', 'zmplugin' ),
      'single' =>  __( 'Single Post', 'zmplugin' ),
      'archive' =>  __( 'ArchivePage', 'zmplugin' ),
      'searchpage' =>  __( 'SearchPage', 'zmplugin' ),
      'errorpage' =>  __( 'ErrorPage', 'zmplugin' ),
    );*/

    $this->choices = \ZMT\Theme\Helpers::getViewConditionsChoices();

  }

}
