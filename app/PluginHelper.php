<?php

namespace ZMP\Plugin;

class PluginHelper {

  /**
  * Required Plugins & Versions Check
  */

  //get installed plugin activ status pluginname/pluginname.php
  static function getInstalledPluginStatus($pluginfolderslug) {

    if ( ! function_exists( 'is_plugin_active' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    return is_plugin_active($pluginfolderslug);

  }

  static function getFileData($path){

    //setting headers manually to also get ZMDLID
    $headers_array = array(
        'PluginName'  => 'Plugin Name',
        'PluginURI'   => 'Plugin URI',
        'ThemeName'   => 'Theme Name',
        'ThemeURI'    => 'Theme URI',
        'Version'     => 'Version',
        'Description' => 'Description',
        'Contributors' => 'Contributors',
        'Author'      => 'Author',
        'AuthorURI'   => 'Author URI',
        /*'TextDomain'  => 'Text Domain',
        'DomainPath'  => 'Domain Path',
        'Network'     => 'Network',*/
        'RequiresWP'  => 'Requires at least',
        'Tested'      => 'Tested up to',
        'RequiresPHP' => 'Requires PHP',
        'ZMDLID'      => 'ZMDLID',//download id - unique for each plugin / theme
        'ZMUPDAPI'    => 'ZMUPDAPI',//update api - 0. nothing set or off 1. zm, 2. wp (off can be choosen in settings...)
        /*'UpdateURI'   => 'Update URI',*/
    );

    $plugin_data = get_file_data($path, $headers_array);

    return $plugin_data;

  }

  //get installed plugin version nr
  static function getInstalledPluginMetaDatabykey($pluginfolderslug,$key) {

    $result = 0;

    if ( PluginHelper::getInstalledPluginStatus($pluginfolderslug) ) {

      $plugin_data = PluginHelper::getFileData(WP_PLUGIN_DIR.'/'.$pluginfolderslug);

      //$plugin_data = get_plugin_data(WP_PLUGIN_DIR.'/'.$pluginfolderslug, false);

      $result = $plugin_data[$key];

    }

    return $result;

  }

  static function getThemeMetaDataByPathAndKey($path, $key){

    $result = 0;

    $plugin_data = PluginHelper::getFileData($path.'/style.css');

    if ( is_array($plugin_data) && array_key_exists($key, $plugin_data) ) {

      $result = $plugin_data[$key];

    }

    return $result;

  }

  /**
  * if 0 there are plugins not installed, updated or activated if 1, everything can run!
  */
  static function getStatusofRequiredPluginsNVersions($reqplugnverarray) {

    $result = 1; //if stays 1, all plugins and versions are ok

    if( $reqplugnverarray ) {

      foreach( $reqplugnverarray as $innerarray ) {

        if( !self::getInstalledPluginStatus($innerarray['slug']) ) {

          $result = 0;

        }

        if(self::getInstalledPluginMetaDatabykey($innerarray['slug'],'Version') < $innerarray['version']) {

          $result = 0;

        }

      }

    }

    return $result;

  }

  /**
  * get list of req. plugins and status of each in a table
  */
  static function getRequiredPluginsTable( $reqplugnverarray, $textdomain ) {

    $html = NULL;

    if (self::getStatusofRequiredPluginsNVersions($reqplugnverarray) != 1) {

      $html .= '<div class="uk-overflow-auto">';
        $html .= '<table class="uk-table">';
          $html .= '<thead>';
            $html .= '<tr>';
              $html .= '<th class="uk-width-1-4">'.__( 'Plugin Name:' ,$textdomain ).'</th>';
              $html .= '<th class="uk-table-shrink">'.__( 'Installed Version:' ,$textdomain ).'</th>';
              $html .= '<th class="uk-table-shrink">'.__( 'Required Version:' ,$textdomain ).'</th>';
              $html .= '<th class="uk-table-shrink">'.__( 'Plugin Activated?' ,$textdomain ).'</th>';
              $html .= '<th>'.__( 'Result:' ,$textdomain ).'</th>';
            $html .= '</tr>';
          $html .= '</thead>';
          $html .= '<tbody>';

            foreach( $reqplugnverarray as $innerarray ) {

              $html .= '<tr>';

                /**
                * Plugin Name
                */
                $html .= '<td>';
                  $html .= $innerarray['name'];
                $html .= '</td>';

                /**
                * Plugin Actual Version
                */
                $version = self::getInstalledPluginMetaDatabykey( $innerarray['slug'], 'Version' );
                $html .= '<td>';
                  $version_html = $version;
                  $version = 1;
                  if($version < $innerarray['version']) {

                    $version_html = '<b><span class="uk-text-danger">'.$version.'</span></b>';
                    $version = 0;

                  }
                  $html .= $version_html;
                $html .= '</td>';

                /**
                * Plugin Required Version
                */
                $html .= '<td>';
                  $html .= $innerarray['version'];
                $html .= '</td>';

                /**
                * Plugin Activated?
                */
                $html .= '<td>';
                  $active_html = '<span class="uk-text-success" uk-icon="icon: check"></span>';
                  $active = 1;
                  if( !self::getInstalledPluginStatus( $innerarray['slug'] ) ) {

                    $active_html = '<span class="uk-text-danger" uk-icon="icon: bolt"></span>';
                    $active = 0;

                  }
                  $html .= $active_html;
                $html .= '</td>';

                /**
                * Plugin Total Status
                */
                $html .= '<td>';
                  $status = '<span class="uk-text-success" uk-icon="icon: check"></span>';
                  if($version + $active < 2){

                    $status = '<span class="uk-text-danger" uk-icon="icon: bolt"></span>';

                  }
                  $html .= $status;
                $html .= '</td>';

              $html .= '</tr>';

            }

          $html .= '</tbody>';
        $html .= '</table>';
      $html .= '</div>';

    } else {

      $html .= '<p><b>Plugin Status:</b> Everything is running Smoothly...</p>';

    }

    return $html;

  }

  static function getExtCards(){

    global $zmextensions;
    $html = NULL;

    if( is_array($zmextensions) ){

      $html .= '<div uk-grid class="uk-child-width-1-1 uk-grid-small uk-grid-collapse">';

      foreach($zmextensions as $extensionslug => $extenstionlocation){

        $html .= '<div class="zmaddonsmodule">';
          $html .= '<div class="uk-card uk-card-default">';
            $html .= '<div uk-grid class="uk-grid-divider uk-grid-small uk-child-width-expand uk-flex-middle">';

              $html .= PluginHelper::getExtCard($extensionslug,$extenstionlocation);

            $html .= '</div>';
          $html .= '</div>';
        $html .= '</div>';

      }

      $html .= '</div>';

    }

    return $html;

  }

  static function getExtCard($extensionslug,$extenstionlocation){

    $html = NULL;
    $singleplugindataarray = get_plugin_data(WP_PLUGIN_DIR.'/'.$extenstionlocation, false);

    global $zmplugin;
    $inactive = NULL;
    if(!array_key_exists($extensionslug,$zmplugin)){
      $inactive = ' <span class="uk-label uk-label-danger">'.__( 'Inactive' ,'zmplugin' ).'</span>';
    }

    if( $singleplugindataarray['Name'] ){
      $html .= '<h4 class="uk-width-small uk-text-normal">'.esc_html($singleplugindataarray['Name']).$inactive.'</h4>';
    }

    $html .= '<div>';

      if( $singleplugindataarray['Description'] ){
        $html .= '<p class="uk-margin-remove">'.esc_html($singleplugindataarray['Description']).'</p>';
      }

      $html .= '<hr>';

      $html .= '<p class="uk-margin-remove">';

        if( $singleplugindataarray['Version'] ){
          $html .= '<span>'.esc_html($singleplugindataarray['Version']).'</span>';
        }
        if( $singleplugindataarray['AuthorURI'] ){
          $html .= ' | <span><a href="'.esc_url($singleplugindataarray['AuthorURI']).'" target="_blank">'.esc_html($singleplugindataarray['Author']).'</a></span>';
        }
        if( $singleplugindataarray['PluginURI'] ){
          $html .= ' | <span><a href="'.esc_url($singleplugindataarray['PluginURI']).'" target="_blank">'.__('Plugin Website', 'zmplugin').'</a></span>';
        }

      $html .= '</p>';

    $html .= '</div>';

    return $html;


  }

  /**
  * Returns true if premium or the given string/array für $html.
  * needs second check in optionstable for activated license!!
  */
  static function isPremiumAndRegsitered($html = true){

    $result = false;
    if( class_exists ('\ZMP\Pro\Init') ){

      global $zmplugin;

      $auth = new \ZMP\Pro\App( $zmplugin['zmpro']->getOptGroup() );

      if( $auth->isActiveLicenceAndRegsiteredDomain() ){

        $result = $html;

      }


    }
    return $result;

  }
  static function isPremiumVersion($html = true){

    $result = false;
    if( class_exists ('\ZMP\Pro\Init') ){

      global $zmplugin;

      $auth = new \ZMP\Pro\App( $zmplugin['zmpro']->getOptGroup() );

      if( $auth->isRegisteredDomain() ){

        $result = $html;

      }


    }
    return $result;

  }

  static function installedPremiumAddon(){

    $result = false;
    if( class_exists ('\ZMP\Pro\Init') ){

      $result = true;

    }
    return $result;

  }

  static function getNrOfExt(){

    global $zmextensions;

    $nrofext = count($zmextensions);

    return $nrofext;

  }

  static function getNrAllowedOfExt(){

    $result = 5;
    if( PluginHelper::isPremiumVersion() == true ){

      $result = '∞';

    } elseif ( PluginHelper::installedPremiumAddon() == true ){

      $result = 6;

    }
    return $result;

  }

  static function getPluginSlug($plugin_basename) {

    return trim(dirname($plugin_basename), '/');

  }

  /**
  * Registers a Plugin in ZMPlugin
  */
  static function registerExtension($plugin_basename){

    global $zmextensions;

    $zmextensions[ PluginHelper::getPluginSlug($plugin_basename) ] = $plugin_basename;

  }

  static function registerExtensionModules( $extendmodules_array, $plugin_basename ){

    global $zmextensionmodules;

    if(is_array($extendmodules_array)){

      foreach($extendmodules_array as $module_name => $values){

        $zmextensionmodules[ $module_name ] = $values;

      }

    }

    if($plugin_basename !== false){

      PluginHelper::registerExtension($plugin_basename);

    }

    //returns true if ext can be loaded, false if not
    return PluginHelper::doExtensionsCheck();

  }

  static function registerExtensionTemplates( $extendtemplates_array, $plugin_basename ){

    global $zmextensiontemplates;

    if(is_array($extendtemplates_array)){

      foreach($extendtemplates_array as $template_name => $values){

        $zmextensiontemplates[ $template_name ] = $values;

      }

    }

    if($plugin_basename !== false){

      PluginHelper::registerExtension($plugin_basename);

    }

    //returns true if ext can be loaded, false if not
    return PluginHelper::doExtensionsCheck();

  }

  static function doExtensionsCheck(){

    $installable = true;

    //activate if license check is defined in optionstable
    if(PluginHelper::isPremiumVersion()){
      return $installable;
    }

    if( PluginHelper::getNrOfExt() > PluginHelper::getNrAllowedOfExt() ){
      $installable = false;
    }

    //returns true if ext can be loaded, false if not
    return $installable;

  }


}
