<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_commentspagination {

  function __construct(){

    //Values
    $this->label = __( 'Comments Pagination', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

    //$this->list_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json();
    //$this->prev_text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\prev_text();
    //$this->next_text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\next_text();
    //$this->show_all = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\show_all(10,3);
    //$this->prev_next = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\prev_next(10,3);

  }

}
