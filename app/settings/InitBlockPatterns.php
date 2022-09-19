<?php

namespace ZMP\Plugin\Settings;

class InitBlockPatterns {

  function __construct( ){

    $this->AppStart();

  }

  public function AppStart(){

    global $zmplugin;

    //block patterns from Api
    new \ZMP\Plugin\Settings\BlockPatternsData( $zmplugin['global_constants']->design_explorer_api );

  }

}
