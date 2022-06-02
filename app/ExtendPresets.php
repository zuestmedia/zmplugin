<?php

namespace ZMP\Plugin;

use ZMT\Theme\Namespaces;
use ZMT\Theme\Build;

class ExtendPresets {

    function __construct(){

      $this->extendPresets();

    }

  /**
    * gets all presets from extension if have
    */
    public function extendPresets(){

      global $zmextensionmodules;

      if(is_array($zmextensionmodules)){

        if(count($zmextensionmodules) != 0){

          foreach($zmextensionmodules as $extension => $values){

            $namespace = $values['namespace'];

            $full_classname = '\\'.$namespace.'\Config\Presets\\'.$extension;

            if(class_exists($full_classname)){

              $default_namespace = '\\'.$namespace.'\Config\Presets\\';//default namespace!

              $n = new Namespaces( $default_namespace, '\ZMP\Pro\Config\Extensions\Presets\\' );

              $this->$extension = Build::newClass( $n->getClass( $extension ) );

            }

          }

        }

      }

    }

}
