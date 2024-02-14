<?php

namespace ZMP\Plugin\Settings;

class BlockPatternsData {

  private $rest_route;

  public function getRestRoute() {

    return $this->rest_route;

  }

  function __construct( $rest_route ){

    $this->rest_route = $rest_route;

    $this->addBlockPatterns();

  }

  public function addBlockPatterns(){

    $block_patterns_categories = $this->getBlockPatternsData('wp/v2/zmbp_cat?per_page=100','zm_blockpatterns_category_cache');

    if(is_array($block_patterns_categories) && !empty($block_patterns_categories)){

      foreach($block_patterns_categories as $cat_key => $single_cat){

        register_block_pattern_category(
          $single_cat->slug,
          array( 'label' => $single_cat->name )
        );

      }

    }

    $block_patterns = $this->getBlockPatternsData('zmp/v1/zmblockpatterns?per_page=100','zm_blockpatterns_data_cache');

    if(is_array($block_patterns) && !empty($block_patterns)){

      foreach($block_patterns as $patt_key => $single_patt){

        register_block_pattern(
          'zmp-patterns/'.$single_patt->post_name,
          array(
              'title'       => $single_patt->post_title,
              'description' => $single_patt->post_excerpt,
              'content'     => $single_patt->post_content,
              'categories' => $this->getCategoriesArray($single_patt->categories),
          )
        );

      }

    }

  }

  public function getCategoriesArray($categories){

    $new_array = array();
    if(is_array($categories) && !empty($categories)){

      foreach($categories as $key => $cat){

        $new_array[] = $cat->slug;

      }

    }
    return $new_array;


  }

  public function getBlockPatternsData($rest_route_path,$transient_string){

    $cached_block_patterns_data_obj = get_transient($transient_string);

    if($cached_block_patterns_data_obj !== false){

      return $cached_block_patterns_data_obj;

    } else {

      $args = array();
      if( class_exists ('\ZMP\Pro\Init') && $transient_string == 'zm_blockpatterns_data_cache' ){
        global $zmplugin;
        $auth = new \ZMP\Pro\App( $zmplugin['zmpro']->getOptGroup() );
        $license_key = $auth->getSavedLicenseKey();
        $domain = $auth->getDomain();
        $args['body']['license_key'] = $license_key;
        $args['body']['domain'] = $domain;
      }

      $rest_request = new \ZMP\Plugin\RestRequestExternal( $this->getRestRoute().$rest_route_path, $args );
      $block_patterns_data_obj = $rest_request->getRestObjectorArray();

      if(!empty($block_patterns_data_obj)){

        set_transient($transient_string,$block_patterns_data_obj,86400);

        return $block_patterns_data_obj;

      } else {

        set_transient($transient_string,'norestapiconnection',3600);

      }

    }

  }


}
