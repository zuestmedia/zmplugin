<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

use ZMT\Theme\Namespaces;
use ZMT\Theme\Build;

class BuildObject extends \ZMP\Plugin\ExtendPresets {

  function __construct(){

    parent::__construct();

  /**
    * Define Namespace and Alt-Namespaces
    */
    $n = new Namespaces( '\ZMP\Plugin\Config\ZMTheme\Presets\\', '\ZMP\Pro\Config\ZMTheme\Presets\\' );

  /**
    * use Build::newClass to dynamically overwrite default classes
    * default result: $this->section = new section();
    */
    $this->archivecontainer =  Build::newClass( $n->getClass('archivecontainer') );

    $this->archivetitle =  Build::newClass( $n->getClass('archivetitle') );
    $this->archivedescription =  Build::newClass( $n->getClass('archivedescription') );


    $this->articlecontainer =  Build::newClass( $n->getClass('articlecontainer') );

    $this->articlelistcontainer =  Build::newClass( $n->getClass('articlelistcontainer') );



    $this->sections =  Build::newClass( $n->getClass('sections') );

    $this->content =  Build::newClass( $n->getClass('content') );

    $this->main =  Build::newClass( $n->getClass('main') );



    $this->image =  Build::newClass( $n->getClass('image') );
    $this->the_content =  Build::newClass( $n->getClass('the_content') );


    $this->menu =  Build::newClass( $n->getClass('menu') );

    $this->navcontainer =  Build::newClass( $n->getClass('navcontainer') );
    $this->navcontainer_inner =  Build::newClass( $n->getClass('navcontainer_inner') );

    $this->site_logo =  Build::newClass( $n->getClass('site_logo') );

    $this->search =  Build::newClass( $n->getClass('search') );

    $this->offcanvas_toggle =  Build::newClass( $n->getClass('offcanvas_toggle') );

    $this->blocks =  Build::newClass( $n->getClass('blocks') );

    $this->offcanvascontainer =  Build::newClass( $n->getClass('offcanvascontainer') );

    $this->queryterm =  Build::newClass( $n->getClass('queryterm') );


    $this->section_blocks =  Build::newClass( $n->getClass('section_blocks') );
    $this->section_html =  Build::newClass( $n->getClass('section_html') );
    $this->section_nav =  Build::newClass( $n->getClass('section_nav') );
    $this->section_offcanvas =  Build::newClass( $n->getClass('section_offcanvas') );
    $this->section_queryloop =  Build::newClass( $n->getClass('section_queryloop') );

    $this->custom_blocks =  Build::newClass( $n->getClass('custom_blocks') );
    $this->custom_container =  Build::newClass( $n->getClass('custom_container') );
    $this->custom_html =  Build::newClass( $n->getClass('custom_html') );
    $this->custom_nav =  Build::newClass( $n->getClass('custom_nav') );
    $this->custom_queryloop =  Build::newClass( $n->getClass('custom_queryloop') );

    $this->separator =  Build::newClass( $n->getClass('separator') );







  }

}
