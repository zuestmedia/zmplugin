<?php

namespace ZMP\Plugin\Settings;

class AdminButtonBlockPatternsCache extends \ZMP\Plugin\AdminButton {

  public function Action() {

    global $zmtheme;

    delete_transient( 'zm_blockpatterns_data_cache' );
    delete_transient( 'zm_blockpatterns_category_cache' );

  }

}
