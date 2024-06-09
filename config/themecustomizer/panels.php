<?php

namespace ZMP\Plugin\Config\ThemeCustomizer;

#[\AllowDynamicProperties]

class panels {

  function __construct(){

    // Theme Components Panel (modules & components)
    $this->theme_components = new \stdClass();
    $theme_components = $this->theme_components;
      //Values
      $theme_components->title = __( 'ZMTheme: ', 'zmplugin' );
      $theme_components->description = __( 'Here you can edit Theme Settings.', 'zmplugin' );


    //Globals
    $this->globals = new \stdClass();
    $globals = $this->globals;
      //Values
      $globals->title = __( 'Global Settings', 'zmplugin' );
      $globals->description = __( 'Define here global theme settings & styles affecting all Modules.', 'zmplugin' );
      $globals->priority = 1;

    //sections
    $this->section = new \stdClass();
    $section = $this->section;
      //Values
      $section->title = __( 'Sections: ', 'zmplugin' );
      $section->description = __( 'Section templates: The header, center and footer of this themes consists of sections. Sort, edit and style sections here.', 'zmplugin' );
      $section->priority = 161;

    $this->archive = new \stdClass();
    $archive = $this->archive;
      //Values
      $archive->title = __( 'Archive: ', 'zmplugin' );
      $archive->description = __( 'Template of the archive container in archive view.', 'zmplugin' );
      $archive->priority = 162;

    $this->posts = new \stdClass();
    $posts = $this->posts;
      //Values
      $posts->title = __( 'Posts Template: ', 'zmplugin' );
      $posts->description = __( 'Template of a post list item in archive view.', 'zmplugin' );
      $posts->priority = 164;

    $this->single = new \stdClass();
    $single = $this->single;
      //Values
      $single->title = __( 'Single Template: ', 'zmplugin' );
      $single->description = __( 'Template of a single post view.', 'zmplugin' );
      $single->priority = 165;

    $this->page = new \stdClass();
    $page = $this->page;
      //Values
      $page->title = __( 'Page Template: ', 'zmplugin' );
      $page->description = __( 'Template of a page view.', 'zmplugin' );
      $page->priority = 166;

    $this->singular = new \stdClass();
    $singular = $this->singular;
      //Values
      $singular->title = __( 'Custom Template: ', 'zmplugin' );
      $singular->description = __( 'Template of a custom singular view.', 'zmplugin' );
      $singular->priority = 166;

    $this->nav = new \stdClass();
    $nav = $this->nav;
      //Values
      $nav->title = __( 'Navigation: ', 'zmplugin' );
      $nav->description = __( 'Template of a navigation.', 'zmplugin' );
      $nav->priority = 167;

    $this->offcanvas = new \stdClass();
    $offcanvas = $this->offcanvas;
      //Values
      $offcanvas->title = __( 'Offcanvas: ', 'zmplugin' );
      $offcanvas->description = __( 'Template of an offcanvas navigation.', 'zmplugin' );
      $offcanvas->priority = 167;

    $this->comments = new \stdClass();
    $comments = $this->comments;
      //Values
      $comments->title = __( 'Comments Template', 'zmplugin' );
      $comments->description = __( 'Template of comments.', 'zmplugin' );
      $comments->priority = 168;

  }

}
