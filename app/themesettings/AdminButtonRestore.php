<?php

namespace ZMP\Plugin\ThemeSettings;

class AdminButtonRestore extends \ZMP\Plugin\AdminButton {

  public function Action() {

    \ZMT\Theme\Helpers::deleteThemeOptions( \ZMT\Theme\Helpers::getSlug() );

  }

}
