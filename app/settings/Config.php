<?php

namespace ZMP\Plugin\Settings;

class Config {


    function __construct( ){

      global $zmplugin;

      //needs to be loaded here, not in settingsinit! (is_admin only in admin then...)
      $zmplugin['app'] = new \ZMP\Plugin\Settings\AppSettings( $zmplugin['zmplugin']->getOptGroup().'-settings' );

    }

}
