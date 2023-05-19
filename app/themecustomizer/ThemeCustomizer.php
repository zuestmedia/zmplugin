<?php

namespace ZMP\Plugin\ThemeCustomizer;

class ThemeCustomizer extends Customizer {

  /**
    * validation
    */
    public function prepareSetting($key,$setting){

      $validation = new \ZMP\Plugin\Validation();
      //OldValue will not be returned in customizer
      //WPCusotmizerErrors returns error_object if WP_Error Object is created, NULL if wp<4.5 or no errorobject
      $validation->setErrorHandler('WPCusotmizerErrors');
      $validation->setInputName($key);

      //check for custom set validation functions in $attributes_array_or_name
      if(array_key_exists('validationtype',$setting)){
        $setting['sanitize_callback'] = array( $validation, $setting['validationtype'] );
      } else {
        $setting['sanitize_callback'] = array( $validation, 'sanitize' );
      }

      return $setting;

    }

  /**
    * FIX: init controlls & presets object here at 'customize_register', so taxes and posttypes are already loaded!
    * (instead of __construct function in this file which starts with after_setup_theme hook - its too early)
    */
    public function getCustomizerSettingsPages() {

      global $zmtheme;

    /**
      * default_presets with Namespace and Alt-Namespace(s)
      * in child theme additonla presets can be defined
      */
      $ns_def_presets = new \ZMT\Theme\Namespaces( '\ZMT\Theme\Config\Presets\\', '\ZMT\Theme\Child\Config\Presets\\' );

      $full_classname_presets = $ns_def_presets->getClass('BuildObject');

      $zmtheme['default_presets'] = new $full_classname_presets();

    /**
      * default_customizer with Namespace and Alt-Namespace(s)
      */
      $ns_def_customizer_controlls = new \ZMT\Theme\Namespaces( '\ZMP\Plugin\Config\ThemeCustomizer\\', '\ZMP\Pro\Config\ThemeCustomizer\\' );

      $full_classname_controlls = $ns_def_customizer_controlls->getClass('controlls');

      $zmtheme['default_customizer'] = new $full_classname_controlls();

      //section headers!
      $zmtheme['default_customizer_section_headers'] =  new \ZMP\Plugin\Config\ThemeCustomizer\section_headers();


      $result = array();
      $result['panels'] = array();
      $result['sections'] = array();
      $result['settings'] = array();
      $result['controlls'] = array();
      $result['selective_refresh_add_partial'] = array();

      if( $zmtheme['theme']->getSettingsStatus() >= 2 ) {

        $result['panels'] = $this->getPanels();
        $result['sections'] = $this->getSections();
        $result = $this->getSettingsNControlls( $result );

      }

      return $result;

    }


