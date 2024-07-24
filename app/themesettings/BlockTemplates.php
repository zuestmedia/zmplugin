<?php

namespace ZMP\Plugin\ThemeSettings;

class BlockTemplates {

  function __construct( ){

    //add theme support for zm-blocks
    $this->addTemplateBlocks();

  }

  /**
    * Add cpt to use as template blocks instead of widgets
    */
    public function addTemplateBlocks(){

      global $zmtheme;
      if( $zmtheme['theme']->getSettingsStatus() >= 2 ) {

        add_action('init', array( $this, 'TemplateBlocks' ));

        //add column with asignment status of each block template
        add_filter('manage_zm_blocks_posts_columns', function($columns) {
        	return array_merge($columns, ['zmstatus' => __('Assigned to', 'zmplugin')]);
        });

        add_action('manage_zm_blocks_posts_custom_column', array( $this, 'CustomColumnforBlocks' ), 10, 2);

      }

    }

    public function CustomColumnforBlocks($column_key, $post_id) {

      if ($column_key == 'zmstatus') {

        $this->getBlockTemplateComponentid($post_id);

      }

    }

    public function getBlockTemplateComponentid($post_id){

      global $zmtblockassignment;

      $post_slug = get_post_field( 'post_name', get_post() );

      if( is_array($zmtblockassignment) && in_array( $post_slug, $zmtblockassignment ) ){

        $newarray = array();
        foreach($zmtblockassignment as $key => $value){

          if($value == $post_slug){

            $newarray[] = $key;

          }

        }
        echo esc_html( implode(', ', $newarray ) );

      } else {

        echo '-';

      }

    }

    public function TemplateBlocks(){

    /**
      * Post Type: TemplateBlocks
      */
    	$labels = [
    		"name" => __( "Block Templates", "zmplugin" ),
    		"singular_name" => __( "Block Template", "zmplugin" ),
    		"menu_name" => __( "My Block Templates", "zmplugin" ),
    		"all_items" => __( "Block Templates", "zmplugin" ),
    		"add_new" => __( "Add new", "zmplugin" ),
    		"add_new_item" => __( "Add new Block Template", "zmplugin" ),
    		"edit_item" => __( "Edit Block Template", "zmplugin" ),
    		"new_item" => __( "New Block Template", "zmplugin" ),
    		"view_item" => __( "View Block Template", "zmplugin" ),
    		"view_items" => __( "View Block Templates", "zmplugin" ),
    		"search_items" => __( "Search Block Templates", "zmplugin" ),
    		"not_found" => __( "No Block Templates found", "zmplugin" ),
    		"not_found_in_trash" => __( "No Block Templates found in trash", "zmplugin" ),
    		"parent" => __( "Parent Block Template:", "zmplugin" ),
    		"featured_image" => __( "Featured image for this Block Template", "zmplugin" ),
    		"set_featured_image" => __( "Set featured image for this Block Template", "zmplugin" ),
    		"remove_featured_image" => __( "Remove featured image for this Block Template", "zmplugin" ),
    		"use_featured_image" => __( "Use as featured image for this Block Template", "zmplugin" ),
    		"archives" => __( "Block Template archives", "zmplugin" ),
    		"insert_into_item" => __( "Insert into Block Template", "zmplugin" ),
    		"uploaded_to_this_item" => __( "Upload to this Block Template", "zmplugin" ),
    		"filter_items_list" => __( "Filter Block Templates list", "zmplugin" ),
    		"items_list_navigation" => __( "Block Templates list navigation", "zmplugin" ),
    		"items_list" => __( "Block Templates list", "zmplugin" ),
    		"attributes" => __( "Block Templates attributes", "zmplugin" ),
    		"name_admin_bar" => __( "Block Template", "zmplugin" ),
    		"item_published" => __( "Block Template published", "zmplugin" ),
    		"item_published_privately" => __( "Block Template published privately.", "zmplugin" ),
    		"item_reverted_to_draft" => __( "Block Template reverted to draft.", "zmplugin" ),
    		"item_scheduled" => __( "Block Template scheduled", "zmplugin" ),
    		"item_updated" => __( "Block Template updated.", "zmplugin" ),
    		"parent_item_colon" => __( "Parent Block Template:", "zmplugin" ),
    	];

    	$args = [
    		"label" => __( "Block Templates", "zmplugin" ),
    		"labels" => $labels,
    		"description" => "",
    		"public" => false,
    		"publicly_queryable" => false,
    		"show_ui" => true,
    		"show_in_rest" => true,
    		"rest_base" => "",
    		"rest_controller_class" => "WP_REST_Posts_Controller",
    		"rest_namespace" => "wp/v2",
    		"has_archive" => false,
    		"show_in_menu" => "themes.php",
    		"position" => 1,
    		"show_in_nav_menus" => false,
    		"delete_with_user" => false,
    		"exclude_from_search" => true,
    		"capability_type" => "post",
    		"map_meta_cap" => true,
    		"hierarchical" => false,
    		"can_export" => false,
    		"rewrite" => false,
    		"query_var" => true,
    		"menu_icon" => "dashicons-block-default",
    		"supports" => [ "title", "editor", "revisions" ],
    		"show_in_graphql" => false,
    	];

      if( class_exists('\ZMP\ZMPAdmin\App') && is_super_admin() ){

        //slug and templates are shown this way
    		$args['publicly_queryable'] = true;

      }

    	register_post_type( "zm_blocks", $args );

    }

}
