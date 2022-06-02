<?php

namespace ZMP\Plugin\ThemeSettings;

class ThemeImport {

    static function importJsonData($json_data,$partial = false){

      $count_imports = 0;

      //json_decode with true is array output and not std obj!
      $array_content = json_decode($json_data,true);

      //update option theme_mod (different for parent or child theme)
      $theme_mod_slug = get_option( 'stylesheet' );
      if(array_key_exists( 'theme_mods', $array_content )){
        update_option( "theme_mods_$theme_mod_slug", $array_content['theme_mods'] );
        $count_imports++;
      }

      global $zmtheme;
      //theme-slug (same for parent or child theme)
      $optgroup = $zmtheme['theme']->getOptGroup();

      $template_config_key = \ZMT\Theme\Prepare::getTemplateConfigOptionsModNamewithoutOptGroup();
      if(array_key_exists( $template_config_key, $array_content )){
        update_option( $optgroup.$template_config_key, $array_content[$template_config_key] );
        $count_imports++;
      }
      $virtual_com_key = \ZMT\Theme\Prepare::getVirtualComOptionsModNamewithoutOptGroup();
      if(array_key_exists( $virtual_com_key, $array_content )){
        update_option( $optgroup.$virtual_com_key, $array_content[$virtual_com_key] );
        $count_imports++;
      }
      $com_status_key = \ZMT\Theme\Component::getComStatusOptionsModNamewithoutOptGroup();
      if(array_key_exists( $com_status_key, $array_content )){
        update_option( $optgroup.$com_status_key, $array_content[$com_status_key] );
        $count_imports++;
      }
      $com_lock_status_key = \ZMT\Theme\Component::getComLockStatusOptionsModNamewithoutOptGroup();
      if(array_key_exists( $com_lock_status_key, $array_content )){
        update_option( $optgroup.$com_lock_status_key, $array_content[$com_lock_status_key] );
        $count_imports++;
      }
      $com_label_key = \ZMT\Theme\Component::getComLabelOptionsModNamewithoutOptGroup();
      if(array_key_exists( $com_label_key, $array_content )){
        update_option( $optgroup.$com_label_key, $array_content[$com_label_key] );
        $count_imports++;
      }

      //if partial install is true, do not import widget blocks and sidebar widgets
      if($partial == false){

        //overwrites widget_block & positions reset on import
        if(array_key_exists( 'widget_block', $array_content )){
          update_option( 'widget_block', $array_content['widget_block'] );
          $count_imports++;
        }
        if(array_key_exists( 'sidebars_widgets', $array_content )){
          update_option( 'sidebars_widgets', $array_content['sidebars_widgets'] );
          $count_imports++;
        }

      }

      return $count_imports;

    }

}
