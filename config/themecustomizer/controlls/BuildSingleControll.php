<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class BuildSingleControll {

  function __construct(

    $priority = NULL,
    $access_level = NULL,
    $section_group = NULL,
    $key = 'default',
    $active_callback_item = NULL,
    $label = NULL


  ){

    $this->access_level = 4;//default access_level

  /**
    * section_group
    */
    if($section_group){
      $this->section_group = $section_group;
    } else {
      $this->section_group = 'html';
    }

  /**
    * loads only the specific arguments in child config files
    */
    if($key){
      if(method_exists($this, $key)){
        $this->$key();
      }
    }

  /**
    * active_callback_item
    */
    if($active_callback_item){
      $this->active_callback_item = $active_callback_item;
    }

  /**
    * priority
    */
    if($priority){
      $this->priority = $priority;
    }

  /**
    * access_level
    */
    if($access_level){
      $this->access_level = $access_level;
    }

  /**
    * label
    */
    if($label){
      $this->label = $label;
    }




  }

}
