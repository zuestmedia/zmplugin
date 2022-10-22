<?php

namespace ZMP\Plugin\ThemeSettings;

class Config {

    function __construct( ){

      $zmrestroute = new \ZMP\Plugin\ThemeSettings\RestRouteDesignData();
      $zmrestroute->setNamespace('zmp/v1');
      $zmrestroute->setRoute('/designdata/(?P<pid>\d+)');
      $zmrestroute->addRestRoute();

      $zmblocktemplates = new \ZMP\Plugin\ThemeSettings\BlockTemplates();

    }

}
