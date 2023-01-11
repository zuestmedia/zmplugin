<?php

namespace ZMP\Plugin\ThemeSettings;

class AdminButtonRestore extends \ZMP\Plugin\AdminButton {

  public function Action() {

    global $zmtheme;

    remove_theme_mods();

    delete_option( $zmtheme['theme']->getSettingsStatusFieldName() );

    delete_option( $zmtheme['theme']->getOptGroup().\ZMT\Theme\Prepare::getTemplateConfigOptionsModNamewithoutOptGroup() );
    delete_option( $zmtheme['theme']->getOptGroup().\ZMT\Theme\Prepare::getVirtualComOptionsModNamewithoutOptGroup() );
    delete_option( $zmtheme['theme']->getOptGroup().\ZMT\Theme\Prepare::getCleaningThemeModsOptionsModNamewithoutOptGroup() );

    delete_option( $zmtheme['theme']->getOptGroup().\ZMT\Theme\Component::getComStatusOptionsModNamewithoutOptGroup() );
    delete_option( $zmtheme['theme']->getOptGroup().\ZMT\Theme\Component::getComLockStatusOptionsModNamewithoutOptGroup() );
    delete_option( $zmtheme['theme']->getOptGroup().\ZMT\Theme\Component::getComLabelOptionsModNamewithoutOptGroup() );

    delete_option( $zmtheme['theme']->getOptGroup().'_css_type' );

    delete_option( $zmtheme['theme']->getOptGroup().'_imp_json' );
    delete_option( $zmtheme['theme']->getOptGroup().'_temp_sub_form_location' );

  }

}
