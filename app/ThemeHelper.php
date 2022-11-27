<?php

namespace ZMP\Plugin;

class ThemeHelper {

  /**
  * Functions for use only when a ZMTheme is activated!
  */

  static function getViewConditionsChoices(){

    $result = array();

    $result['frontpage']    =  __( 'Front Page (front-page)', 'zmplugin' );
    $result['page']         =  __( 'Pages', 'zmplugin' );
    $result['blogpage']     =  __( 'Blog Page (home)', 'zmplugin' );
    $result['archive']      =  __( 'Default Archive', 'zmplugin' );
    $result['category']     =  __( '└ Category Archive', 'zmplugin' );
    $result['tag']          =  __( '└ Tag Archive', 'zmplugin' );
    $result['author']       =  __( '└ Author Archive', 'zmplugin' );
    $result['date']         =  __( '└ Date Archive', 'zmplugin' );

    //taxonomy archives
    $args = array(
      'public' => true,
      '_builtin' => false, //only not builtin posttypes!
    );
    $taxarr = ThemeHelper::getCleanTaxonomies($args);
    foreach($taxarr as $key_1 => $value_1){
      $result[ 'taxonomy_'.$key_1 ] =  '└ '.__( 'Taxonomy Archive', 'zmplugin' ).': '.$value_1;
    }

    //get post_type_archives
    $args_has_archive = array(
      'public' => true,
      '_builtin' => false, //only not builtin posttypes!
      'has_archive' => true, //only posttypes with archive!
      'capability_type' => 'post', //only post like posttypes... not forums or woocommerce...
    );
    $posttypes_archive_arr = get_post_types($args_has_archive);
    foreach($posttypes_archive_arr as $key_2 => $value_2){
      $result[ 'archive_'.$key_2 ] =  '└ '.__( 'Post Type Archive', 'zmplugin' ).': '.$value_2;
    }


    $result['single']       =  __( 'Single Post', 'zmplugin' );


    //get post_types
    $args = array(
      'public' => true,
      '_builtin' => false, //without builtin posttypes!
      'capability_type' => 'post', //only post like posttypes... not forums or woocommerce...
    );
    $posttypesarr = get_post_types($args);
    foreach($posttypesarr as $key_3 => $value_3){
      $result[ 'single_'.$key_3 ] =  __( 'Single Post Type', 'zmplugin' ).': '.$value_3;
    }



    //get singular custom Templates (same for singular page = post = posttypes)
    $singular_custom_templates = wp_get_theme()->get_page_templates();
    foreach($singular_custom_templates as $key_4 => $value_4){
      $result[ $key_4 ] =  __( 'Singular Template', 'zmplugin' ).': '.$value_4;
    }


    $result['searchpage']   =  __( 'SearchPage', 'zmplugin' );
//      $result['errorpage']    =  __( 'ErrorPage', 'zmplugin' );//NOT IN USE


    if ( class_exists( 'woocommerce' ) ) {
      $result['woocommerce'] = __( 'Woocommerce', 'zmplugin' );
    }

    if ( class_exists( 'bbPress' ) ) {
      $result['bbPress'] = __( 'bbPress', 'zmplugin' );
    }

    $result['loggedin']   =  __( 'Logged in Users', 'zmplugin' );

    return $result;

  }

  static function getPresetChoices( $preset_key = NULL, $default_label = '⬤ Default', $reset_to_default_label = '↺ Reset to Default' ) {

    $new_array = array();

    global $zmtheme;

    $new_array[ 'default' ] =  $default_label;

    if($preset_key){

      if( property_exists( $zmtheme['default_presets'], $preset_key ) ){

        foreach( $zmtheme['default_presets']->$preset_key as $key => $value ){

          $new_array[ $preset_key.'__'.$key ] =  '★ '.\ZMT\Theme\Helpers::transformObjectKeystoLabel($key);

        }

      }

    }

    //sort array by ASC
    asort($new_array);

    //prepends the default value after sorting
    $new_array = array('default' => $default_label) + $new_array;

    $new_array[ 'reset_to_default' ] =  $reset_to_default_label;

    return $new_array;

  }

  static function getCleanTaxonomies( $args ){

    $taxonomies = get_taxonomies( $args );

    unset($taxonomies['post_format']);

    if ( class_exists( 'bbPress' ) ) {
      unset($taxonomies['topic-tag']);// do not use: 'topic-tag' (bbpress)
    }

    if ( class_exists( 'woocommerce' ) ) {
      unset(
        $taxonomies['product_cat'],// do not use: 'product_cat' (woocommerce)
        $taxonomies['product_tag'],// do not use: 'product_tag' (woocommerce)
        $taxonomies['product_shipping_class']// do not use: 'product_shipping_class' (woocommerce)
      );
    }

    return $taxonomies;

  }

