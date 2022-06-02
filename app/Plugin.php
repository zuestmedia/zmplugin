<?php

namespace ZMP\Plugin;

class Plugin {

  /**
    * Plugin Location -> Name comes from Location!
    * Format --> 'zm-toolbox/zm-toolbox.php'
    * @var string
    * @access private
    */
  private $location;


  /**
    * Alternative Displayname (Optional)
    * @var string
    * @access private
    */
  private $displayname = NULL;

  /**
    * Predefined Form_OptionsGroupName
    * used in ZMForms, ZMThemeSection, ZMThemeSidebar, ZMThemeMenu combined with formname as optpra
    * if not set, optionsgroupname is theme slug (foldername)
    * @var string
    * @access private
    */
  private $optionsgroupname = NULL;

  /**
    * Die vorausgesetzten plugins und versionen
    * array(
    *   array('slug' =>'zm-toolbox/zm-toolbox', 'version' =>'1.2'),
    *   array('slug' =>'zm-premium-extension/zm-premium-extension.php', 'version' =>'1.5')
    * )
    * @var array
    * @access private
    */
  private $required_plugins_n_versions = NULL;


  /**
    * Version
    * @var string
    * @access private
    */
    private $config_version;
    private $version_notice;

  /**
    * VersionNotice
    */
    public function setVersionNotice($version_notice) {

      $this->version_notice = $version_notice;

    }
    public function getVersionNotice() {

      return $this->version_notice;

    }
  /**
    * Version-Status von config file config.php
    */
    public function setConfigVersion($config_version) {

      $this->config_version = $config_version;

    }
    public function getConfigVersion() {

      return $this->config_version;

    }

    public function versionErrorNotice() {

      echo '<div class="notice-warning notice"><p>'.esc_html($this->getVersionNotice()).'</p></div>';

    }

    public function checkVersion(){

      if(is_admin()){

        if( $this->getConfigVersion() != $this->getVersion() ){
          add_action( 'admin_notices', array($this,'versionErrorNotice') );
        }

      }

    }


  /**
  * Location is minimal value to setup a plugin without menu page.
  */
  function __construct( $location ) {

		$this->location = $location;

	}

  /**
  * Get Plugin Location
  */
  public function getLocation() {

    return $this->location;

  }

  //GET PLUGIN SLUG
  public function getSlug() {

    return trim(dirname($this->getLocation()), '/');

  }

  //make slug dash - to  underscor _ to use as function string name!
  public function getSlugFunctionStr() {

    $result = str_replace('-', '_', $this->getSlug()); //remove dashes
    return $result;

  }

  //GET PLUGIN DIR
  public function getPluginDir() {

    return WP_PLUGIN_DIR . '/' . $this->getSlug();

  }

  //GET PLUGIN URL
  public function getPluginUrl() {

    return WP_PLUGIN_URL . '/' . $this->getSlug();

  }

  //SET Alternative Plugin Name
  public function setDisplayName($displayname) {

    $this->displayname = $displayname;

  }

  //SET Alternative Plugin Name
  public function DisplayName() {

    return $this->displayname;

  }

  //GET Plugin Display Name --> ist nicht statisch!!! kann nicht als key oder id verwendet werden
  public function getDisplayName() {

    if($this->DisplayName()) {
      return $this->DisplayName();
    }

    if (substr( $this->getSlug(), 0, 2 ) == 'zm') {
      $result = strtoupper( substr( $this->getSlug(), 0, 2 ) ).substr( $this->getSlug(), 2 ); //make first two letter uppercase
    } else {
      $result = $this->getSlug();
    }
    $result = str_replace('-', ' ', $result); //remove dashes
    $result = ucwords($result); //first character uppercase
    return $result;

  }

  /**
  * NEW get OptGroup in one, no separation name / optgroup!
  */
  public function setOptionsGroupName($optionsgroupname) {

    $this->optionsgroupname = $optionsgroupname;

  }
  private function getOptionsGroupName() {

    return $this->optionsgroupname;

  }
  public function getOptGroup(){

    $result = $this->getSlug();

    if ($this->getOptionsGroupName()){

      $result = $this->getOptionsGroupName();

    }

    return $result;

  }

  //SET Required Plugins and Versions
  public function setRequiredPluginsNVersions($required_plugins_n_versions) {

    $this->required_plugins_n_versions = $required_plugins_n_versions;

  }

  //GET Required Plugins and Versions
  public function getRequiredPluginsNVersions() {

    return $this->required_plugins_n_versions;

  }

  //GET Version NR
  public function getVersion() {

    return PluginHelper::getInstalledPluginMetaDatabykey($this->getLocation(),'Version');

  }

}
