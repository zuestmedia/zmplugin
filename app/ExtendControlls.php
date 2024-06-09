<?php

namespace ZMP\Plugin;

use ZMT\Theme\Namespaces;
use ZMT\Theme\Build;

#[\AllowDynamicProperties]

class ExtendControlls {

    function __construct(){

      $this->extendControlls();

    }

  /**
    * gets all com_extensionsname section labels / descr of extension-plugins
    * those can be extended with single settings Controlls
    * single controlls are only directly attached to the com_
    */
    public function extendControlls(){

      global $zmextensionmodules;

      if(is_array($zmextensionmodules)){

        if(count($zmextensionmodules) != 0){

          foreach($zmextensionmodules as $extension => $values){

            $namespace = $values['namespace'];

            $full_classname = '\\'.$namespace.'\Config\Controlls\com_'.$extension;

            if(class_exists($full_classname)){

              $objkey = 'com_'.$extension;

              $default_namespace = '\\'.$namespace.'\Config\Controlls\\';//default namespace!

              $n = new Namespaces( $default_namespace, '\ZMP\Pro\Config\Extensions\Controlls\\' );

              $this->$objkey = Build::newClass( $n->getClass( $objkey ) );


            }

          }

        }

      }

    }


}