  static function getTaxonomiesChoices(){

    $args = array(
      'public'   => true
    );

    $taxonomies = ThemeHelper::getCleanTaxonomies($args);

    $new_array = array();

    if ( $taxonomies ) {

        foreach ( $taxonomies  as $taxonomy ) {
            $new_array[ $taxonomy ] =  \ZMT\Theme\Helpers::transformObjectKeystoLabel($taxonomy);
        }

    }

    return $new_array;

  }

  static function getTemplateBlockChoices( $default_label = '- Select a block template -' ){

    $args = array(
      'post_type'   => 'zm_blocks',
      'numberposts'   => -1,
    );

    $posts_array = get_posts($args);

    $new_array = array();

    $new_array[ '0' ] =  $default_label;

    if ( $posts_array ) {

        foreach ( $posts_array  as $post ) {
            $new_array[ $post->post_name ] =  $post->post_title;
        }

    }

    return $new_array;

  }

  static function getOffcanvasChoices() {

    $new_array = array();

    global $zmtheme;

    foreach($zmtheme['default_components'] as $key => $value){

      if( $key == 'offcanvas' || strpos( $key, 'offcanvas_' ) !== false ){

        foreach($value as $key2 => $value2){

          if( is_object($value2) && property_exists( $value2, 'isstartobj' ) ){

            $com_type_obj = new \ZMT\Theme\ComponentTypeLabel();
            $label = $com_type_obj->getComLabelOrKey($key);

            $new_array[ $key.'__'.$key2 ] =  $label;

          }

        }

      }

    }

    return $new_array;

  }

  static function getCustomSectionContentNavChoices() {

    $new_array = array();

    global $zmtheme;

    foreach($zmtheme['default_components'] as $key => $value){

      if( $key == 'nav' || strpos( $key, 'nav_' ) !== false ){

        foreach($value as $key2 => $value2){

          if( is_object($value2) && property_exists( $value2, 'isstartobj' ) ){

            $com_type_obj = new \ZMT\Theme\ComponentTypeLabel();
            $label = $com_type_obj->getComLabelOrKey($key);

            $new_array[ $key.'__'.$key2 ] =  $label;

          }

        }

      }

    }

    return $new_array;

  }

  static function getCustomSectionContentExtensionsChoices() {

    $new_array = array();

    global $zmtheme;

    foreach($zmtheme['default_components'] as $key => $value){

      $label = ucfirst( str_replace( 'comgroup_', '', $key ) );
      if(strpos( $key, 'comgroup_' ) !== false ||  $key == 'extensions' ){

        foreach($value as $key2 => $value2){

          if( is_object($value2) && ( property_exists( $value2, 'isstartobj' ) || $key == 'extensions' ) ){

            if($key == 'extensions'){ $label = ucfirst($key2); }

            $new_array[ $key.'__'.$key2 ] =  $label;

          }

        }

      }

    }

    return $new_array;

  }

  static function getCustomSectionContentChoices( $default_label = 'Default', $query_loop_label = 'QueryLoop' ) {

    $new_array = array();

    global $zmtheme;

    $new_array[ 'default' ] =  $default_label;
    $new_array[ 'queryloop' ] =  $query_loop_label;

    foreach($zmtheme['default_components'] as $key => $value){

      $label = ucfirst( str_replace( 'nav_', '', $key ) );
      $label = ucfirst( str_replace( 'offcanvas_', '', $key ) );
      $label = ucfirst( str_replace( 'comgroup_', '', $key ) );
      if( $key == 'nav' || strpos( $key, 'nav_' ) !== false || $key == 'offcanvas' || strpos( $key, 'offcanvas_' ) !== false || strpos( $key, 'comgroup_' ) !== false ||  $key == 'extensions' ){

        foreach($value as $key2 => $value2){

          if( is_object($value2) && ( property_exists( $value2, 'isstartobj' ) || $key == 'extensions' ) ){

            if($key == 'extensions'){ $label = ucfirst($key2); }

            $new_array[ $key.'__'.$key2 ] =  $label;

          }

        }

      }

    }

    return $new_array;

  }

  static function getPostsTemplateObjectsChoices( $default_label = 'Posts' ) {

    $new_array = array();

    global $zmtheme;

    foreach($zmtheme['default_components'] as $key => $value){

      if($key == 'posts'){

        $new_array[ 'posts' ] =  $default_label;

      }

      if( strpos( $key, 'posts_' ) !== false ){

        $com_type_obj = new \ZMT\Theme\ComponentTypeLabel();
        $label = $com_type_obj->getComLabelOrKey($key);

        $new_array[ $key ] =  $label;

      }

    }

    return $new_array;

  }

  static function getTemplatePartsChoices( $default_label = 'Default' ) {

    $array = scandir( get_template_directory().'/template-parts' );
    $new_array = array();

    foreach($array as $key => $value){

      if ($value != '.' && $value != '..'){

        $name = str_replace('-', ' ', $value);
        $name = ucwords( str_replace('.php', '', $name) );

        $new_array[ $value ] =  $name;

      }

    }

    $new_array[ 'default' ] =  $default_label;

    return $new_array;

  }

}
