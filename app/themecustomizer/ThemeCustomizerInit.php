<?php

namespace ZMP\Plugin\ThemeCustomizer;

class ThemeCustomizerInit {

    function __construct( ){

      global $zmtheme;
      global $zmplugin;

      add_action( 'wp_enqueue_scripts', function () {
          $js = 'wp.customize.selectiveRefresh.Partial.prototype.createEditShortcutForPlacement = function() {};';
          wp_add_inline_script( 'customize-selective-refresh', $js );
      } );

      //set dynamic virtual presets objects page
      $zmthemepresetsdynamicobj = new \ZMP\Plugin\ThemeCustomizer\CustomizerPresetsVirtualPage();
      $zmthemepresetsdynamicobj->setQueryVar('virtualjsonobj');
      $zmthemepresetsdynamicobj->setQueryVarValue('presetsdynamicobj');
      $zmthemepresetsdynamicobj->setRewriteRule(true);//default--> false
      $zmthemepresetsdynamicobj->addVirtualSite();

      //set virtual json object of components to customizer view page
      $zmthemecomobjtojson = new \ZMP\Plugin\VirtualPage();
      $zmthemecomobjtojson->setQueryVar('virtualjsonobj');
      $zmthemecomobjtojson->setQueryVarValue('default_theme_components');
      $zmthemecomobjtojson->setRewriteRule(true);//default--> false
      //$zmthemecomobjtojson->setHtmlHeader();//default--> json
      $zmthemecomobjtojson->setContent( json_encode( $zmtheme['default_components'] ) );
      $zmthemecomobjtojson->addVirtualSite();

      $zmtheme['theme']->setHeadScript( '<script>var wphomeurl = "'.esc_url( get_home_url() ).'/";</script>' );

      //add & load assets for customizer page --> add to customizer in toolbox!
    /*  $zmthemecustomizerassets = new \ZMP\Plugin\ScriptsProp( $zmplugin['zmplugin']->getPluginUrl(), $zmplugin['zmplugin']->getConfigVersion() );
      $zmthemecustomizerassets->setJsPropArray(
        array(
          array( 'js_slug' => 'zm-customizer-js' , 'js_url' => '/app/themecustomizer/js/customizer.js', 'js_deps' => array('customize-preview') )
        )
      );
      $zmthemecustomizerassets->addPropCustomizerControls();
      $zmthemecustomizerassets->addPropCustomizerPreview();*/

      //controls js & css
      $zmthemecustomizecontrols = new \ZMP\Plugin\ScriptsProp( $zmplugin['zmplugin']->getPluginUrl(), $zmplugin['zmplugin']->getConfigVersion() );
      $zmthemecustomizecontrols->setCssPropArray(
        array(
          array( 'css_slug' => 'zm-customizer-controls-css' , 'css_url' => '/app/themecustomizer/css/customizer-controls.css', 'css_deps' => array('wp-color-picker') )
        )
      );
      $zmthemecustomizecontrols->setJsPropArray(
        array(
          array( 'js_slug' => 'zm-customizer-js' , 'js_url' => '/app/themecustomizer/js/customizer.js', 'js_deps' => array('customize-preview') ),//if dep not set to preview, presets not working!
          array( 'js_slug' => 'zm-customize-controls-js' , 'js_url' => '/app/themecustomizer/js/customize-controls.js',
            'js_deps' => array(
              'zm-customizer-js',
              'jquery',
              'jquery-ui-core',
              'jquery-ui-mouse',
              'jquery-ui-sortable',
              'jquery-touch-punch',
              'customize-controls',
              'customize-base',
              'customize-widgets',
              'wp-dom-ready',
              'heartbeat'
            )
          ),
          array( 'js_slug' => 'zm-customize-control-alphacolor-js' , 'js_url' => '/app/themecustomizer/js/customizer-control-alphacolor.js', 'js_deps' => array('zm-customize-controls-js', 'wp-color-picker') ),
        )
      );
      $zmthemecustomizecontrols->addPropCustomizerControls();

      //preview js
      $zmthemecustomizepreview = new \ZMP\Plugin\ScriptsProp( $zmplugin['zmplugin']->getPluginUrl(), $zmplugin['zmplugin']->getConfigVersion() );
      $zmthemecustomizepreview->setCssPropArray(
        array(
          array( 'css_slug' => 'zm-customizer-css' , 'css_url' => '/app/themecustomizer/css/customizer-preview.css' )
        )
      );
      $zmthemecustomizepreview->setJsPropArray(
        array(
          array( 'js_slug' => 'zm-customizer-js' , 'js_url' => '/app/themecustomizer/js/customizer.js', 'js_deps' => array('customize-preview') ),
          array( 'js_slug' => 'zm-customize-preview-js' , 'js_url' => '/app/themecustomizer/js/customize-preview.js', 'js_deps' => array('zm-customizer-js', 'customize-preview') )
        )
      );
      $zmthemecustomizepreview->addPropCustomizerPreview();


      if( $zmtheme['theme']->getSettingsStatus() >= 3 && \ZMP\Plugin\PluginHelper::isPremiumVersion() ){

        $zmthemecustomizerpremium = new \ZMP\Pro\ThemeCustomizer\ThemeCustomizerInit();

      }


      // Setup the Theme Customizer settings and controls...
      $zmthemecustomizer = new \ZMP\Plugin\ThemeCustomizer\ThemeCustomizer();
      //add customizer to wp-admin
      $zmthemecustomizer->addCustomizer();

    }

}
