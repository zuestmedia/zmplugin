<?php

namespace ZMP\Plugin\ThemeSettings;

class AdminButtonDesignExplorerCache extends \ZMP\Plugin\AdminButton {

  public function Action() {

    global $zmtheme;

    delete_transient( 'zmdesignexplorer_cache' );

  }

}
