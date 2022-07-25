<?php

namespace ZMP\Plugin\ThemeCustomizer;

class CustomizerHelpers {

  //classname is the class of the com_id
  static function getEmptyModuleTemplate($id,$classes,$type,$classname){

    $result = NULL;

    $text = NULL;
    $link = ' data-control=\'{ "name":"'.esc_attr( $id ).'", "type":"section" }\'';
    $icon = '<span class="uk-icon" uk-icon="plus"></span> ';

    $text2 = 'Settings';
    $link2 = $link;
    $icon2 = '<span class="uk-icon" uk-icon="settings"></span> ';

    if ($type == 'hidden'){
      $icon = '<span class="uk-icon" uk-icon="ban"></span> ';
    }

    if( strpos($classname, 'Sidebar') !== false ){
      if($type == 'empty'){
        $text = 'Add a Widget';
        $link = ' data-control=\'{ "name":"sidebar-widgets-'.esc_attr( $id ).'", "type":"section" }\'';
        if(strpos($id, '_defsidebar') !== false){
          //$link2 = str_replace('_defsidebar', '', $link2);
          $newid = str_replace('_defsidebar', '', $id);
          global $zmtheme;
          if($zmtheme[$newid]->getComLockStatus() == false){
            $link2 = str_replace('_defsidebar', '', $link2);
          } else {
            $link2 = $link;
          }
        }
      } elseif ($type == 'hidden'){
        $text = 'Activate Widget Module';
      }
    } elseif( strpos($classname, 'Menu') !== false ){
      if($type == 'empty'){
        $text = 'Add a Menu';
        $link = ' data-control=\'{ "name":"menu_locations", "type":"section" }\'';
      } elseif ($type == 'hidden'){
        $text = 'Activate Menu Module';
      }
    } elseif( strpos($classname, 'Logo') !== false ){
      if($type == 'empty'){
        $text = 'Add a Logo';
        $link = ' data-control=\'{ "name":"title_tagline", "type":"section" }\'';
      } elseif ($type == 'hidden'){
        $text = 'Activate Logo Module';
      }
    } elseif( strpos($classname, 'Container') !== false ){
      $text = 'Activate Container Module';
    } elseif( strpos($classname, 'NavToggle') !== false ){
      $text = 'Activate Toggle Module';
    } elseif( strpos($classname, 'Search') !== false ){
      $text = 'Activate Search Module';
    } elseif( strpos($id, '__section_html') !== false ){
      $text = 'Activate Section';
    }

    //////new: do not show hidden containers view_status = 1
    if ($type == 'hidden'){
      $text = '';
    }
    //new

    if($text){

      $classes = str_replace(' class="', ' class="zm-prev-menu-modul ', $classes);

      //create empty module elements for menu, logo and sidebars
      $result .= '<div'.$classes.'>';

        $result .= '<div class="uk-flex uk-flex-center uk-overflow-hidden" style="background:transparent;border: 1px dashed #dadada;">';
          $result .= '<div>';
            $result .= '<ul class="uk-subnav uk-margin-remove">';

              $result .= '<li class="uk-padding-small">';
                $result .= '<a class="zm-focuspane uk-text-small"'.$link.'>';
                  $result .= $icon.$text;
                $result .= '</a>';
              $result .= '</li>';

              if($link !== $link2){
                $result .= '<li class="uk-padding-small">';
                  $result .= '<a class="zm-focuspane uk-text-small"'.$link2.'>';
                    $result .= $icon2.$text2;
                  $result .= '</a>';
                $result .= '</li>';
              }

            $result .= '</ul>';
          $result .= '</div>';
        $result .= '</div>';

      $result .= '</div>';

    } else {

      //create hidden elements so sorting/ordering works always correctly
      if($classes == NULL) {
        $classes = ' class="uk-hidden zm-prev-menu-modul"';
      } else {
        $classes = str_replace(' class="', ' class="uk-hidden zm-prev-menu-modul ', $classes);
      }

      $result .= '<div'.$classes.'>';
        $result .= '<p>inactive module: '.esc_attr( $id ).'</p>';
      $result .= '</div>';

    }

    return $result;

  }

  static function getHiddenSectionTemplate($id){

    $result = '<div class="uk-hidden com_id_'.esc_attr( $id ).' zm-customizer-component">';
      $result .= '<p>hidden section: '.esc_attr( $id ).'</p>';
    $result .= '</div>';

    return $result;

  }

}
