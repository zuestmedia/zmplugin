<?php

namespace ZMP\Plugin\Config\ThemeSettings;

class services {

  //not in BuildObject!
  function __construct(){

    $this->design_explorer_api      = 'https://demo.zuestmedia.com/wp-json/';
    $this->design_explorer_free_post_tag_id = 2;//TODO not yet ids from production site!
    $this->design_explorer_pro_post_tag_id  = 3;

  }

}
