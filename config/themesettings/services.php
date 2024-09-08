<?php

namespace ZMP\Plugin\Config\ThemeSettings;

#[\AllowDynamicProperties]

class services {

  public $design_explorer_api;
  public $design_explorer_free_post_tag_id;
  public $design_explorer_pro_post_tag_id;

  //not in BuildObject!
  function __construct(){

    $this->design_explorer_api      = 'https://design.zuestmedia.com/wp-json/';
    $this->design_explorer_free_post_tag_id = 2;
    $this->design_explorer_pro_post_tag_id  = 3;

  }

}
