<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _class_grid_mods extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    $this->type = 'zm-multicheckbox';
    $this->label = __( 'Grid Modifier:', 'zmplugin' );
    $this->description = __( 'Modify the style of this grid.', 'zmplugin' );
    $this->validation = 'classarray';
    $this->choices = array(
      'uk-grid-small' => __( 'Gap: Small', 'zmplugin' ),
      'uk-grid-medium' => __( 'Gap: Medium', 'zmplugin' ),
      'uk-grid-large' => __( 'Gap: Large', 'zmplugin' ),
      'uk-grid-collapse' => __( 'Gap: Collapse', 'zmplugin' ),
      'uk-grid-divider' => __( 'Divider', 'zmplugin' ),
      'uk-grid-match' => __( 'Match Height', 'zmplugin' ),
      'uk-flex-top' => __( 'Vertical Align: Top', 'zmplugin' ),
      'uk-flex-middle' => __( 'Vertical Align: Middle', 'zmplugin' ),
      'uk-flex-bottom' => __( 'Vertical Align: Bottom', 'zmplugin' ),
      'uk-flex-stretch' => __( 'Vertical Align: Stretch', 'zmplugin' ),
      'uk-flex-left' => __( 'Horizontal Align: Left', 'zmplugin' ),
      'uk-flex-center' => __( 'Horizontal Align: Center', 'zmplugin' ),
      'uk-flex-right' => __( 'Horizontal Align: Right', 'zmplugin' ),
      'uk-flex-between' => __( 'Horizontal Align: Between', 'zmplugin' ),
      'uk-flex-around' => __( 'Horizontal Align: Around', 'zmplugin' ),
    );

  }

}
