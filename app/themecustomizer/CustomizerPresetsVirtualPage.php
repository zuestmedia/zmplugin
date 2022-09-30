<?php

namespace ZMP\Plugin\ThemeCustomizer;


/**
 * presets
 * from id to presets
 * eg. ?virtualjsonobj=presetsdynamicobj&com_id=nav__navcontainer&preset_id=navcontainer__primary
 * component: nav__navcontainer / choice primary
 * preset: navcontainer --> primary
 */
class CustomizerPresetsVirtualPage extends \ZMP\Plugin\VirtualPage {

    //can be deactivated when virtualpage is only accessed by customizer
  /*  function __construct( ){

      global $zmtheme;

      $zmtheme['default_presets'] = ZMThemePresets();

    }*/

    public function addRewriteRule() {

      parent::addRewriteRule();

      global $wp;

      $wp->add_query_var('com_id');
      $wp->add_query_var('preset_id');

    }

    public function VirtualSiteContent( $template ){

      if( $this->getQueryVar() && $this->getQueryVarValue() ) {

        $defcomsjsonobj = get_query_var( $this->getQueryVar() );

        if ( ! empty( $defcomsjsonobj ) ) {

          if (  $this->getQueryVarValue() === $defcomsjsonobj ) {

            header( $this->getHtmlHeader() );

            global $zmtheme;

            $com_id = get_query_var('com_id');
            $preset_id = get_query_var('preset_id');

            $com_array = array();
            $preset_array = array();

            $com_sidebar_array = array();
            $preset_sidebar_array = array();

            if ( $com_id ) {

                $component_type = substr($com_id, 0, strpos($com_id, '__'));

                $component_name = substr($com_id, strpos($com_id, '__') + 2);

                $components = $zmtheme['default_components'];

                $com_array = $components->$component_type->$component_name->args;

                if(property_exists($components->$component_type->$component_name,'sidebar')){
                  $com_sidebar_array = $components->$component_type->$component_name->sidebar;
                }

            }

            if ( $preset_id != 'default' && $preset_id != 'reset_to_default' ) {

                $presets_type = substr($preset_id, 0, strpos($preset_id, '__'));

                $presets_name = substr($preset_id, strpos($preset_id, '__') + 2);

                $presets = $zmtheme['default_presets'];

                $preset_array = $presets->$presets_type->$presets_name->args;

                if(property_exists($presets->$presets_type->$presets_name,'sidebar')){
                  $preset_sidebar_array = $presets->$presets_type->$presets_name->sidebar;
                }

            }

            $result = array_merge( $com_array, $preset_array );

            $sidebar_result = array_merge( $com_sidebar_array, $preset_sidebar_array );
            $result['args_sidebar'] = $sidebar_result;

            //reset_to_default is resulting in default value!
            if ( $preset_id != 'default' && $preset_id != 'reset_to_default' ) {

              unset($result['presets']);

              //unset user settings like taxonomy, posttype, template usw...
              unset($result['meta_key']);
              unset($result['custom_section_content']);
              unset($result['taxonomy']);
              unset($result['query_args_json']);
              unset($result['offcanvas_module']);
              unset($result['posts_templates_object']);
              unset($result['block_template']);

            }

            unset($result['item_position']);
            unset($result['parent_container']);

            //return merged array. presets overrides default com values
            echo json_encode( $result );

            die();

          }

        }

      }

      return $template;

    }


}
