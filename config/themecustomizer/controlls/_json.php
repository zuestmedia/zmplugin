<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _json extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_textarea {

  protected function default() {

    parent::default();

    //Values
    $this->validation = 'json';
    $this->description = __( 'This input accepts only json.', 'zmplugin' );

  }

  protected function static_content() {

    $this->default();

    $this->label = __( 'Static HTML content:', 'zmplugin' );
    $this->description = __( 'Add JSON string to generate static HTML content', 'zmplugin' );

  }

  protected function author_box() {

    $this->default();

    $this->label = __( 'Author box json:', 'zmplugin' );
    $this->description = __( 'Available variables to get data: __image__, __title__, __link__, __text__.', 'zmplugin' );

  }

  protected function query_args() {

    $this->default();

    //Values
    $this->active_callback_item = 'custom_section_content';
    $this->active_callback_item_functionname = 'CallbackAlt1';

    $this->label = __( 'Query Args:', 'zmplugin' );
    $this->description = __( 'Add here your custom WP_Query in JSON Format. The simplest way is to use an online WP_Query Generator.', 'zmplugin' );

  }

  protected function search_icon() {

    $this->default();

    $this->label = __( 'Search Icon:', 'zmplugin' );
    $this->description = __( 'Add JSON string to generate HTML for Search Icon.', 'zmplugin' );

  }

  protected function menu_items_wrap() {

    $this->default();

    $this->label = __( 'Menu Items Wrap:', 'zmplugin' );
    $this->description = __( 'Edit the list wrapper of menu items here.', 'zmplugin' );

  }
  protected function menu_walker_wrap_first() {

    $this->default();

    $this->label = __( 'Menu Walker Level 1 Wrap:', 'zmplugin' );

  }
  protected function menu_walker_wrap_second() {

    $this->default();

    $this->label = __( 'Menu Walker Level 2 Wrap:', 'zmplugin' );

  }
  protected function menu_walker_wrap_third() {

    $this->default();

    $this->label = __( 'Menu Walker Level 3 Wrap:', 'zmplugin' );

  }
  protected function list_wrap() {

    $this->default();

    $this->label = __( 'List Wrapper:', 'zmplugin' );

  }
  protected function title_wrap() {

    $this->default();

    $this->label = __( 'Title Wrapper:', 'zmplugin' );

  }
  protected function author_link_wrap() {

    $this->default();

    $this->label = __( 'Author Link Wrapper:', 'zmplugin' );

  }
  protected function header_grid() {

    $this->default();

    $this->label = __( 'Header grid attributes:', 'zmplugin' );

  }
  protected function meta_wrap() {

    $this->default();

    $this->label = __( 'Meta Wrap:', 'zmplugin' );

  }
  protected function caption_wrap() {

    $this->default();

    $this->label = __( 'Caption Wrap:', 'zmplugin' );

  }
  protected function last_wrap() {

    $this->default();

    $this->label = __( 'Last Wrap:', 'zmplugin' );

  }
  protected function next_wrap() {

    $this->default();

    $this->label = __( 'Next Wrap:', 'zmplugin' );

  }
  protected function logo_wrap() {

    $this->default();

    $this->label = __( 'Logo Wrapper:', 'zmplugin' );
    $this->description = __( 'The variable %1$s gets the site-title, %2$s is used for subtitle. Eg. %1$s - %2$s displays YOUR-SITE-TITLE - YOUR-SUBTITLE.', 'zmplugin' );

  }
  protected function toggle_wrap() {

    $this->default();

    $this->label = __( 'Toggle Button Wrapper:', 'zmplugin' );
    $this->description = __( 'Edit Json of Mobile Menu Toggle Button.', 'zmplugin' );

  }
  protected function separator() {

    $this->default();

    $this->label = __( 'Separator Wrapper:', 'zmplugin' );
    $this->description = __( 'Create HTML Separator with json.', 'zmplugin' );

  }

}
