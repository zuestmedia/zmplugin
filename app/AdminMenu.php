<?php

namespace ZMP\Plugin;

class AdminMenu {

  /**
    * Menu Page HTML
    * @var string
    * @access private
    */
    private $page_slug = NULL;

  /**
    * Menu Page HTML
    * @var string
    * @access private
    */
    private $menu_page = NULL;

  /**
    * Menu Page Name
    * @var string
    * @access private
    */
    private $menu_page_name = NULL;

  /**
    * Sub Menu Page HTML
    * @var string
    * @access private
    */
    private $sub_menu_page = NULL;

  /**
    * Sub Menu Page Name
    * @var string
    * @access private
    */
    private $sub_menu_page_name = NULL;

  /**
    * Sub Menu Page set parent page string (?page=string) or https://developer.wordpress.org/reference/functions/add_submenu_page/
    * @var string
    * @access private
    */
    private $sub_menu_page_parent = 'options-general.php';

    private $icon_url = '';
    private $position = NULL;

  /**
    * Location is minimal value to setup a plugin without menu page.
    */
    function __construct( $page_slug ) {

  		$this->page_slug = $page_slug;

      $this->addAdminAssetPageSlugtoGlobal();

  	}


  /**
    * Set Page Slug
    * @param string $css_rtl_path
    */
    public function setPageSlug($page_slug) {

      $this->page_slug = $page_slug;

    }

  /**
    * Get Page Slug
    * @return string
    */
    public function getPageSlug() {

      return $this->page_slug;

    }

    public function addAdminAssetPageSlugtoGlobal(){

      global $zmplugin;

      $zmplugin['admin_scripts_slugs'][] = $this->getPageSlug();

    }

  /**
    * Set Page Slug
    * @param string $css_rtl_path
    */
    public function setMenuPageName($menu_page_name) {

      $this->menu_page_name = $menu_page_name;

    }

  /**
    * Get Page Slug
    * @return string
    */
    public function getMenuPageName() {

      return $this->menu_page_name;

    }


  /**
    * Create Menu Pages
    * MainMenu or SubMenu
    */

    //SET Main menu Page
    public function setMenuPage($menu_page) {

      $this->menu_page .= $menu_page;

    }

    //echo Main admin backend menu
    public function getMenuPage() {

      //need to echo to show menu!
      echo $this->menu_page;

    }

    //icon_url
    public function setIconUrl($icon_url) {
      $this->icon_url = $icon_url;
    }
    public function getIconUrl() {
      return $this->icon_url;
    }

    //position
    public function setPosition($position) {
      $this->position = $position;
    }
    public function getPosition() {
      return $this->position;
    }

    //Main menu Page
    public function MenuPage() {

      add_menu_page( $this->getMenuPageName(), $this->getMenuPageName(), 'manage_options', $this->getPageSlug(), array($this,'getMenuPage'), $this->getIconUrl(), $this->getPosition() );

    }

    //ADD Main menu Page to admin menu
    public function addMenuPage() {

      add_action( 'admin_menu', array( $this, 'MenuPage' )  );

    }

    //SET Alternative Plugin Name
    public function setSubMenuPageName($sub_menu_page_name) {

      $this->sub_menu_page_name = $sub_menu_page_name;

    }
    public function SubMenuPageName() {

      return $this->sub_menu_page_name;

    }

    //GET Plugin Display Name --> ist nicht statisch!!! kann nicht als key oder id verwendet werden
    public function getSubMenuPageName() {

      if($this->SubMenuPageName()) {

        return $this->SubMenuPageName();

      } else {

        return $this->getMenuPageName();

      }

    }

    //SET SubMenu admin backend menu
    public function setSubMenuPageParent($sub_menu_page_parent) {

      $this->sub_menu_page_parent = $sub_menu_page_parent;

    }

    //SET SubMenu admin backend menu
    public function getSubMenuPageParent() {

      return $this->sub_menu_page_parent;

    }

    //SET SubMenu admin backend menu
    public function setSubMenuPage($sub_menu_page) {

      $this->sub_menu_page .= $sub_menu_page;

    }
    //echo SubMenu admin backend menu
    public function getSubMenuPage() {

      //need to echo to show menu!
      echo $this->sub_menu_page;

    }
    //submenupage
    public function SubMenuPage() {

      add_submenu_page( $this->getSubMenuPageParent(), $this->getSubMenuPageName(), $this->getSubMenuPageName(), 'manage_options', $this->getPageSlug(), array($this,'getSubMenuPage'), $this->getPosition() );

    }
    //ADD SubMenuPage to admin menu
    public function addSubMenuPage() {

      add_action( 'admin_menu', array( $this, 'SubMenuPage' ) );

    }

}
