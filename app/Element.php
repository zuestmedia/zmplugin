<?php

namespace ZMP\Plugin;

class Element {

  /**
  * This class is used to create output validated html elements from json or php arrays
  */
  static function processHTMLElements($module_array){

    $html = NULL;

    $html .= Element::processHTMLElementsStart( $module_array );
    $html .= Element::processHTMLElementsEnd( $module_array );

    return $html;

  }

  static function processHTMLElementsStart($module_array){

    $html = NULL;

    if(is_array($module_array)){

      if(!array_key_exists('tag',$module_array)){

        foreach( $module_array as $element ){

          $html .= Element::processHTMLElementStart($element);

        }

      } else {

        $html .= Element::processHTMLElementStart( $module_array );

      }

    }

    return $html;

  }

  static function processHTMLElementsEnd($module_array){

    $html = NULL;

    if(is_array($module_array)){

      $module_array = array_reverse($module_array);

      if(!array_key_exists('tag',$module_array)){

        foreach( $module_array as $element ){

          $html .= Element::processHTMLElementEnd($element);

        }

      } else {

        $html .= Element::processHTMLElementEnd( $module_array );

      }

    }

    return $html;

  }

  static function processHTMLElementStart($element){

    $html = NULL;

    $html .= '<'.esc_attr( $element['tag'] );

    if(array_key_exists('attributes',$element)){

      $attributes = $element['attributes'];

      if(is_array($attributes)){

        foreach( $attributes as $key => $attribute ){

          $html .= ' '.esc_attr( $key ).'="'.esc_attr( $attribute ).'"';

        }

      }

    }

    $html .= '>';

    if(array_key_exists('content',$element)){

      $content = $element['content'];

      if(is_array($content)){

        $html .= Element::processHTMLElementsStart( $content );
        $html .= Element::processHTMLElementsEnd( $content );

      } else {

        $html .= esc_html( $content );

      }

    }

    if(array_key_exists('close',$element) && $element['close'] == true){

      $html .= '</'.esc_attr( $element['tag'] ).'>';

    }

    return $html;

  }

  static function processHTMLElementEnd($element){

    $html = NULL;

    if(array_key_exists('content_end',$element)){

      $content_end = $element['content_end'];

      if(is_array($content_end)){

        $html .= Element::processHTMLElementsStart( $content_end );
        $html .= Element::processHTMLElementsEnd( $content_end );

      } else {

        $html .= esc_html( $content_end );

      }

    }

    if(!array_key_exists('close',$element)){

      $html .= '</'.esc_attr( $element['tag'] ).'>';

    }

    return $html;

  }

}
