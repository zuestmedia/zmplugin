<?php

namespace ZMP\Plugin;

class Scripts {

  /**
    * Plugin Folder
    * @var string
    * @access private
    */
    private $plugin_folder_url;

  /**
    * Präfix for getting values from optiontable
    * praefix_ + nameofsettingfield
    * @var string
    * @access private
    */
    private $optpra;

  /**
    * Settings Status
    * if set to 1 only programatically set values are considered
    * if set to 2, options-table will be queried for values
    * @var int
    * @access private
    */
    private $settings_status;

  /**
    * Version
    * @var string
    * @access private
    */
    private $version;

  /**
    * Options Präfix Getters n Setters
    */
    public function setPluginFolderUrl($plugin_folder_url) {

      $this->plugin_folder_url = $plugin_folder_url;

    }
    public function getPluginFolderUrl() {

      return $this->plugin_folder_url;

    }


  /**
    * Options Präfix Getters n Setters
    */
    public function setOptPra($optpra) {

      $this->optpra = $optpra;

    }
    public function getOptPra() {

      return $this->optpra;

    }

  /**
    * Settings-Status
    */
    public function setSettingsStatus($settings_status) {

      $this->settings_status = $settings_status;

    }
    public function getSettingsStatus() {

      return $this->settings_status;

    }

  /**
    * Version-Status
    */
    public function setVersion($version) {

      $this->version = $version;

    }
    public function getVersion() {

      return $this->version;

    }

  /**
    * Enqueue Style CSS Files
    */
    static function EnqueueStyle($css_slug, $css_url = '', $css_deps = array(), $css_ver = false, $css_media = 'all') {

      if(!wp_style_is($css_slug)) {
        //add style
        wp_enqueue_style( $css_slug, $css_url,  $css_deps, $css_ver, $css_media);

      }

    }

  /**
    * Enqueue Script JS Files
    */
    static function EnqueueScript($js_slug, $js_url = '', $js_deps = array(), $js_ver = false, $js_in_footer = false) {

      if(!wp_script_is($js_slug)) {
        //add style
        wp_enqueue_script( $js_slug, $js_url, $js_deps, $js_ver, $js_in_footer);

      }

    }



}
