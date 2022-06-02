<?php

namespace ZMP\Plugin\ThemeCustomizer;

use WP_Customize_Control;
use WP_Customize_Color_Control;
use WP_Customize_Media_Control;
use ZMP\Plugin\ThemeCustomizer\CustomizerControlls;//own controlls class

class Customizer {

    public function getCustomizerSettingsPages() {

      /*
      $theme_object = $this->getThemeObject();
      $theme_presets_obj = $this->getThemePresetsObject();
      $theme_customizer_obj = $this->getThemeCustomizerObject();
      $theme_sections_object_obj = $this->getThemeSectionsObject();
      $theme_content_obj = $this->getThemeContentObject();
      */

      $result = array();
      $result['panels'] = array();
      $result['sections'] = array();
      $result['settings'] = array();
      $result['controlls'] = array();
      $result['selective_refresh_add_partial'] = array();

      return $result;


    }

    public function prepareSetting($key,$setting){

      return $setting;

    }

    public function addCustomizer() {

      add_action( 'customize_register', array( $this, 'registerCustomizerSettings' ) );

    }

    public function registerCustomizerSettings ( $wp_customize ) {

      $settings_array = $this->getCustomizerSettingsPages();

      foreach ( $settings_array as $key => $settings) {

        if($key == 'panels') {

          foreach ( $settings as $key => $setting) {

            $wp_customize->add_panel( $key, $setting );

          }

        }

        if($key == 'sections') {

          foreach ( $settings as $key => $setting) {

            $wp_customize->add_section( $key, $setting );

          }

        }

        if($key == 'settings') {

          foreach ( $settings as $key => $setting) {

            $setting = $this->prepareSetting($key, $setting);

            $wp_customize->add_setting( $key, $setting );

          }

        }

        if($key == 'controlls') {

          foreach ( $settings as $key => $setting) {

            if( array_key_exists( 'type', $setting ) && $setting['type'] == 'color' ){
              $wp_customize->add_control(
                new WP_Customize_Color_Control( $wp_customize, $key, $setting )
              );
            } elseif( array_key_exists( 'type', $setting ) && $setting['type'] == 'media' ){
              $wp_customize->add_control(
                new WP_Customize_Media_Control( $wp_customize, $key, $setting )
              );
            } elseif( array_key_exists( 'type', $setting ) && strpos( $setting['type'],'zm-' ) !== false ){
              $wp_customize->add_control(
                new CustomizerControlls( $wp_customize, $key, $setting )
              );
            } else {
              $wp_customize->add_control(
                new WP_Customize_Control( $wp_customize, $key, $setting )
              );
            }

          }

        }

        if ( isset( $wp_customize->selective_refresh ) ) {

          if($key == 'selective_refresh_add_partial') {

            foreach ( $settings as $key => $setting) {

              $wp_customize->selective_refresh->add_partial( $key, $setting );

            }

          }

        }


      }


    }


}
