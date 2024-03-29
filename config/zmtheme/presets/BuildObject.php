<?php

namespace ZMP\Plugin\Config\ZMTheme\Presets;

use ZMT\Theme\Namespaces;
use ZMT\Theme\Build;

class BuildObject extends \ZMP\Plugin\ExtendPresets {

  public $archivecontainer;
  public $archivetitle;
  public $archivedescription;
  public $articlelistcontainer;

  public $articlecontainer;
  
  public $sections;
  public $content;
  public $main;
  
  public $image;
  public $the_content;

  public $navcontainer;
  public $navcontainer_inner;
    public $site_logo;
    public $menu;
    public $offcanvas_toggle;
    public $search;
    public $widget;

  public $offcanvascontainer;

  public $postmeta;
  public $queryterm;

  public $colors;
  public $body;
  public $heading;
  public $logo;
  public $navbar;

  public $section_nav;
  public $section_block_template;
  public $section_widget;
  public $section_queryloop;
  public $section_html;
  public $section_offcanvas;
  
  public $custom_container;
  public $custom_widget;
  public $custom_block_template;
  public $custom_html;
  public $custom_nav;
  public $custom_queryloop;

  public $separator;


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
    $this->articlelistcontainer =  Build::newClass( $n->getClass('articlelistcontainer') );

    $this->articlecontainer =  Build::newClass( $n->getClass('articlecontainer') );

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

    $this->widget =  Build::newClass( $n->getClass('widget') );

    $this->offcanvascontainer =  Build::newClass( $n->getClass('offcanvascontainer') );

    $this->postmeta =  Build::newClass( $n->getClass('postmeta') );
    $this->queryterm =  Build::newClass( $n->getClass('queryterm') );

    $this->colors  =  Build::newClass( $n->getClass('colors') );
    $this->body    =  Build::newClass( $n->getClass('body') );
    $this->heading =  Build::newClass( $n->getClass('heading') );
    $this->logo    =  Build::newClass( $n->getClass('logo') );
    $this->navbar  =  Build::newClass( $n->getClass('navbar') );

    $this->section_widget =  Build::newClass( $n->getClass('section_widget') );
    $this->section_block_template =  Build::newClass( $n->getClass('section_block_template') );
    $this->section_html =  Build::newClass( $n->getClass('section_html') );
    $this->section_nav =  Build::newClass( $n->getClass('section_nav') );
    $this->section_offcanvas =  Build::newClass( $n->getClass('section_offcanvas') );
    $this->section_queryloop =  Build::newClass( $n->getClass('section_queryloop') );

    $this->custom_widget =  Build::newClass( $n->getClass('custom_widget') );
    $this->custom_block_template =  Build::newClass( $n->getClass('custom_block_template') );
    $this->custom_container =  Build::newClass( $n->getClass('custom_container') );
    $this->custom_html =  Build::newClass( $n->getClass('custom_html') );
    $this->custom_nav =  Build::newClass( $n->getClass('custom_nav') );
    $this->custom_queryloop =  Build::newClass( $n->getClass('custom_queryloop') );

    $this->separator =  Build::newClass( $n->getClass('separator') );







  }

}