    public function getPanels() {

      global $zmtheme;

      $panels = new \ZMP\Plugin\Config\ThemeCustomizer\panels();

      $result = array();

      foreach( $zmtheme['default_components'] as $key1 => $componentsarray){

        $active_callback = new CustomizerActiveCallbackPanels();
        $active_callback->setComTypeObjectName($key1);

        $com_type_obj = new \ZMT\Theme\ComponentTypeLabel();

        $result[ $key1 ] = array(
          //'active_callback'       => array($active_callback2,'is_active_com_object'),
          'priority'              => 160,
          'title'                 => $com_type_obj->getComLabelOrKey($key1), //Visible title of section
        );

        if($key1 == 'globals') {

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'globals', $panels,false);

        } elseif($key1 == 'header' || $key1 == 'center' || $key1 == 'footer'){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'section', $panels);

        } elseif($key1 == 'archive' || strpos($key1, 'archive_') !== false || $key1 == 'home' || $key1 == 'search' || $key1 == 'category' || $key1 == 'tag' || $key1 == 'author' || $key1 == 'date'){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'archive', $panels);
          $result[ $key1 ]['active_callback'] = array($active_callback,'is_active_com_object');

        } elseif($key1 == 'posts' || strpos($key1, 'posts_') !== false){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'posts', $panels);
          $result[ $key1 ]['active_callback'] = array($active_callback,'is_active_com_object');

        } elseif($key1 == 'single' || strpos($key1, 'single_') !== false){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'single', $panels);
          $result[ $key1 ]['active_callback'] = array($active_callback,'is_active_com_object');

        } elseif($key1 == 'page' || $key1 == 'errorpage' || $key1 == 'frontpage' || strpos($key1, 'page_')!== false ){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'page', $panels);
          $result[ $key1 ]['active_callback'] = array($active_callback,'is_active_com_object');

        } elseif( strpos($key1, 'singular_')!== false || strpos($key1, 'custom_')!== false ){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'singular', $panels);
          $result[ $key1 ]['active_callback'] = array($active_callback,'is_active_com_object');

        } elseif($key1 == 'nav' || strpos($key1, 'nav_') !== false){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'nav', $panels);
          $result[ $key1 ]['active_callback'] = array($active_callback,'is_active_com_object');

        } elseif($key1 == 'offcanvas' || strpos($key1, 'offcanvas_') !== false){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'offcanvas', $panels);
          $result[ $key1 ]['active_callback'] = array($active_callback,'is_active_com_object');

        } elseif($key1 == 'comments'){

          $result[ $key1 ] = $this->addPanelInfos($result[ $key1 ], 'comments', $panels,false);
          $result[ $key1 ]['active_callback'] = array($active_callback,'is_active_com_object');

        }

      }

      return $result;

    }

    public function addPanelInfos($result, $panelkey, $panels, $titlehandling = true){

      if(property_exists( $panels, $panelkey )){

        $panel_item = $panels->$panelkey;

        if(property_exists( $panel_item, 'priority' )){
          $result['priority'] = $panel_item->priority;
        }
        if(property_exists( $panel_item, 'title' ) && $titlehandling == true){
          $result['title'] = $panel_item->title.$result['title'];
        } elseif(property_exists( $panel_item, 'title' ) ) {
          $result['title'] = $panel_item->title;
        }
        if(property_exists( $panel_item, 'description' )){
          $result['description'] = $panel_item->description;
        }
        if(property_exists( $panel_item, 'active_callback' )){
          $result['active_callback'] = $panel_item->active_callback;
        }

      }

      return $result;

    }

    public function getItemPrio($com_id,$el_lvl,$parent_com_id = NULL){//if has parent_com_id is item, not container

      global $zmtheme;

      $final_pos = 0;

      if($el_lvl <= 1){
        $el_lvl = 1;
      }

      $level_range_start = ($el_lvl - 1) * 10000;

      if($parent_com_id == NULL){

        $itempos_parent = $zmtheme[ $com_id ]->getArg('item_position') + 1;

        $final_pos = ( $level_range_start + ($itempos_parent * 100) );

      } else {


        $itempos = $zmtheme[ $com_id ]->getArg('item_position') + 1;
        $itempos_parent = $zmtheme[ $parent_com_id ]->getArg('item_position') + 1;

        if( $zmtheme[ $parent_com_id ]->getIsStartObj() ){

          $itempos_parent = 0;

        }

        $final_pos = $itempos + ( $level_range_start + ($itempos_parent * 100) );

      }

      return $final_pos;

    }

    public function getParentChildrenLvl($component_type,$component_name,$count = 0){

      global $zmtheme;

      $count++;

      $com_types_object = $zmtheme['default_components']->$component_type;

      if( property_exists( $com_types_object->$component_name, 'isstartobj' ) && isset($com_types_object->$component_name->isstartobj) ){

        return $count;

      } else {

        if( $zmtheme[ $component_type.'__'.$component_name ]->getArg('parent_container') ){

          $parent = $zmtheme[ $component_type.'__'.$component_name ]->getArg('parent_container');

          return $this->getParentChildrenLvl($component_type,$parent,$count);

        }

      }

    }

    public function getSectionTitleNPrio($result, $com_id, $component_type, $component_name, $component){

      global $zmtheme;

      $el_lvl = 0;//int
      $el_str = NULL;//str
      $itempos = NULL;//int

      if( method_exists( $zmtheme[ $com_id ], 'getComStatus' ) ){

        //if is isstartobj el_lvl = 0
        if( property_exists( $component, 'isstartobj' ) && isset($component->isstartobj) ){

          $el_lvl = 0;
          $el_str = NULL;
          $itempos = 36;

        } else {

          if( $zmtheme[ $com_id ]->getArg('parent_container') ){

            $parent = $zmtheme[ $com_id ]->getArg('parent_container');

            //check if parent container is start obj if not check if next, and so on --> count lvl's
            $el_lvl = $this->getParentChildrenLvl($component_type,$parent);

            if( method_exists( $zmtheme[ $com_id ], 'getSortedContentArray' ) ){

              $itempos = $this->getItemPrio($com_id,$el_lvl) +36;

              $el_str = '└─ '; // is a container min lvl = 1

            } else {

              $item_el_lvl_is_one_lower = $el_lvl - 1;

              $itempos = $this->getItemPrio($com_id,$item_el_lvl_is_one_lower,$component_type.'__'.$parent) +36;

              //$el_str ='├─ '; //is an item, min lvl = 1
              $el_str ='&nbsp;─ '; //is an item, min lvl = 1

            }

          }



        }

      }

      if($el_lvl > 1){
        $el_lvl_n = $el_lvl - 1;
        $el_str = str_repeat ( '&nbsp;&nbsp;&nbsp;', $el_lvl_n ).$el_str;
      }

      if($el_str){
        $result['title'] = $el_str.$result['title'];
      }

      if($itempos){
        $result['priority'] = $itempos;
      }

      return $result;

    }

    public function getSections(){

      global $zmtheme;

      $controlls = $zmtheme['default_customizer'];

      $result = array();

      foreach( $zmtheme['default_components'] as $key2 => $componentsarray){

        foreach( $componentsarray as $key3 => $component){

          if( is_object( $component ) ){

            $com_id = $key2.'__'.$key3;

            $com_lock_status = false;
            if( method_exists( $zmtheme[ $com_id ], 'getComLockStatus' ) ){
              $com_lock_status = $zmtheme[ $com_id ]->getComLockStatus();
            }

            $com_status = '1';
            if( method_exists( $zmtheme[ $com_id ], 'getComStatus' ) ){
              $com_status = $zmtheme[ $com_id ]->getComStatus();
            }
            if( $com_status == '1' && $com_lock_status == false ){

              $com_name_key = 'com_'.$key3;
              //shorten __1 / __n from key for controlls
              if(strpos($com_name_key, '__') !== false){
                $com_name_key = substr($com_name_key, 0, strpos($com_name_key, "__"));
              }
              $com_type_key = 'none';
              if(property_exists( $component, 'type' )){
                $com_type_key = 'com_'.strtolower($component->type);
              }

              if(property_exists( $controlls, $com_name_key )){

                $result[ $com_id ] = array(
                   'panel'       => $key2,
                   'priority'    => 35, //Determines what order this appears in
                   //'title'       => $controlls->$com_name_key->label, //Visible title of section
                );
                if( property_exists($controlls->$com_name_key, 'label') ){
                  $result[ $com_id ]['title'] = $controlls->$com_name_key->label;
                }
                if( property_exists($controlls->$com_name_key, 'description') ){
                  $result[ $com_id ]['description'] = $controlls->$com_name_key->description;
                }

              } elseif(property_exists( $controlls, $com_type_key )){

                $result[ $com_id ] = array(
                   'panel'       => $key2,
                   'priority'    => 35, //Determines what order this appears in
                   //'title'       => $controlls->$com_type_key->label, //Visible title of section
                );
                if( property_exists($controlls->$com_type_key, 'label') ){
                  $result[ $com_id ]['title'] = $controlls->$com_type_key->label;
                }
                if( property_exists($controlls->$com_type_key, 'description') ){
                  $result[ $com_id ]['description'] = $controlls->$com_type_key->description;
                }

              } else {

                $result[ $com_id ] = array(
                   'panel'       => $key2,
                   'priority'    => 35, //Determines what order this appears in
                   //'title'       => ucfirst($key3), //Visible title of section
                );

              }

              $com_label = NULL;
              if( method_exists( $zmtheme[ $com_id ], 'getComLabel' ) ){
                $com_label = $zmtheme[ $com_id ]->getComLabel();
              }
              if($com_label){
                $result[ $com_id ]['title'] = $com_label;
              }

              if( array_key_exists( 'title', $result[ $com_id ] ) == false ){
                //$result[ $com_id ]['title'] = ucfirst($key3);
                $result[ $com_id ]['title'] = \ZMT\Theme\Helpers::transformObjectKeystoLabel($com_id);
              }

              $result[ $com_id ] = $this->getSectionTitleNPrio($result[ $com_id ], $com_id, $key2, $key3, $component);

            }

          }

        }

      }

      global $wp_customize;

      //move section settings to global
      $wp_customize->get_section( 'title_tagline' )->panel = 'globals';
      $wp_customize->get_section( 'title_tagline' )->priority = 20;
      $wp_customize->get_section( 'static_front_page' )->panel = 'globals';
      $wp_customize->get_section( 'static_front_page' )->priority = 21;
      $wp_customize->get_section( 'custom_css' )->panel = 'globals';
      $wp_customize->get_section( 'custom_css' )->priority = 40;//29 is css selection

      //deactivate?!
      //$wp_customize->get_section( 'background_image' )->panel = 'globals';
      //$wp_customize->get_section( 'background_image' )->priority = 31;

      //controll
      //$wp_customize->get_control( 'background_color' )->section = 'globals__colors';
      //$wp_customize->get_control( 'background_color' )->section = 'background_image';//must be loaded before?!!! to get all scripts for global colors...

      return $result;

    }

    public function SettingNControll($result, $section_id, $settingNcontroll_key, $default_value, $controll_obj, $selective_refresh_add_partial = NULL){

      global $zmtheme;

        $result['settings'][ $settingNcontroll_key ] = array(
           'default'    => $default_value, //Default setting/value to save
           'validationtype' => 'sanitize', //validate class
           'transport'      => 'postMessage',
        );

        $result['controlls'][ $settingNcontroll_key ] = array(
            'settings'       => $settingNcontroll_key,
            'section'        => $section_id,//could be moved down to if settingstatus >= accesslevel, so settings are not zugeordnet to section in customizer
            'priority'       => 10000,
            'label'          => NULL,
            'description'    => NULL,
            //'input_attrs'     => array('class' => 'uk-input'),
            'type'           => 'hidden',
        );

        /**
         * Add Selective Refresh Settings to array!
         */
        if($selective_refresh_add_partial){

          $result['selective_refresh_add_partial'][ $selective_refresh_add_partial.$section_id ]['settings'][] = $settingNcontroll_key;

        }

      /**
        * check if object exists
        */
        if( is_object( $controll_obj ) ){

        /**
          * setting
          */
          if( property_exists($controll_obj, 'validation') ){
            $result['settings'][ $settingNcontroll_key ]['validationtype'] = $controll_obj->validation;
          }
          if( property_exists($controll_obj, 'transport') ){
            $result['settings'][ $settingNcontroll_key ]['transport'] = $controll_obj->transport;
          }

        /**
          * controls
          */
          if( property_exists($controll_obj, 'mime_type') ){
            $result['controlls'][ $settingNcontroll_key ]['mime_type'] = $controll_obj->mime_type;
          }
          if( property_exists($controll_obj, 'button_labels') ){
            $result['controlls'][ $settingNcontroll_key ]['button_labels'] = $controll_obj->button_labels;
          }
          if( property_exists($controll_obj, 'input_attrs') ){
            $result['controlls'][ $settingNcontroll_key ]['input_attrs'] = $controll_obj->input_attrs;
          }
          if( property_exists($controll_obj, 'choices') ){
            $result['controlls'][ $settingNcontroll_key ]['choices'] = $controll_obj->choices;
          }
          if( property_exists($controll_obj, 'priority') ){
            $result['controlls'][ $settingNcontroll_key ]['priority'] = $controll_obj->priority;
          }

          //hide controll if access level is not reached but show in dev mode! >= 4
          if( property_exists($controll_obj, 'access_level') && $zmtheme['theme']->getSettingsStatus() >= $controll_obj->access_level || $zmtheme['theme']->getSettingsStatus() >= 4 ){

            if( property_exists($controll_obj, 'label') && $controll_obj->label != 'hide' ){
              $result['controlls'][ $settingNcontroll_key ]['label'] = $controll_obj->label;
            } elseif (  property_exists($controll_obj, 'label') && $controll_obj->label == 'hide' ){
              $result['controlls'][ $settingNcontroll_key ]['label'] = NULL;
            }


            if( property_exists($controll_obj, 'description') && $controll_obj->description != 'hide'){
              $result['controlls'][ $settingNcontroll_key ]['description'] = $controll_obj->description;
            } elseif (  property_exists($controll_obj, 'description') && $controll_obj->description == 'hide' ){
              $result['controlls'][ $settingNcontroll_key ]['description'] = NULL;
            }

            //toggleheader insert
            if( property_exists($controll_obj, 'section_group')  && $controll_obj->section_group != 'none'){

              $section_headers_group = $controll_obj->section_group;

              $result['controlls'][ $settingNcontroll_key ]['description'] .= '<span class="zmtoggleheaderitem '.$section_id.'-tohe-'.$section_headers_group.'"></span>';

              if( property_exists($zmtheme['default_customizer_section_headers'], $section_headers_group) ){

                $addtoprio = $zmtheme['default_customizer_section_headers']->$section_headers_group->priority;

                $result['controlls'][ $settingNcontroll_key ]['priority'] = $result['controlls'][ $settingNcontroll_key ]['priority'] + $addtoprio;

              }

            }

            if( property_exists($controll_obj, 'type') ){
              $result['controlls'][ $settingNcontroll_key ]['type'] = $controll_obj->type;
            }

            if( property_exists($controll_obj, 'zm_kses') ){
              $result['controlls'][ $settingNcontroll_key ]['zm_kses'] = $controll_obj->zm_kses;
            }

          }


          //dynamic active Callback master
          if( property_exists($controll_obj, 'active_callback_master') ){

            global $zmtheme_activecallbacks;

            if( !isset( $zmtheme_activecallbacks[ $settingNcontroll_key ] ) ){

              $zmtheme_activecallbacks[ $settingNcontroll_key ] = new CustomizerActiveCallback( $settingNcontroll_key );

              if( property_exists($controll_obj, 'active_callback_value') ){

                $zmtheme_activecallbacks[ $settingNcontroll_key ]->setSettingValue( $controll_obj->active_callback_value );

              }
              if( property_exists($controll_obj, 'active_callback_value_alt_1') ){

                $zmtheme_activecallbacks[ $settingNcontroll_key ]->setSettingValueAlt1( $controll_obj->active_callback_value_alt_1 );

              }
              if( property_exists($controll_obj, 'active_callback_value_alt_2') ){

                $zmtheme_activecallbacks[ $settingNcontroll_key ]->setSettingValueAlt2( $controll_obj->active_callback_value_alt_2 );

              }

            }

          }

          //dynamic active Callback item
          if( property_exists($controll_obj, 'active_callback_item') ){

            global $zmtheme_activecallbacks;

            $newcomid = $section_id;

            //  ----> now only not _defsidebar contolls can be callback_master!!!!
            //  if will be necessary use function below, but add a new controll key-value-pair
            //  like active_callback_is_defsidebar to callback_items to use this instead of key check
            //  check if is_defsidebar, then

            /*if( strpos( $settingNcontroll_key, '_defsidebar' )  !== false ){
              $newcomid = $newcomid.'_defsidebar';
            }*/

            if( isset( $zmtheme_activecallbacks[ $newcomid.'_args_'.$controll_obj->active_callback_item ] ) ){

              //use alt callback functions..., only if alt values are set...
              $active_callback_item_functionname = 'Callback';
              if( property_exists($controll_obj, 'active_callback_item_functionname') ){
                $active_callback_item_functionname = $controll_obj->active_callback_item_functionname;
              }

              $activecallback = $zmtheme_activecallbacks[ $newcomid.'_args_'.$controll_obj->active_callback_item ];

              //$result['controlls'][ $settingNcontroll_key ]['active_callback'] = array( $activecallback, 'Callback' );
              $result['controlls'][ $settingNcontroll_key ]['active_callback'] = array( $activecallback, $active_callback_item_functionname );

            }

          }

          //if callback is set out of this scope
          if( property_exists($controll_obj, 'active_callback') ){
            $result['controlls'][ $settingNcontroll_key ]['active_callback'] = $controll_obj->active_callback;
          }


        }

        //show all fields in dev mode
        if($zmtheme['theme']->getSettingsStatus() >= 4){

          if($result['controlls'][ $settingNcontroll_key ]['type'] == 'hidden'){
            $result['controlls'][ $settingNcontroll_key ]['type'] = 'text';
          }

          //add developer section_group
          if($result['controlls'][ $settingNcontroll_key ]['description'] == NULL){

            $result['controlls'][ $settingNcontroll_key ]['description'] = '<span class="zmtoggleheaderitem '.$section_id.'-tohe-developer"></span>';
          }

          //if is not defined setting!
          if($controll_obj == NULL){
            //$result['controlls'][ $settingNcontroll_key ]['label'] = 'Hidden controll';

            $nameofhiddencontrol = $settingNcontroll_key;
            $nameofhiddencontrol = \ZMT\Theme\Helpers::transformObjectKeystoLabel($settingNcontroll_key);
            $nameofhiddencontrol = '<span class="uk-text-truncate">'.$nameofhiddencontrol.'</span>';

            $result['controlls'][ $settingNcontroll_key ]['description'] = $nameofhiddencontrol.$result['controlls'][ $settingNcontroll_key ]['description'];

          }

        }

      return $result;

    }

    public function addSelectiveRefreshRenderCallback( $result, $key, $key_pra, $key_pra_selector, $render_callback_function, $component_type ){

      //defaults
      $selector = $key_pra_selector.$key_pra.$key;
      $com_id = $key_pra.$key;
      $id = $key;
      $container_inclusive = true;
      $fallback_refresh = true;

      //cssvars exclude from refreshing modules via php... -> use jquery functions
      if($component_type == 'cssvars'){
        $fallback_refresh = false;
        $render_callback_function = NULL;
      }

      //for posts_ in lists RenderCallback reload all contained modules at once
      $posts_key = NULL;
      if( strpos( $key , 'posts_') !== false ){
        $posts_key = substr($key, 0, strpos($key, '__'));
        $selector = '.'.$posts_key.'_zmquery_id';
        $id = $posts_key;
        $render_callback_function = 'getInnerContent';
        $container_inclusive = false;
      }

      $result['selective_refresh_add_partial'][ $com_id ] = array(
        'selector' => $selector,
        'container_inclusive' => $container_inclusive,
        //'settings' => array(),//set by controll in SettingNControll
        'fallback_refresh' => $fallback_refresh
      );

      if($render_callback_function){

        $rendercallback = new CustomizerRenderCallback( $id );

        $result['selective_refresh_add_partial'][ $com_id ][ 'render_callback' ] = array( $rendercallback, $render_callback_function );

      }

      return $result;

    }

    public function addSelectiveRefreshSetting( $result, $key, $key_pra, $key_pra_selector, $setting_name ){

      $result['selective_refresh_add_partial'][ $key_pra.$key ]['selector'] = $key_pra_selector.$key_pra.$key;
      $result['selective_refresh_add_partial'][ $key_pra.$key ]['settings'][] = $setting_name;

      return $result;

    }

    public function addSelectiveRefreshSettingforExistingDefaultSettings( $result, $key, $key_pra, $key_pra_selector, $setting_name ){

      //only settings name added to partial refresh which is already created for all components
      $result['selective_refresh_add_partial'][ $key_pra.$key ]['settings'][] = $setting_name;

      return $result;

    }

    public function getSettingsNControlls( $result ){

      global $zmtheme;

      $controlls = $zmtheme['default_customizer'];

      $section_headers = $zmtheme['default_customizer_section_headers'];

      //component_settings
      foreach( $zmtheme['default_components'] as $key4 => $componentsarray){

        foreach( $componentsarray as $key5 => $component){

          if( is_object( $component ) ){

            $com_id = $key4.'__'.$key5;

            $com_lock_status = false;
            if( method_exists( $zmtheme[ $com_id ], 'getComLockStatus' ) ){
              $com_lock_status = $zmtheme[ $com_id ]->getComLockStatus();
            }

            $com_status = '1';
            if( method_exists( $zmtheme[ $com_id ], 'getComStatus' ) ){
              $com_status = $zmtheme[ $com_id ]->getComStatus();
            }
            if( $com_status == '1' && $com_lock_status == false ){

              $com_key = 'com_'.$key5;
              //shorten __1 / __n from key for controlls
              if(strpos($com_key, '__') !== false){
                $com_key = substr($com_key, 0, strpos($com_key, "__"));
              }
              $component_type = NULL;
              if(property_exists( $component, 'type' )){
                $component_type = strtolower($component->type);
              }
              if(property_exists($controlls, $com_key) == false){
                $com_key = 'com_'.$component_type;
              }

            /**
              * initiate RenderCallback by Section Object
              */
              $result = $this->addSelectiveRefreshRenderCallback(
                $result,
                $com_id,
                'com_id_',
                '.',
                'getModule',
                $component_type //--> modCssVars is excluded from php partial refresh...
              );

              if( method_exists( $zmtheme[ $com_id ], 'getViewStatusFieldName' ) ){

                if( !property_exists( $component, 'view_status_hidden' ) || $component->view_status_hidden !== 1 ){

                  //if($key4 == 'sections' && property_exists( $component, 'type' ) == false){
                  if( property_exists( $component, 'type' ) && $component->type == 'Section' ){

                     /**
                       * Create "setting" and "controll" for view_status
                       */
                        $view_status_controlls_obj = NULL;
                        if( property_exists($controlls, 'view_status') && is_object($controlls->view_status) ){
                          $view_status_controlls_obj = $controlls->view_status;
                        }
                        $result = $this->SettingNControll(
                          $result,
                          $com_id,
                          $zmtheme[ $com_id ]->getViewStatusFieldName(),
                          $zmtheme[ $com_id ]->getViewStatusDefaultValue(),
                          $view_status_controlls_obj,
                          'com_id_' //for selective refresh if NULL no selective refresh!
                        );

                      /**
                        * ViewStatusCallback to show / hide condition controlls dynamically!
                        */
                        $activecallback = new CustomizerActiveCallback( $zmtheme[ $com_id ]->getViewStatusFieldName() );
                        $activecallback->setSettingValue('2');
                        $activecallback->setSettingValueAlt1('3');
                      /**
                        * Create "setting" and "controll" for conditions array
                        */
                        $view_conditions_controlls_obj = NULL;
                        if( property_exists($controlls, 'view_conditions') && is_object($controlls->view_conditions) ){
                          $view_conditions_controlls_obj = $controlls->view_conditions;
                        }

                        $view_conditions_controlls_obj->active_callback = array( $activecallback, 'ViewStatusCallback' );

                        $result = $this->SettingNControll(
                          $result,
                          $com_id,
                          $zmtheme[ $com_id ]->getViewConditionsFieldName(),
                          $zmtheme[ $com_id ]->getViewConditionsDefaultValue(),
                          $view_conditions_controlls_obj,
                          'com_id_' //for selective refresh if NULL no selective refresh!
                        );

                  } else {

                    if(property_exists($controlls, $com_key)){

                      if(!property_exists($controlls->$com_key, 'view_status_access_level') || $zmtheme['theme']->getSettingsStatus() >= $controlls->$com_key->view_status_access_level ){

                      /**
                        * Create "setting" and "controll" for view_status
                        */
                         $view_status_controlls_obj = NULL;
                         if( property_exists($controlls, 'module_view_status') && is_object($controlls->module_view_status) ){
                           $view_status_controlls_obj = $controlls->module_view_status;
                         }
                         $result = $this->SettingNControll(
                           $result,
                           $com_id,
                           $zmtheme[ $com_id ]->getViewStatusFieldName(),
                           $zmtheme[ $com_id ]->getViewStatusDefaultValue(),
                           $view_status_controlls_obj,
                           'com_id_'
                         );

                       }

                     }

                  }

                }

              }

            /**
              * section_headers
              */
              foreach($section_headers as $headers_key => $headers_controlls_obj){

                $headers_controlls_obj->input_attrs['com_id'] = $com_id;
                $headers_controlls_obj->input_attrs['section_group'] = $headers_key;

                //add customizer accordion style menu headery...
                $result = $this->SettingNControll(
                  $result,
                  $com_id,
                  $com_id.'_zmtoggleheader_'.$headers_key,
                  NULL,
                  $headers_controlls_obj
                );

              }




            /**
              * Create "setting" and "controll" foreach args components or modules
              */
             if( array_key_exists( $com_id, $zmtheme ) ){
                $args = $zmtheme[ $com_id ]->getArgs();

                foreach( $args as $key6 => $arg){

                  $controlls_obj = NULL;

                  //checks for key6 eg. "container_class"
                  if( property_exists($controlls, $key6) && is_object($controlls->$key6) ){

                    $controlls_obj = $controlls->$key6;

                  }

                  //overwrites standard $controlls_obj if there is specific com object
                  if( property_exists($controlls, $com_key) && is_object($controlls->$com_key) ){

                    if( property_exists($controlls->$com_key, $key6) && ( is_array($controlls->$com_key->$key6) || is_object($controlls->$com_key->$key6) ) ){

                      //make object out of array!!! SettingNControll needs a "controll" object
                      $controlls_obj = (object) $controlls->$com_key->$key6;

                    }

                  }

                  if ( property_exists( $component, 'args_choices' ) && is_array( $component->args_choices ) ){

                    if ( array_key_exists($key6,  $component->args_choices ) && is_array( $component->args_choices[$key6] ) ) {

                      $controlls_obj->choices = $component->args_choices[$key6];

                    }

                  }



                  $result = $this->SettingNControll(
                    $result,
                    $com_id,
                    $zmtheme[ $com_id ]->getArgFieldName( $key6 ),
                    $zmtheme[ $com_id ]->getArgDefaultValue( $key6 ),
                    $controlls_obj,
                    'com_id_'
                  );





                }

                //moved one {} out
                if($component_type == 'menu'){

                  ////not working with partial refresh, because nav_menu forces full refresh!!!!!!!!!!!
                  ////see here reason why: https://developer.wordpress.org/reference/classes/wp_customize_nav_menus/filter_wp_nav_menu_args/
                  ////--> can_partial_refresh in xhr response in customizer ...
                  ////maybe solution: https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_nav_menu_args
                  ////need to overwrite full refresh of nav_menu...
                  if( $zmtheme[ $com_id ]->getMenuIdbyLocation() ){

                    //does add selective partial refresh via menu module, but not working because full refresh is forced by wp_nav_menu
                    $result = $this->addSelectiveRefreshSettingforExistingDefaultSettings(
                      $result,
                      $com_id,
                      'com_id_',
                      '.',
                      'nav_menu['.$zmtheme[ $com_id ]->getMenuIdbyLocation().']'
                    );

                    //nav_menu_item-1323 single menu item --> same problem
                    /*$result = $this->addSelectiveRefreshSetting(
                      $result,
                      $com_id,
                      //'menu_id_',
                      'com_id_',
                      '.',
                      'nav_menu_item[1323]'
                    );*/

                    }



                }

                //will run twice if there is more than one logo object in theme_components
                //not --> logo is cssvar type! only once usually
                if($component_type == 'logo'){

                  //connect selectiverefresh with logo modul
                  global $wp_customize;

                  $wp_customize->get_setting( 'custom_logo' )->transport = 'postMessage';
                  $result = $this->addSelectiveRefreshSettingforExistingDefaultSettings(
                    $result,
                    $com_id,
                    'com_id_',
                    '.',
                    'custom_logo'
                  );
                  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
                  $result = $this->addSelectiveRefreshSettingforExistingDefaultSettings(
                    $result,
                    $com_id,
                    'com_id_',
                    '.',
                    'blogname'
                  );
                  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
                  $result = $this->addSelectiveRefreshSettingforExistingDefaultSettings(
                    $result,
                    $com_id,
                    'com_id_',
                    '.',
                    'blogdescription'
                  );
                  $wp_customize->get_setting( 'header_text' )->transport = 'postMessage';
                  $result = $this->addSelectiveRefreshSettingforExistingDefaultSettings(
                    $result,
                    $com_id,
                    'com_id_',
                    '.',
                    'header_text'
                  );

                }  //only com logo!


              }


            /**
              * Create "setting" and "controll" foreach args of comSidebar.php
              */
              if( array_key_exists( $com_id.'_defsidebar', $zmtheme ) ){
                $sidebar_args = $zmtheme[ $com_id.'_defsidebar' ]->getArgs();

                foreach( $sidebar_args as $sid_key => $sidebar_arg){

                  $controlls_obj = NULL;
                  if( property_exists($controlls, $sid_key) && is_object($controlls->$sid_key) ){
                    $controlls_obj = $controlls->$sid_key;
                  }

                  //overwrites standard $controlls_obj if there is specific com object
                  if( property_exists($controlls, $com_key) && is_object($controlls->$com_key) ){

                    if( property_exists($controlls->$com_key, $sid_key) && ( is_array($controlls->$com_key->$sid_key) || is_object($controlls->$com_key->$sid_key) ) ){

                      //make object out of array!!! SettingNControll needs a "controll" object
                      $controlls_obj = (object) $controlls->$com_key->$sid_key;

                    }

                  }

                  $result = $this->SettingNControll(
                    $result,
                    $com_id,
                    $zmtheme[ $com_id.'_defsidebar' ]->getArgFieldName( $sid_key ),
                    $zmtheme[ $com_id.'_defsidebar' ]->getArgDefaultValue( $sid_key ),
                    $controlls_obj,
                    'com_id_'
                  );

                }

              }

            }//com_status

          }

        }

      }

      return $result;

    }

}
