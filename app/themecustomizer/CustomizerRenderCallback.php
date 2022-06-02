<?php

namespace ZMP\Plugin\ThemeCustomizer;

class CustomizerRenderCallback {

  /**
   * Creates a RenderCallback
   */

  /**
    * Element ID
    * @var string
    * @access private
    */
    private $id;

  /**
    * Construct Function
    */
    function __construct( $id ){

      $this->id = $id;

    }

  /**
    * ID Getters n Setters
    */
    public function setId( $id ) {

      $this->id = $id;

    }
    public function getId() {

      return $this->id;

    }

  /**
    * reload whole posts list when editing modules of archive, queryloop, section w queryloop
    * 'posts__' & 'posts_xy__' in mainquery and custom queryloops!
    * result: module_id = parent container loop items, eg 'home__articlelistcontainer'
    *  --> connected with customizer via selective_refresh_add_partial
    *  --> connected with templateparts for global vars
    *
    */
    public function getInnerContent() {

      global $zmtheme;

      //preload & prerender modules to get global vars of zmrendercallbackloopobj
      //thats shitty... change when possible somehow...
      //but better than reloading whole header and footer with scripts...
      $zmtheme[ 'header__sections' ]->getModule();
      $zmtheme[ 'center__sections' ]->getModule();
      $zmtheme[ 'footer__sections' ]->getModule();

      if( array_key_exists( 'zmrendercallbackloopobj', $zmtheme ) ){

        $queryloop = $zmtheme['zmrendercallbackloopobj'];

        //reload whole page, if has more than one of the same posttypes obj on same page!!! then no errors when reloading all at once
        //so same posts_ objects can have differen query eg 1x news 1x latest posts 1x comments in same style...
        if( count( array_keys( $queryloop, $this->getId() ) ) > 1 ){

            //if has more than one value for this posts_ object (id) return false, so whole page reloads with default behavior: requestFullRefresh()
            return false;

        }

        if( in_array( $this->getId() , $queryloop ) ){

          $module_id = array_search( $this->getId(), $queryloop ) ;

        }

      }

      return $zmtheme[ $module_id ]->getInnerContent();

    }

    public function getModule() {

      global $zmtheme;

      return $zmtheme[ $this->getId() ]->getModule();

    }


}
