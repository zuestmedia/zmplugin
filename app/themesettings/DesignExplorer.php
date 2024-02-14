<?php

namespace ZMP\Plugin\ThemeSettings;

class DesignExplorer {

  private $rest_route;

  public function getRestRoute() {

    return $this->rest_route;

  }

  function __construct( $rest_route ){

    $this->rest_route = $rest_route;

  }

  public function getFilterClasses($object,$type){

    $class_array = array();
    foreach($object as $key => $val){
      $class_array[] = $type.'-'.$val;
    }

    return implode(' ', $class_array);

  }
  public function getLabelFreePro($object){

    global $zmplugin;

    $html = NULL;
    foreach($object as $key => $val){
      if($val == $zmplugin['global_constants']->design_explorer_free_post_tag_id){
        $html =  '<div><span class="uk-label uk-label-success">'.__('Free','zmplugin').'</span></div>';
      } elseif($val == $zmplugin['global_constants']->design_explorer_pro_post_tag_id){
        $html =  '<div><span class="uk-label uk-label-warning">'.__('Pro','zmplugin').'</span></div>';
      }
    }

    return $html;

  }

  //returns NULL on REST failure
  public function getFilterMenu(){

    $html = NULL;

    $cat_rest_request = new \ZMP\Plugin\RestRequestExternal( $this->getRestRoute().'wp/v2/categories?per_page=100' );
    $cat_rest_object = $cat_rest_request->getRestObjectorArray();

    //var_dump($cat_rest_object);

    $tag_rest_request = new \ZMP\Plugin\RestRequestExternal( $this->getRestRoute().'wp/v2/tags?per_page=100' );
    $tag_rest_object = $tag_rest_request->getRestObjectorArray();

    //var_dump($tag_rest_object);

    if(is_array($cat_rest_object) && is_array($tag_rest_object) ){

      //-- start grid
      $html .= '<div class="uk-grid-small uk-grid-divider uk-child-width-auto" uk-grid>';

        //all
        $html .= '<div>';

          $html .= '<ul  class="uk-subnav uk-subnav-pill" uk-margin>';

            $html .= '<li class="uk-active" uk-filter-control><a href="#">'.__('All','zmplugin').'</a></li>';

          $html .= '</ul>';

        $html .= '</div>';

        //tags
        $html .= '<div>';

          $html .= '<ul  class="uk-subnav uk-subnav-pill" uk-margin>';

            foreach($tag_rest_object as $tag){

              if($tag->count > 0){
                $html .= '<li uk-filter-control="filter: .tag-'.esc_attr( $tag->id ).'; group: data-tag"><a href="#">'.esc_html( $tag->name ).'</a></li>';
              }


            }

          $html .= '</ul>';

        $html .= '</div>';

        //categories
        $html .= '<div>';

          $html .= '<ul  class="uk-subnav uk-subnav-pill" uk-margin>';

            foreach($cat_rest_object as $cat){

              if($cat->count > 0){
                $html .= '<li uk-filter-control="filter: .cat-'.esc_attr( $cat->id ).'; group: data-cat"><a href="#">'.esc_html( $cat->name ).' <span class="uk-badge">'.esc_html( $cat->count ).'</span></a></li>';
              }

            }

          $html .= '</ul>';

        $html .= '</div>';

      $html .= '</div>';
      //-- end grid

    }



    return $html;


  }

