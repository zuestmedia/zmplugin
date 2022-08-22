<?php

namespace ZMP\Plugin\Settings;

class BlockPatterns {

  /**
    * Block Patterns
    */

    function __construct( $plugin_dir ){

      $this->plugin_dir = $plugin_dir;

      //add theme support for block-patterns
      $this->addBlockPatterns();

    }

    public function addBlockPatterns() {

      add_action('init', array( $this, 'BlockPatterns' ));

    }

    public function BlockPatterns() {

      register_block_pattern_category(
        'zmb-patterns',
        array( 'label' => __( 'ZM Patterns', 'zmplugin' ) )
      );

      $file_name_array = scandir( $this->plugin_dir.'/block_patterns' );

      foreach($file_name_array as $file_name){

        if (strpos($file_name, '.html') !== false) {

          $slug = str_replace(".html", "", $file_name);
          $name = ucwords( str_replace("_", " ", $slug) );

          register_block_pattern(
            'zmb-patterns/'.$slug,
            array(
                'title'       => $name,
                'content' => file_get_contents( $this->plugin_dir.'/block_patterns/'.$file_name ),
                'categories' => array( 'zmb-patterns' ),
            )
          );

        }

      }

    }

}
