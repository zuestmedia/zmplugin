<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_comments {

  function __construct(){

    //Values
    $this->label = __( 'Comments', 'zmplugin' );
    $this->description = __( 'Change Comment Settings in <a href="javascript:wp.customize.section( \'comments__commentscontainer\' ).focus();">"ZMTheme: Comments"</a>', 'zmplugin' );

  }

}