  public function getHTML(){

    $html = NULL;

    $rest_request = new \ZMP\Plugin\RestRequestExternal( $this->getRestRoute().'wp/v2/posts?per_page=100' );
    $rest_object = $rest_request->getRestObjectorArray();

    $media_rest_request = new \ZMP\Plugin\RestRequestExternal( $this->getRestRoute().'wp/v2/media?per_page=100' );
    $media_rest_object = $media_rest_request->getRestObjectorArray();

    $filtermenu = $this->getFilterMenu();

    if(is_array($rest_object) && is_array($media_rest_object) && $filtermenu !== NULL){

      $html .= '<div uk-filter="target: .design-explorer-filter">';

      $html .= $filtermenu;

        $html .= '<ul uk-grid="masonry:true" class="design-explorer-filter uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1">';

          foreach($rest_object as $post_data){

            $img_id = $post_data->featured_media;
            $img_med = NULL;
            $img_large = NULL;

            //add object->id as array key!
            $new_media_rest_object = array();
            foreach($media_rest_object as $value){
              $new_media_rest_object[$value->id] = $value;
            }

            if( $img_id != 0 && array_key_exists( $img_id, $new_media_rest_object ) ){

              //use full size image if medium or medium large is not available
              $img_med = $new_media_rest_object[$img_id]->media_details->sizes->full->source_url;
              $img_large = $new_media_rest_object[$img_id]->media_details->sizes->full->source_url;

              if (isset( $new_media_rest_object[$img_id]->media_details->sizes->medium->source_url )) {
                $img_med = $new_media_rest_object[$img_id]->media_details->sizes->medium->source_url;
              }
              if (isset( $new_media_rest_object[$img_id]->media_details->sizes->medium_large->source_url )) {
                $img_large = $new_media_rest_object[$img_id]->media_details->sizes->medium_large->source_url;
              }

            }

            $html .= '<li class="'.esc_attr( $this->getFilterClasses($post_data->categories,'cat') ).' '.esc_attr( $this->getFilterClasses($post_data->tags,'tag') ).'">';

              //overlay container
              $html .= '<div class="uk-overflow-hidden uk-inline uk-transition-toggle uk-box-shadow-small">';
                //overlay image
                $html .= '<img src="'.esc_url( $img_med ).'" style="max-width:100%;height:auto;box-sizing:border-box;vertical-align: middle;" alt="'.__('No image', 'zmplugin').'">';
                //overlay content
                $html .= '<div class="uk-card uk-card-body uk-card-primary uk-overlay uk-overlay-primary uk-position-cover uk-transition-slide-bottom">';
                  $html .= '<div class="uk-position-center">';
                    $html .= '<p><a class="uk-button uk-button-primary" href="#'.esc_attr( $post_data->slug ).'" uk-toggle>'.__('Details', 'zmplugin').'</a></p>';
                  $html .= '</div>';
                $html .= '</div>';
              $html .= '</div>';

              //title in footer
              $html .= '<div class="uk-card uk-card-small uk-card-default uk-card-body uk-box-shadow-small">';
                $html .= '<div uk-grid class="uk-flex uk-flex-between">';
                  $html .= '<h2 class="uk-margin-remove">'.esc_html( $post_data->title->rendered ).'</h2>';
                  $html .= $this->getLabelFreePro($post_data->tags);
                $html .= '</div>';
              $html .= '</div>';

              //start modal
              $html .= '<div id="'.esc_attr( $post_data->slug ).'" class="uk-flex-top" uk-modal>';
                $html .= '<div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">';
                  //close button
                  $html .= '<button class="uk-modal-close-default" type="button" uk-close></button>';
                  //title
                  //$html .= '<h2 class="uk-modal-title">'.$post_data->title->rendered.'</h2>';
                  $html .= '<div uk-grid class="uk-flex uk-flex-between uk-flex-middle uk-margin-small-bottom">';
                    $html .= '<h2 class="uk-modal-title">'.esc_html( $post_data->title->rendered ).'</h2>';
                    $html .= $this->getLabelFreePro($post_data->tags);
                  $html .= '</div>';
                  //image
                  $html .= '<div class="uk-overflow-hidden uk-inline uk-height-medium uk-box-shadow-small">';
                    $html .= '<img src="'.esc_url( $img_large ).'" style="max-width:100%;height:auto;box-sizing:border-box;vertical-align: middle;" alt="'.__('No image', 'zmplugin').'">';
                  $html .= '</div>';
                  //text
                  $html .= $post_data->content->rendered;
                  //list
                  $html .= '<hr class="uk-divider-small"><p>';
                  $html .= '<b>'.__('Last update', 'zmplugin').':</b> '.esc_html( $post_data->modified );
                  if (isset( $post_data->acf->version )) {
                    $html .= '<br><b>'.__('Version', 'zmplugin').':</b> '.esc_html( $post_data->acf->version );
                  }
                  if (isset( $post_data->acf->author )) {
                    $html .= '<br><b>'.__('Author', 'zmplugin').':</b> '.esc_html( $post_data->acf->author );
                  }
                  $html .= '</p><hr class="uk-divider-small">';

                  if (isset( $post_data->acf->url )) {
                    //buttons
                    $html .= '<div class="uk-text-right">';
                      //preview link
                      $html .= '<a class="uk-button uk-button-default" target="_blank" href="'.esc_url( $post_data->link ).'">'.__('Preview', 'zmplugin').' <i uk-icon="icon:play"></i></a>';
                      //install menu
                      $html .= '<div class="uk-inline">';
                        $html .= '<button class="uk-button uk-button-primary uk-margin-left zminstallbuttonid-'.esc_attr( $post_data->id ).' type="button">';
                          $html .= '<span class="zminstall">';
                            $html .= __('Install', 'zmplugin').' <i uk-icon="icon:triangle-down;ratio:1.2"></i>';
                          $html .= '</span>';
                          $html .= '<span class="zminstalling uk-hidden">';
                            $html .= __('Installing', 'zmplugin').' <div uk-spinner="ratio:0.5"></div>';
                          $html .= '</span>';
                          $html .= '<span class="zminstalled uk-hidden">';
                            $html .= __('Installed', 'zmplugin').' <i uk-icon="icon:check;ratio:1.2"></i>';
                          $html .= '</span>';
                          $html .= '<span class="zminstallfailed uk-hidden">';
                            $html .= __('Failed', 'zmplugin').' <i uk-icon="icon:close;ratio:1.2"></i>';
                          $html .= '</span>';
                        $html .= '</button>';
                        $html .= '<div uk-dropdown="mode: click" class="uk-padding-remove">';
                        //installbuttons
                          $html .= '<button class="zminstallbutton full uk-button uk-button-default uk-button-small uk-text-left uk-width-1-1" data-url="'.rawurlencode( $post_data->acf->url ).'" data-pid="'.esc_attr( $post_data->id ).'" type="button">'.__('Full (Settings & Widgets)', 'zmplugin').'</button>';
                          $html .= '<button class="zminstallbutton part uk-button uk-button-default uk-button-small uk-text-left uk-width-1-1" data-url="'.rawurlencode( $post_data->acf->url ).'" data-pid="'.esc_attr( $post_data->id ).'" type="button">'.__('Only settings', 'zmplugin').'</button>';
                        //installbuttons
                        $html .= '</div>';
                      $html .= '</div>';
                      $html .= '<p class="uk-text-meta"><i uk-icon="icon:warning;ratio:0.85"></i> <b>'.__('Note', 'zmplugin').':</b> '.__('A full install will overwrite and/or delete all existing widget blocks. If you don\'t want to lose your widget blocks, chose only settings install.', 'zmplugin').' <a href="#">'.__('Get help here', 'zmplugin').'</a></p>';
                    $html .= '</div>';
                  }

                $html .= '</div>';
              $html .= '</div>';
              //end modal


            $html .= '</li>';

          }

        $html .= '</ul>';

      $html .= '</div>';

    }

    return $html;

  }

  public function getCachedHTML(){

    $cached_html = get_transient('zmdesignexplorer_cache');

    if($cached_html == 'norestapiconnection'){

      return '<p>No Api Connection... -> Reset cache & reload!</p>';

    }

    if($cached_html !== false){

      return $cached_html;

    } else {

      $html = $this->getHTML();

      if($html !== NULL){

        set_transient('zmdesignexplorer_cache',$html,86400);

        return $html;

      } else {

        set_transient('zmdesignexplorer_cache','norestapiconnection',3600);

      }

    }

  }


}
