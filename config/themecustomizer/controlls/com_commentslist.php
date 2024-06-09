<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_commentslist {

  function __construct(){

    //Values
    $this->label = __( 'Comments List', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

    //$this->list_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json();
    //$this->title_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title_wrap();
    //$this->comment_container_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\comment_container_class();
    //$this->comment_body_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\comment_body_class();
    //$this->avatar_size = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\avatar_size();

    //missing:
    //$this->title = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title();
    //$this->header_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\header_class();
    //$this->header_grid = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\header_grid();
    //$this->image_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\image_class();
    //$this->meta_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\meta_class();
    //$this->meta_subnav_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\meta_subnav_class();
    //$this->author_link_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\author_link_wrap();
    //$this->zm_comment_datentime_sprintf = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\zm_comment_datentime_sprintf();
    //$this->zm_comment_date_format = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\zm_comment_date_format();
    //$this->zm_comment_time_format = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\zm_comment_time_format();
    //$this->zm_moderation_note_1 = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\zm_moderation_note_1();
    //$this->zm_moderation_note_2 = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\zm_moderation_note_2();
    //$this->zm_edit = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\zm_edit();

  }

}
