<?php

namespace ZMP\Plugin;

class Helpers {

  /**
    * if vartocheck us this var
    * if no vartocheck uses defvar if available
    * if not vars, return
    * $elpartstr -> use sprintf & %s -> $elpartstr = 'class="%s"'
    */
    static function getAttribute(

  		$vartocheck,
  		$defvarifemtpy = NULL, //optional
  		$elpartstr = '%s' //optional //when class use like $elpartstr = 'class="%s"' | if in opening element, add space before attributes!

  	) {

  		if((!isset($vartocheck) || $vartocheck === '') && !isset($defvarifemtpy)) {

  			return;

  		}

  		if(!isset($vartocheck)) {

  			$vartocheck = $defvarifemtpy;

  		}

  		$result = sprintf($elpartstr,esc_attr($vartocheck));

  		return $result;

  	}

    static function renderAttrs($attrs){

      $html = NULL;

      if(is_array($attrs) && !empty($attrs)){

        foreach($attrs as $key => $value){

          $html .= ' '.esc_attr( $key ).'="'.esc_attr( $value ).'"';

        }

      }

      return $html;

    }

  /**
    * Function get value by key from array or return NULL or default value
    */
    static function getValuebyKeyorDefault($key,$array,$default_value = NULL){

      $result = $default_value;
      if( is_array($array) ) {

        if( array_key_exists($key,$array) ) {

          //defines preset outerelement if has one
          $result = $array[$key];

        }

      }

      return $result;

    }

  /**
    * Process Form Attributes arrays or other HTML Element Atts
    */
    static function processAttributesArray($attributes_array) {

      $result = '';

      if($attributes_array) {

        foreach ($attributes_array as $key => $value) {

          if( $key == 'type' ||
              $key == 'name' ||
              $key == 'id' ||
              $key == 'class' ||
              $key == 'maxlength' ||
              $key == 'placeholder' ||
              $key == 'value' ||
              $key == 'cols' ||
              $key == 'rows' ||
              $key == 'wrap' ||
              $key == 'max' ||
              $key == 'maxlength' ||
              $key == 'min' ||
              $key == 'step' ||
              $key == 'autocomplete' ) {

              $result .= self::getAttribute($value,NULL,' '.$key.'="%s"');

          } elseif ( $key == 'autofocus' ||
                     $key == 'disabled' ||
                     $key == 'selected' ||
                     $key == 'checked' ||
                     $key == 'readonly' ||
                     $key == 'required' ) {

              $result .= self::getAttribute($key,NULL,' %s');

          }

        }

      }

      return $result;

    }

    static function getOption(
      $options_name,
      $default_value = NULL,
      $settings_status = '1',//at least 2 to save options in db!
      $type = 'option',
      $option_mod = NULL,
      $setting_level = '2'
    ){

    /**
      * PreCheck if SettingsStatus is = 2
      * if = 1, only programmatically set values in theme object will be used!
      */
      if( $settings_status >= $setting_level ) {

        if( $type == 'theme_mod' ) {

          if( get_theme_mod( $options_name ) !== false ){

            return get_theme_mod( $options_name );

          }

        } elseif( $type == 'option_mod' ) {

        /**
          * Check first if has optiontable value, if not, use default value defined in class or with setter
          */
          if($option_mod){

            $options = get_option( $option_mod );

            if( $options  !== false && is_array( $options ) ) {

              if( array_key_exists( $options_name, $options ) ) {

                return $options[ $options_name ];

              }

            }

          }

        } elseif( $type == 'option' ) {

        /**
          * Check first if has optiontable value, if not, use default value defined in class or with setter
          */
          if( get_option( $options_name )  !== false ) {

            return get_option( $options_name );

          } else {

            //add default value to options-table so its not quering for not existing entries
            add_option( $options_name , $default_value );

          }

        } elseif( $type == 'blog_option' ) {

        /**
          * get_main_site_id or get_main_network_id have same result...
          */
          if(is_multisite()){

            if( get_blog_option( get_main_site_id(), $options_name )  !== false ) {

              return get_blog_option( get_main_site_id(), $options_name );

            } else {

              //add default value to options-table so its not quering for not existing entries
              add_blog_option( get_main_site_id(), $options_name , $default_value );

            }

          } else {

            //if not multisite return normal option
            return Helpers::getOption(
              $options_name,
              $default_value,
              $settings_status
            );

          }

        }

      }

      return $default_value;

    }

    static function setOptionMod(
      $options_name,
      $value,
      $option_mod
    ) {

      $options = get_option( $option_mod );

      if( $options  !== false && is_array( $options ) ) {

        $options[ $options_name ] = $value;

      } else {

        $options = array();
        $options[ $options_name ] = $value;

      }

      update_option($option_mod, $options);

    }

    //added twice in zmplugin and zmpro to set once before and after zmplugin_loaded/zmpro
    //before first call to license check!!
    static function setServicesConstants(){

      global $zmplugin;

      if(class_exists('\ZMP\Pro\Config\ThemeSettings\services')){

        $zmplugin['global_constants'] = new \ZMP\Pro\Config\ThemeSettings\services();

      } else {

        $zmplugin['global_constants'] = new \ZMP\Plugin\Config\ThemeSettings\services();

      }

      //is loaded before zmplugin and zmpro, so $zmplugin['zmp-admin']->getOptGroup() is already accesible!
      if(class_exists('\ZMP\ZMPAdmin\App')){

        $admin_app = new \ZMP\ZMPAdmin\App( $zmplugin['zmp-admin']->getOptGroup() );
        $admin_app->overwriteGlobalConstants();
        $admin_app->addtoGlobalConstants();

      }

    }

    //after new Plugin.php has created optgroup.
    //$zmplugin['zmpro']->getOptGroup() is accessible after zmplugin and zmpro config is loaded
    static function addGlobalConstants(){

      global $zmplugin;

      if(class_exists('\ZMP\Pro\App2')){

        $pro_app = new \ZMP\Pro\App2( $zmplugin['zmpro']->getOptGroup().'_advanced' );
        $pro_app->addtoGlobalConstants();

      }

    }

    static function getLinksMenu($links_array,$before = '<ul>',$after = '</ul>',$list_element = 'li'){

      $result = NULL;

      if(is_array($links_array)){

        $result .= $before;

        foreach( $links_array as $single_link_array ){

          $result .= '<'.esc_attr($list_element).'>';

          $result .= '<a href="'.esc_url($single_link_array['url']).'" class="'.esc_attr($single_link_array['class']).'" rel="'.esc_attr($single_link_array['rel']).'" target="'.esc_attr($single_link_array['target']).'">'.esc_html($single_link_array['link']).'</a>';

          $result .= '</'.esc_attr($list_element).'>';

        }

        $result .= $after;

      }

      return $result;

    }


}
