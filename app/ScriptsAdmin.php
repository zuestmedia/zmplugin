<?php

namespace ZMP\Plugin;

class ScriptsAdmin extends ScriptsProp {

  private $adminpage_slug = NULL;
  private $framework = 'zmp';
  private $css = NULL;
  private $css_rtl = NULL;

  public function getAdminPageSlug() {

      return $this->adminpage_slug;

  }
  public function setAdminPageSlug($adminpage_slug) {

      $this->adminpage_slug = $adminpage_slug;

  }
  public function getFramework() {

      return $this->framework;

  }
  public function setFramework($framework) {

      $this->framework = $framework;

  }

  public function setCss($css) {

    $this->css = $css;

  }
  public function getCssDefaultValue() {

    return $this->css;

  }

  public function setCssRtl($css_rtl) {

    $this->css_rtl = $css_rtl;

  }
  public function getCssRtlDefaultValue() {

    return $this->css_rtl;

  }

  public function getCss() {

    if ( is_rtl() ) {

      return $this->getCssRtlDefaultValue();

    } else {

      return $this->getCssDefaultValue();

    }

  }

  public function allAdminPages() {

    global $zmplugin;

    if ( isset($_GET['page']) && in_array( $_GET['page'], $zmplugin['admin_scripts_slugs'] ) === true) {

      $this->AdminAssets();

    }

  }

  public function thisAdminPage() {

    if ( isset($_GET['page']) && $_GET['page'] == $this->getAdminPageSlug() ) {

      $this->AdminAssets();

    }

  }



  public function AdminAssets() {

    //enqueue css
    if($this->getCss()) {
      //self::EnqueueStyle($this->getFramework().'-css',$this->getPluginFolderUrl().$this->getCss(),NULL,$this->getVersion());
      $this->EnqueueStyle($this->getFramework().'-css',$this->getPluginFolderUrl().$this->getCss(),NULL,$this->getVersion());
    }

    //enqueue arrays
    $this->EnqueueCssArray();
    $this->EnqueueJsArray();

  }

  /**
    * Admin Page Add Assets
    */
    public function addAdminAssetstoallAdminPages(){

      add_action( 'admin_enqueue_scripts', array( $this, 'allAdminPages' )  );

    }
  /**
    * Admin Page Add Assets
    */
    public function addAdminAssetstothisAdminPage(){

      add_action( 'admin_enqueue_scripts', array( $this, 'thisAdminPage' )  );

    }

  /**
    * Admin Page to customizer controlls
    */
    public function addAdminAssetstoCustomizerControls(){

      add_action( 'customize_controls_enqueue_scripts', array( $this, 'AdminAssets' )  );

    }

  /**
    * Login Page Add Assets
    */
    public function addAdminAssetstoLoginPage(){

      add_action( 'login_enqueue_scripts', array( $this, 'AdminAssets' )  );

    }

}
