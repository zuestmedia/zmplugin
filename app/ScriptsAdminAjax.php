<?php

namespace ZMP\Plugin;

class ScriptsAdminAjax extends ScriptsAdmin {

  /**
  * To use ajax w wp rest api, needs localized script to get rest url communication and nonce
  */
  static function EnqueueScript($js_slug, $js_url = '', $js_deps = array(), $js_ver = false, $js_in_footer = false) {

    parent::EnqueueScript($js_slug, $js_url, $js_deps, $js_ver, $js_in_footer);

    wp_localize_script( $js_slug, $js_slug.'_object',
      array(
        'restURL' => rest_url(),
        'restNonce' => wp_create_nonce( 'wp_rest' )
      )
    );

  }

}
