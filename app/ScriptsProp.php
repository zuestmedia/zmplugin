<?php

namespace ZMP\Plugin;

class ScriptsProp extends Scripts {

    private $css_prop_array = NULL;
    private $js_prop_array = NULL;

  /**
    * Construct Function
    * Slug is required
    */
    function __construct( $plugin_folder_url, $version = '1.0.0' ){

      $this->setPluginFolderUrl($plugin_folder_url);
      $this->setVersion($version);

    }

    /**
     * Get Proprietary CSS array
     * @return array
     */
    public function getCssPropArray() {

        return $this->css_prop_array;

    }

    /**
     * Set Proprietary CSS array
     * @param array $css_prop_array
     */
    public function setCssPropArray($css_prop_array) {

        $this->css_prop_array = $css_prop_array;

    }

    /**
     * Get Proprietary JS array
     * @return array
     */
    public function getJsPropArray() {

        return $this->js_prop_array;

    }

    /**
     * Set Proprietary JS array
     * @param array $js_prop_array
     */
    public function setJsPropArray($js_prop_array) {

        $this->js_prop_array = $js_prop_array;

    }

    /**
     * Enqueue Css Array
     */
    public function EnqueueCssArray() {

    /**
    * Checks for loading Css
    */
    if($this->getCssPropArray()) {

        foreach($this->getCssPropArray() as $innerarray) {

          if( array_key_exists ('css_slug', $innerarray) ) {

            if(array_key_exists ('css_url', $innerarray)) { $css_url = $this->getPluginFolderUrl().$innerarray['css_url']; } else { $css_url = NULL; }
            if(array_key_exists ('css_deps',$innerarray)) { $css_deps = $innerarray['css_deps']; } else { $css_deps = NULL; }
            if(array_key_exists ('css_ver',$innerarray)) { $css_ver = $innerarray['css_ver']; } else { $css_ver = $this->getVersion(); }
            if(array_key_exists ('css_media',$innerarray)) { $css_media = $innerarray['css_media']; } else { $css_media = NULL; }

            //Call to static function... (wäre auch mit this möglich, aber so korrekter)
            //self::EnqueueStyle($innerarray['css_slug'],$css_url,$css_deps,$css_ver,$css_media);
            $this->EnqueueStyle($innerarray['css_slug'],$css_url,$css_deps,$css_ver,$css_media);

          }

        }

      }

    }

    /**
     * Enqueue Js Array
     */
    public function EnqueueJsArray() {

      /**
      * Checks for loading JS
      */
      if($this->getJsPropArray()) {

        foreach($this->getJsPropArray() as $innerarray) {

          if( array_key_exists ('js_slug',$innerarray) ) {

            if(array_key_exists ('js_url',$innerarray)) { $js_url = $this->getPluginFolderUrl().$innerarray['js_url']; } else { $js_url = NULL; }
            if(array_key_exists ('js_deps',$innerarray)) { $js_deps = $innerarray['js_deps']; } else { $js_deps = NULL; }
            if(array_key_exists ('js_ver',$innerarray)) { $js_ver = $innerarray['js_ver']; } else { $js_ver = $this->getVersion(); }
            if(array_key_exists ('js_in_footer',$innerarray)) { $js_in_footer = $innerarray['js_in_footer']; } else { $js_in_footer = NULL; }

            //Call to static function... (wäre auch mit this möglich, aber so korrekter)
            //self::EnqueueScript($innerarray['js_slug'],$js_url,$js_deps,$js_ver,$js_in_footer);
            $this->EnqueueScript($innerarray['js_slug'],$js_url,$js_deps,$js_ver,$js_in_footer);

          }

        }

      }

    }


  /**
    * addApp Proprietary CSS and Javascript
    * @param string $js_prop
    */
    public function addProp(){

      add_action( 'wp_enqueue_scripts', array( $this, 'EnqueueCssArray' )  );
      add_action( 'wp_enqueue_scripts', array( $this, 'EnqueueJsArray' )  );

    }

  /**
    * Customizer Controlls Add Assets
    */
    public function addPropCustomizerControls(){

      add_action( 'customize_controls_enqueue_scripts', array( $this, 'EnqueueCssArray' )  );
      add_action( 'customize_controls_enqueue_scripts', array( $this, 'EnqueueJsArray' )  );

      //this would be later --> https://github.com/WordPress/wordpress-develop/blob/5.8.1/src/wp-admin/customize.php#L174
      /*add_action( 'customize_controls_print_scripts', array( $this, 'EnqueueCssArray' )  );
      add_action( 'customize_controls_print_scripts', array( $this, 'EnqueueJsArray' )  );*/

    }

  /**
    * Customizer Preview Add Assets
    * works same as wp_enqueue_scripts!!
    */
    public function addPropCustomizerPreview(){

      add_action( 'customize_preview_init', array( $this, 'EnqueueCssArray' )  );
      add_action( 'customize_preview_init', array( $this, 'EnqueueJsArray' )  );

    }

  /**
    * Admin Page Add Assets
    */
    public function addPropAdminPage(){

      add_action( 'admin_enqueue_scripts', array( $this, 'EnqueueCssArray' )  );
      add_action( 'admin_enqueue_scripts', array( $this, 'EnqueueJsArray' )  );

    }

  /**
    * Login Page Add Assets
    */
    public function addPropLoginPage(){

      add_action( 'login_enqueue_scripts', array( $this, 'EnqueueCssArray' )  );
      add_action( 'login_enqueue_scripts', array( $this, 'EnqueueJsArray' )  );

    }


}
