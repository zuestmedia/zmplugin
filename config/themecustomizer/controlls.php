<?php

namespace ZMP\Plugin\Config\ThemeCustomizer;

use ZMT\Theme\Namespaces;
use ZMT\Theme\Build;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_element;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_wrap;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_slug;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_textarea;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_attrs;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_attrs_grid;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_attrs_height;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_attrs_navbar;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_attrs_scrollspy_animation;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_attrs_sticky;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_visibility;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_section;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_container;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_background_status;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_background_url;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_background_featured;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_background_image;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_background_image_size;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_background_img;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_background_pos;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_background_mods;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_width;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_grid_mods;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_flex_order;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_flex_horizontal;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_flex_vertical;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_card_color_background;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_card_body;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_card_helpers;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_color_background;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_color_helpers;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_skewy;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_title;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_navbar_item_pos;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_text_helpers;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_text_helpers_string;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_text_align;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_align;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_margin_vertical;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_child_width;

use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_image_background_color;
use ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_image_container_size;


class controlls extends \ZMP\Plugin\ExtendControlls {

  function __construct(){

    parent::__construct();

    $n = new Namespaces( '\ZMP\Plugin\Config\ThemeCustomizer\Controlls\\', '\ZMP\Pro\Config\ThemeCustomizer\Controlls\\' );

  /**
    * com_'s Are Groups of controlls
    * Checks: first is general, second is more specific (all sections), third is only valid in this group (only in colors)
    * each customizer theme_mod controll loops through 3 checks
    * first check = single theme_mod key,               eg: gridchild_class
    * second check = type, --> overwrites first         eg: (com_) section (=type)
    * third check = objectkey --> overwrites second     eg: (com_) colors (=objectkey)
    */

    //com group: globals
    //cssvars (complete objects)
    $this->com_colors =               Build::newClass( $n->getClass('com_colors') );
    $this->com_body =                 Build::newClass( $n->getClass('com_body') );
    $this->com_heading =              Build::newClass( $n->getClass('com_heading') );
    $this->com_logo =                 Build::newClass( $n->getClass('com_logo') );
    $this->com_navbar =               Build::newClass( $n->getClass('com_navbar') );

    $this->com_search =               Build::newClass( $n->getClass('com_search') );
    $this->com_powered =              Build::newClass( $n->getClass('com_powered') );
    $this->com_editlink =             Build::newClass( $n->getClass('com_editlink') );
    $this->com_errorpage =            Build::newClass( $n->getClass('com_errorpage') );

    //com group: section
    $this->com_section =              Build::newClass( $n->getClass('com_section') );

    $this->com_section_widget =          Build::newClass( $n->getClass('com_section_widget') );
    $this->com_section_block_template =  Build::newClass( $n->getClass('com_section_block_template') );
    $this->com_section_html =            Build::newClass( $n->getClass('com_section_html') );
    $this->com_section_nav =             Build::newClass( $n->getClass('com_section_nav') );
    $this->com_section_offcanvas =       Build::newClass( $n->getClass('com_section_offcanvas') );
    $this->com_section_queryloop =       Build::newClass( $n->getClass('com_section_queryloop') );
    $this->com_section_extensions =      Build::newClass( $n->getClass('com_section_extensions') );

    $this->com_main_section_widget =          Build::newClass( $n->getClass('com_main_section_widget') );
    $this->com_main_section_block_template =  Build::newClass( $n->getClass('com_main_section_block_template') );
    $this->com_main_section_html =            Build::newClass( $n->getClass('com_main_section_html') );
    $this->com_main_section_nav =             Build::newClass( $n->getClass('com_main_section_nav') );
    $this->com_main_section_offcanvas =       Build::newClass( $n->getClass('com_main_section_offcanvas') );
    $this->com_main_section_queryloop =       Build::newClass( $n->getClass('com_main_section_queryloop') );
    $this->com_main_section_extensions =      Build::newClass( $n->getClass('com_main_section_extensions') );

    $this->com_content_section_widget =          Build::newClass( $n->getClass('com_content_section_widget') );
    $this->com_content_section_block_template =  Build::newClass( $n->getClass('com_content_section_block_template') );
    $this->com_content_section_html =            Build::newClass( $n->getClass('com_content_section_html') );
    $this->com_content_section_nav =             Build::newClass( $n->getClass('com_content_section_nav') );
    $this->com_content_section_offcanvas =       Build::newClass( $n->getClass('com_content_section_offcanvas') );
    $this->com_content_section_queryloop =       Build::newClass( $n->getClass('com_content_section_queryloop') );
    $this->com_content_section_extensions =      Build::newClass( $n->getClass('com_content_section_extensions') );

    $this->com_custom_container =      Build::newClass( $n->getClass('com_custom_container') );
    $this->com_custom_widget =         Build::newClass( $n->getClass('com_custom_widget') );
    $this->com_custom_block_template = Build::newClass( $n->getClass('com_custom_block_template') );
    $this->com_custom_html =           Build::newClass( $n->getClass('com_custom_html') );
    $this->com_custom_nav =            Build::newClass( $n->getClass('com_custom_nav') );
    $this->com_custom_queryloop =      Build::newClass( $n->getClass('com_custom_queryloop') );

    //center sortable-sections-containers
    $this->com_main =                 Build::newClass( $n->getClass('com_main') );
    $this->com_content =              Build::newClass( $n->getClass('com_content') );

    //com groups: nav
    $this->com_navcontainer =         Build::newClass( $n->getClass('com_navcontainer') );
    $this->com_navcontainer_inner =   Build::newClass( $n->getClass('com_navcontainer_inner') );
    $this->com_menu =                 Build::newClass( $n->getClass('com_menu') );
    $this->com_widget =               Build::newClass( $n->getClass('com_widget') );
    $this->com_site_logo =            Build::newClass( $n->getClass('com_site_logo') );
    $this->com_offcanvas_toggle =     Build::newClass( $n->getClass('com_offcanvas_toggle') );

    $this->com_offcanvascontainer =   Build::newClass( $n->getClass('com_offcanvascontainer') );

    //com groups: comments
    $this->com_comments =             Build::newClass( $n->getClass('com_comments') );
    $this->com_commentscontainer =    Build::newClass( $n->getClass('com_commentscontainer') );
    $this->com_commentslist =         Build::newClass( $n->getClass('com_commentslist') );
    $this->com_commentsform =         Build::newClass( $n->getClass('com_commentsform') );
    $this->com_commentspagination =   Build::newClass( $n->getClass('com_commentspagination') );

    //archive & post com groups
    $this->com_template =             Build::newClass( $n->getClass('com_template') );

    $this->com_archivecontainer =     Build::newClass( $n->getClass('com_archivecontainer') );
    $this->com_archivetitle =         Build::newClass( $n->getClass('com_archivetitle') );
    $this->com_archivedescription =   Build::newClass( $n->getClass('com_archivedescription') );
    $this->com_articlelistcontainer = Build::newClass( $n->getClass('com_articlelistcontainer') );

    $this->com_articlecontainer =     Build::newClass( $n->getClass('com_articlecontainer') );
    $this->com_title =                Build::newClass( $n->getClass('com_title') );
    $this->com_the_content =          Build::newClass( $n->getClass('com_the_content') );
    $this->com_image =                Build::newClass( $n->getClass('com_image') );

    $this->com_date =                 Build::newClass( $n->getClass('com_date') );
    $this->com_authorlink =           Build::newClass( $n->getClass('com_authorlink') );
    $this->com_commentscounter =      Build::newClass( $n->getClass('com_commentscounter') );

    $this->com_taxonomyterms =        Build::newClass( $n->getClass('com_taxonomyterms') );

    $this->com_postmeta =             Build::newClass( $n->getClass('com_postmeta') );

    $this->com_queryterm =             Build::newClass( $n->getClass('com_queryterm') );

    $this->com_readmore =             Build::newClass( $n->getClass('com_readmore') );
    $this->com_separator =            Build::newClass( $n->getClass('com_separator') );
    $this->com_pagination =           Build::newClass( $n->getClass('com_pagination') );

    $this->com_linkpages =            Build::newClass( $n->getClass('com_linkpages') );
    $this->com_articlelinks =         Build::newClass( $n->getClass('com_articlelinks') );
    $this->com_authorbox =            Build::newClass( $n->getClass('com_authorbox') );

  /**
    * Single controlls
    * - Extends BuildSingleControll
    * - can have __construct args
    *   --> ($priority,$access_level,$section_group,$key,$active_callback_item,$label)
    */

  /// 1. section controlls
  /// -------------------

  /**
    * section: gridchild      0-19
    */
    $this->gridchild_element =                       new _element(10,4,NULL,'gridchild');
    $this->gridchild_class =                         new _class(11,3,NULL,'gridchild','gridchild_element');

    $this->gridchild_class_visibility =              new _class_visibility(2,2,'settings','default');//in settings!

    $this->gridchild_class_width =                   new _class_width(11,2,'module','default','gridchild_element');
    $this->gridchild_class_flex_order =              new _class_flex_order(12,2,'module','default','gridchild_element');

  /**
    * section: section       20-59
    */
    $this->section_element =                         new _element(20,4,NULL,'section');
    $this->section_class =                           new _class(23,3,NULL,'section','section_element');
    $this->section_class_disabled =                  new _class(71,4,'developer','disabled','section_element');
    $this->section_attrs =                           new _attrs(26,4,NULL,'section','section_element');

    $this->section_class_visibility =                new _class_visibility(2,2,'settings','default');//in settings!

    $this->section_class_color_background =          new _class_color_background(20,2,'module','default','section_element');
    $this->section_class_color_helpers =             new _class_color_helpers(21,2,'module','default','section_element');

    $this->section_class_skewy =                     new _class_skewy(22,4,'module','default','section_element');

    $this->section_background_status =               new _background_status(23,2,'module','default','section_element');

      $this->section_background_image =              new _background_image(23,2,'module','default','section_background_status'); //only showing if status = file
      $this->section_background_url =                new _background_url(23,2,'module','default','section_background_status'); //only showing if status = url

      //showing if status not NULL
      $this->section_background_featured =           new _background_featured(23,2,'module','default','section_background_status');
      $this->section_class_background_img =          new _class_background_img(24,2,'module','default','section_background_status');
      $this->section_background_image_size =         new _background_image_size(23,2,'module','default','section_background_status');
      $this->section_class_background_pos =          new _class_background_pos(25,2,'module','default','section_background_status');
      $this->section_class_background_mods =         new _class_background_mods(26,2,'module','default','section_background_status');

    $this->section_attrs_sticky =                    new _attrs_sticky(27,2,'module','default','section_element');

    $this->section_attrs_height =                    new _attrs_height(28,2,'module','default','section_element');
      $this->section_class_flex_vertical =           new _class_flex_vertical(29,2,'module','default','section_attrs_height');

    $this->section_class_section =                   new _class_section(30,2,'module','default','section_element');

    //special cases: main- & inner-sections
    $this->section_class_card_body =                 new _class_card_body(30,2,'module','default','section_element');
    //module margin and text align helpers
    $this->section_class_card_helpers =              new _class_card_helpers(30,2,'module','default','section_element');
    $this->section_class_margin_vertical =           new _class_margin_vertical(30,2,'module','default','section_element');

  /**
    * section: container      60-69
    */
    $this->container_element =                       new _element(30,4,NULL,'container');
    $this->container_class =                         new _class(31,3,NULL,'container','container_element');
    $this->container_attrs =                         new _attrs(33,4,NULL,'container','container_element');//not in use yet

    $this->container_class_container =               new _class_container(35,2,'module','default','container_element');

  /**
    * section: grid           70-89
    */
    $this->grid_wrap =                               new _wrap(44,4,NULL,'grid','grid_element');

    $this->grid_element =                            new _element(40,4,NULL,'grid');
    $this->grid_class =                              new _class(41,3,NULL,'grid','grid_element');
    $this->grid_attrs =                              new _attrs(43,4,NULL,'grid','grid_element');

    $this->grid_attrs_grid =                         new _attrs_grid(42,4,NULL,'default','grid_element');
      $this->grid_class_child_width =                new _class_child_width(43,2,'module','default','grid_attrs_grid');
      $this->grid_class_grid_mods =                  new _class_grid_mods(44,2,'module','default','grid_attrs_grid');
      $this->grid_attrs_scrollspy_animation =        new _attrs_scrollspy_animation(44,2,'module','default','grid_attrs_grid');


  /// 2. module controlls
  /// -------------------

  /**
    * module: moduleouter    0-29
    */
    $this->moduleouter_element =                     new _element(60,4,NULL,'moduleouter');
    $this->moduleouter_class =                       new _class(61,3,NULL,'moduleouter','moduleouter_element');
    $this->moduleouter_attrs =                       new _attrs(62,4,NULL,'moduleouter','moduleouter_element');//newwww

    $this->moduleouter_class_visibility =            new _class_visibility(2,2,'settings','default');//in settings!

    //moduleouter gridchild
    $this->moduleouter_class_width =                 new _class_width(11,2,'module','default','moduleouter_element');
    $this->moduleouter_class_flex_order =            new _class_flex_order(12,2,'module','default','moduleouter_element');

    //moduleouter margin and text align helpers
    $this->moduleouter_class_margin_vertical =       new _class_margin_vertical(20,2,'module','default','moduleouter_element');
    $this->moduleouter_class_text_align =            new _class_text_align(21,2,'module','default','moduleouter_element');

    //ContainerSortableMain & ContainerSortableErrorPage
    $this->moduleouter_class_color_background =      new _class_color_background(20,2,'module','default','moduleouter_element');
    $this->moduleouter_class_color_helpers =         new _class_color_helpers(21,2,'module','default','moduleouter_element');

      $this->moduleouter_background_status =         new _background_status(22,2,'module','default','moduleouter_element');

        $this->moduleouter_background_url =          new _background_url(22,2,'module','default','moduleouter_background_status');
        $this->moduleouter_background_image =        new _background_image(22,2,'module','default','moduleouter_background_status');

        $this->moduleouter_background_featured =     new _background_featured(22,2,'module','default','moduleouter_background_status');
        $this->moduleouter_background_image_size =   new _background_image_size(23,2,'module','default','moduleouter_background_status');
        $this->moduleouter_class_background_img =    new _class_background_img(24,2,'module','default','moduleouter_background_status');
        $this->moduleouter_class_background_pos =    new _class_background_pos(25,2,'module','default','moduleouter_background_status');
        $this->moduleouter_class_background_mods =   new _class_background_mods(26,2,'module','default','moduleouter_background_status');

    $this->moduleouter_class_section =               new _class_section(29,2,'module','default','moduleouter_element');


  /**
    * module: module        30-59
    */
    $this->module_wrap =                             new _wrap(72,4,NULL,'module','module_element');//newwww

    $this->module_element =                          new _element(70,4,NULL,'module');
    $this->module_class =                            new _class(71,3,NULL,'module','module_element');
    $this->module_class_disabled =                   new _class(71,4,'developer','disabled','module_element');
    $this->module_attrs =                            new _attrs(72,4,NULL,'module','module_element');//newwww

    $this->module_class_visibility =                 new _class_visibility(2,2,'settings','default');//in settings!


    //default container settings = color & card
    $this->module_class_color_background =           new _class_color_background(70,2,'module','default','module_element');
    $this->module_class_color_helpers =              new _class_color_helpers(71,2,'module','default','module_element');

    $this->module_class_card_body =                  new _class_card_body(72,2,'module','default','module_element');
    $this->module_class_card_helpers =               new _class_card_helpers(73,2,'module','default','module_element');

    //NavabarItems
    $this->module_class_navbar_item_pos =            new _class_navbar_item_pos(36,2,'module','default','module_element');
    $this->module_class_flex_horizontal =            new _class_flex_horizontal(37,2,'module','navbar','module_element');
    $this->module_class_width =                      new _class_width(38,2,'module','default','module_element');

    //ContainerSortableMain & ContainerSortableErrorPage
    $this->module_class_container =                  new _class_container(35,2,'module','default','module_element');

    //image background color for transparent images and blend modes
    $this->module_class_image_background_color =     new _class_image_background_color(20,2,'module','default','module_element');
    $this->module_class_image_container_size =       new _class_image_container_size(20,2,'module','default','module_element');

    //text helpers --> description / archivedescription
    $this->module_class_text_helpers =               new _class_text_helpers(20,2,'module','default','module_element');//has text align!


    $this->module_class_text_helpers_string =        new _class_text_helpers_string(20,2,'module','default','module_element');

    //module margin and text align helpers
    $this->module_class_margin_vertical =            new _class_margin_vertical(20,2,'module','default','module_element');
    $this->module_class_text_align =                 new _class_text_align(21,2,'module','default','module_element');

    //alignement (now only applied to featured image...)
    $this->module_class_align =                      new _class_align(21,2,'module','default','module_element');




  /**
    * module: moduleinner        60-89
    */
    $this->moduleinner_element =                     new _element(80,4,NULL,'moduleinner');
    $this->moduleinner_class =                       new _class(81,3,NULL,'moduleinner','moduleinner_element');
    $this->moduleinner_attrs =                       new _attrs(82,4,NULL,'moduleinner','moduleinner_element');//newwww

    $this->moduleinner_wrap =                        new _wrap(82,4,NULL,'moduleinner','moduleinner_element');//newwww

    //nav container
    $this->moduleinner_attrs_navbar =                new _attrs_navbar(82,2,'settings','default','moduleinner_element');//newwww

    //articlelistcontainer
    $this->moduleinner_attrs_grid =                  new _attrs_grid(83,4,NULL,'default','moduleinner_element');//newwww
      $this->moduleinner_class_child_width =         new _class_child_width(84,2,'module','default','moduleinner_attrs_grid');
      $this->moduleinner_class_grid_mods =           new _class_grid_mods(85,2,'module','default','moduleinner_attrs_grid');
      $this->moduleinner_attrs_scrollspy_animation = new _attrs_scrollspy_animation(86,2,'module','default','moduleinner_attrs_grid');//newwww

  /**
    * module: pra/suf = wrap
    */
    $this->content_wrap =                            new _wrap(88,4,NULL,'content');//newwww

  /// 3. Block controlls      90-119
  /// -------------------

  /**
    * widget: widget
    */
    $this->widget_element =                          new _element(90,4,NULL,'widget');
    $this->widget_class =                            new _class(91,3,NULL,'widget');

  /**
    * widget: widgetinner
    */
    $this->widgetinner_element =                     new _element(92,4,NULL,'widgetinner');//no callback _defsidebar is not working, but not necessary!
    $this->widgetinner_class =                       new _class(93,3,NULL,'widgetinner');
    $this->widgetinner_class_card_color_background = new _class_card_color_background(90,2,'content','widgetinner');
    $this->widgetinner_class_card_body =             new _class_card_body( 92,2,'content','widgetinner');
    $this->widgetinner_class_card_helpers =          new _class_card_helpers(93,2,'content','widgetinner');

  /**
    * widget: widgettitle_wrap
    */
    $this->widgettitle_wrap =                        new _wrap(94,4,NULL,'widgettitle');

  /**
    * menu: menutitle
    */
    $this->menutitle_element =                       new _element(94,2,'content','menutitle');
    $this->menutitle_class =                         new _class_title(94,2,'content','menutitle','menutitle_element');


  /**
    * ---
    * Complex Single settings based on: select, multiselect, toggleswitch, ...
    * ---
    */

    $this->template_part =             new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\template_part(1,2,'settings');//template

    $this->block_template =            new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\block_template(1,2,'content');//section_block_template, container_custom_block_template

    $this->module_view_status =        new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\module_view_status(1,2,'settings');

    $this->view_status =               new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\view_status(1,2,'settings');
    $this->view_conditions =           new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\view_conditions(2,2,'settings');

    //presets priority and access_level are defined in file! (the only one)
    $this->presets =                   new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\presets(4,2);

    $this->sortable =                  new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\sortable(5,2,'content');//containers

    $this->custom_section_content =    new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\custom_section_content(5,2,'content');

    $this->posts_templates_object =    new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\posts_templates_object(5,2,'content');

    $this->offcanvas_module =          new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\offcanvas_module(5,2,'content');//offcanvas_toggle

    $this->query_args_json =           new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(10,3,'content','query_args');

    $this->static_content =           new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(10,2,'content','static_content');


    $this->taxonomy =                  new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\taxonomy(10,2,'content');//taxonomyterm, !!! articlelinks !!!

    $this->excerpt =                   new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\excerpt(10,2,'content');//the_content
    $this->excerpt_length =            new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\excerpt_length(10,2,'content');//the_content

    $this->in_same_term =              new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\in_same_term(10,3,'content');//articlelinks

    $this->next_or_number =            new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\next_or_number(10,2,'content');//linkpages

    $this->icon_type =                 new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\icon_type(10,2,'content');//offcanvas_toggle

    $this->title_element =             new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title_element(10,2,'content');//archivetitle, commentsform, errorpage, title
    $this->title_class =               new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class_title(10,2,'content');//archivetitle, errorpage, title

    $this->link_class =                new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\link_class(10,2,'content');//date, authorlink, commentscounter, editlink, powered, readmore, taxonomyterm, title
    $this->linked =                    new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\linked(10,2,'content');//date, authorlink, commentscounter, taxonomyterm, title

    $this->image_link =                new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\image_link(10,2,'content');//image
    $this->image_size =                new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\image_size(10,2,'content');//image
    $this->image_class =               new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\image_class(10,2,'content');//image
    $this->caption =                   new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\caption(10,2,'content');//image

    $this->list_item =                 new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\list_item(120,2);//taxonomyterm

    $this->autofocus =                 new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\autofocus(10,4,'developer');//search

    $this->item_position =             new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\item_position(10,4,'developer');
    $this->parent_container =          new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\parent_container(10,4,'developer');



  /**
    * ---
    * Most Single Simple settings based on a "_vorlagenclass" like _text, _json, _class, _range
    * ---
    */

    //xy extends _class
    $this->sticky_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\sticky_class(120,4);//articlecontainer
    $this->form_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\form_class(120,4);//commentsform, search
    $this->button_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\button_class(120,4);//commentsform
    $this->input_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\input_class(120,4);//commentsform, search
    $this->textarea_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\textarea_class(120,4);//commentsform
    $this->checkbox_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\checkbox_class(120,4);//commentsform
    $this->label_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\label_class(120,4);//commentsform
    $this->comment_container_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\comment_container_class(120,4);//commentslist
    $this->comment_body_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\comment_body_class(120,4);//commentslist
    $this->menu_container_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\menu_container_class(120,4);//menu
    $this->menu_ul_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\menu_ul_class(120,4);//menu
    $this->avatar_container_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\avatar_container_class(120,4);//commentslist
    //new _class
    $this->header_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class(120,4,NULL,'header_class');//commentslist
    $this->meta_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class(120,4,NULL,'meta_class');//commentslist
    $this->meta_subnav_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class(120,4,NULL,'meta_subnav_class');//commentslist
    $this->avatar_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class(120,4,NULL,'avatar_class');//commentslist

    //xy extends _range
    $this->avatar_size = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\avatar_size(10,2,'content'); //commentslist
    $this->icon_ratio = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\icon_ratio(10,2,'content'); //offcanvas_toggle

    //xy extends _toggle_true_false
    $this->show_all = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\show_all(10,2,'content'); //commentspagination, pagination
    $this->prev_next = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\prev_next(10,2,'content'); //commentspagination, pagination

    //new _json
    $this->author_box_json = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'author_box');//authorbox
    $this->menu_items_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'menu_items_wrap');//menu
    $this->menu_walker_wrap_first = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'menu_walker_wrap_first');//menu
    $this->menu_walker_wrap_second = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(121,4,NULL,'menu_walker_wrap_second');//menu
    $this->menu_walker_wrap_third = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(122,4,NULL,'menu_walker_wrap_third');//menu
    $this->list_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'list_wrap'); //commentslist, commentspagination, pagination, termmeta, queryterm, postmeta
    $this->title_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'title_wrap');//commentslist
    $this->author_link_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'author_link_wrap');//commentslist
    $this->header_grid = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'header_grid');//commentslist
    $this->meta_subnav_attrs = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'meta_subnav_attrs');//commentslist
    $this->meta_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'meta_wrap');//postmeta, termmeta
    $this->caption_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'caption_wrap'); //image
    $this->last_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'last_wrap');//articlelinks
    $this->next_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'next_wrap');//articlelinks
    $this->logo_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,2,NULL,'logo_wrap');//site_logo
    $this->toggle_wrap = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'toggle_wrap');//offcanvas_toggle
    $this->search_icon = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'search_icon');// search
    $this->separator = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_json(120,4,NULL,'separator');// separator

    //xy extends _textarea
    $this->text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\text(10,2,'content');//errorpage
    //new _textarea
    $this->moderation_note_1 = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_textarea(10,3,'content','moderation_note_1');//commentslist
    $this->moderation_note_2 = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_textarea(10,3,'content','moderation_note_2');//commentslist

    //new _slug (validation -> class)
    $this->meta_key = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_slug(10,2,'content','meta_key');//termmeta,postmeta

    //xy extends _text
    $this->title = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title(10,2,'content');//errorpage
    $this->title_sprintf = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title_sprintf(10,2,'content');//archivetitle
    $this->no_comments = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\no_comments(10,3,'content');//commentscounter
    $this->one_comment = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\one_comment(10,3,'content');//commentscounter
    $this->more_than_one_comment = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\more_than_one_comment(10,3,'content');//commentscounter
    $this->comments_closed_message = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\comments_closed_message(10,3,'content');//commentsform
    $this->prev_text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\prev_text(10,3,'content');//commentspagination, pagination, linkpages
    $this->next_text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\next_text(10,3,'content');//commentspagination, pagination, linkpages
    $this->date_format = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\date_format(10,3,'content');//date
    $this->link_text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\link_text(10,3,'content');//editlink, powered
    $this->before = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\before(10,4,'content');//editlink, linkpages
    $this->after = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\after(10,4,'content');//editlink
    $this->excluded_terms = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\excluded_terms(10,3,'content');//articlelinks
    $this->text_separator = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\text_separator(10,2,'content');//linkpages, taxonomyterm
    $this->link_url = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\link_url(10,3,'content');//(val=url!) powered
    $this->powered_text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\powered_text(10,3,'content');// powered
    $this->read_more = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\read_more(10,2,'content');// readmore
    $this->placeholder = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\placeholder(10,2,'content');// search
    //new _text
    $this->datentime_sprintf = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text(10,3,'content','datentime_sprintf');//commentslist
    $this->comment_date_format = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text(10,3,'content','comment_date_format');//commentslist
    $this->comment_time_format = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text(10,3,'content','comment_time_format');//commentslist


  }

}
