<?php

namespace ZMP\Plugin;

class SettingsTemplate {

    private $optpra;
    public function setOptPra($optpra) {
      $this->optpra = $optpra;
    }
    public function getOptPra() {
      return $this->optpra;
    }
    private $displayname = NULL;
    public function setDisplayName($displayname) {
      $this->displayname = $displayname;
    }
    public function getDisplayName() {
      return $this->displayname;
    }

    private $title = NULL;
    public function setTitle($title) {
      $this->title = $title;
    }
    public function getTitle() {
      return $this->title;
    }

    private $descr = NULL;
    public function setDescr($descr) {
      $this->descr = $descr;
    }
    public function getDescr() {
      return $this->descr;
    }

    private $info_box_title;
    public function setInfoBoxTitle($info_box_title) {
      $this->info_box_title = $info_box_title;
    }
    public function getInfoBoxTitle() {
      return $this->info_box_title;
    }

    private $info_box_links = array();
    public function setInfoBoxLinks($info_box_links) {
      $this->info_box_links = $info_box_links;
    }
    public function getInfoBoxLinks() {
      return $this->info_box_links;
    }

    private $info_box_html = NULL;
    public function setInfoBoxHTML($info_box_html) {
      $this->info_box_html = $info_box_html;
    }
    public function getInfoBoxHTML() {
      return $this->info_box_html;
    }

    private $version_text_wrap = '%s';
    public function setVersionTextWrap($version_text_wrap) {
      $this->version_text_wrap = $version_text_wrap;
    }
    public function getVersionTextWrap() {
      return $this->version_text_wrap;
    }

    private $version = 'not set';
    public function setVersion($version) {
      $this->version = $version;
    }
    public function getVersion() {
      return $this->version;
    }

    private $key = NULL;
    public function setKey($key) {
      $this->key = $key;
    }
    public function getKey() {
      return $this->key;
    }

    public function htmlAdminMenuStart() {

      $html = NULL;

      //start container
      $html .= '<div class="uk-container uk-container-expand uk-margin-top">';

        $html .= '<div class="uk-margin-bottom">';
          $html .= '<h2>';
          $html .= $this->getDisplayName();
          $color = NULL;
          if(\ZMP\Plugin\PluginHelper::isPremiumAndRegsitered()){
            $color = 'success';
          }elseif(\ZMP\Plugin\PluginHelper::isPremiumVersion()){
            $color = 'warning';
          }elseif(\ZMP\Plugin\PluginHelper::installedPremiumAddon()){
            $color = 'danger';
          }
          if($color){
            $html .= ' <span class="uk-label uk-label-'.$color.'" style="margin-top:-4px;">'.__('Pro','zmplugin').'</span>';
          }
          $html .= '</h2>';
        $html .= '</div>';

        $html .= '<hr>';

          //start grid
          $html .= '<div uk-grid class="uk-child-width-expand uk-grid-divider">';

            //start maincontent
            $html .= '<div>';

            $html .= '<h1 class="uk-margin-bottom">'.$this->getTitle().'</h1>';

            if($this->getDescr()){
              $html .= '<p class="uk-margin-medium-bottom">'.$this->getDescr().'</p>';
            }

      return $html;

    }

    public function htmlAdminMenuEnd() {

      $html = NULL;

          //end maincontent
          $html .= '</div>';

          //add sidebar
          $html .= $this->htmlAdminMenuSidebar();

        //end uk-grid
        $html .= '</div>';

      //end container
      $html .= '</div>';

      return $html;

    }

    public function htmlAdminMenuSidebar() {

      $html = NULL;

      //start sidebar gridchild
      $html .= '<div class="uk-width-1-5@l zmhiddenincustomizer">';

        //start sticky
        $html .= '<div uk-sticky="offset:50" class="uk-card uk-card-muted">';

          $html .= '<h2 class="uk-margin-remove-bottom">'.$this->getInfoBoxTitle().'</h2>';

          $html .= \ZMP\Plugin\Helpers::getLinksMenu($this->getInfoBoxLinks(),'<ul class="uk-list">');

          $html .= $this->getInfoBoxHTML();

          $html .= '<hr class="uk-margin">';

          $html .= '<p><b>Name:</b> '.$this->getDisplayName().'<br>'.sprintf( $this->getVersionTextWrap(), $this->getVersion() ).'</p>';

        //end sticky
        $html .= '</div>';

      //end sidebar gridchild
      $html .= '</div>';

      return $html;

    }

  /**
    * Accordion Settings Form
    */
    private $count = 0;
    public function setCount($count) {
      $this->count = $count;
    }
    public function getCount() {
      return $this->count;
    }
    public function setCountPlusOne() {
      $this->count++;
    }

    //at the end of the form
    public function accordionFormSetup($temp_form_object){

      //reset to 0 for later use
      $this->setCount(0);

    /**
      * Add Field to add transient on options.php when receiving $_POST = zmtempformlocation
      */
      if( ( isset($_POST['zmtempformlocation']) && is_numeric($_POST['zmtempformlocation']) ) && ( isset($_POST['option_page']) && $_POST['option_page'] == $this->getOptPra() ) ){

        //saves temporary value to transients and deletes it again after getting
        set_transient('zmtempformlocation',$_POST['zmtempformlocation'],60);//expires in 60s if not deleted

        //exit();//to test if it works...

      }

      if ( isset( $_GET['settings-updated'] ) && ( isset($_GET['page']) && $_GET['page'] == $this->getOptPra() ) ) {

        $tempformlocation = get_transient('zmtempformlocation');
        delete_transient('zmtempformlocation');
        if($tempformlocation != 0) {

          $accordionscript = '<script>
            UIkit.accordion("#zmthememenu").toggle('.$tempformlocation.');
          </script>';

          $temp_form_object->addField('html',$accordionscript);

        }

      } elseif( isset( $_GET['switcherpos'] ) && is_numeric( $_GET['switcherpos'] ) ){

        $accordionscript = '<script>
          UIkit.accordion("#zmthememenu").toggle('.$_GET['switcherpos'].');
        </script>';

        $temp_form_object->addField('html',$accordionscript);

      }

    /**
      * add general input field... for general success or failure message
      * uikit popup success and error messages are shwon through unregistered general field.
      * field is only connected with validation and wpsettingserrors...
      */
      $temp_form_object->addField('input',
        array(
          'type'=>'hidden',
          'outerelement'=>'',
          'name'=>'general',
          'class'=>'uk-hidden'
        )
      );

      return $temp_form_object;

    }
    public function htmlSettingsFormAccordionButtonWCount($button){

      $html = NULL;

      if($button){

        $html .= '<button class="zm-theme-save-button uk-button uk-button-primary uk-margin-small-top uk-margin-bottom" name="zmtempformlocation" value="'.esc_attr( $this->getCount() ).'" type="submit">';
          $html .= '<i uk-icon="cog"></i> ';
          $html .= __('Save Changes','zmplugin');
        $html .= '</button>';

      }

      $this->setCountPlusOne();

      return $html;

    }
    public function htmlSettingsFormAccordionStart($title){

      $html = NULL;

      //start accordion
      $html .= '<ul uk-accordion id="zmthememenu">';
        $html .= '<li class="uk-open">';
          $html .= '<a class="uk-accordion-title uk-link-reset" href="#">'.esc_html( $title ).'</a>';
          $html .= '<div class="uk-accordion-content">';

      return $html;

    }
    public function htmlSettingsFormAccordionBetween($title,$button = true,$content_class = NULL){

      $html = NULL;

      //start accordion
          $html .= $this->htmlSettingsFormAccordionButtonWCount($button);
          $html .= '</div>';//accordion-content
          //$html .= '<hr class="uk-margin-top">';
          $html .= '<hr>';
        $html .= '</li>';
        $html .= '<li>';
          $html .= '<a class="uk-accordion-title uk-link-reset" href="#">'.esc_html( $title ).'</a>';
          $html .= '<div class="uk-accordion-content'.esc_attr( $content_class ).'">';

      return $html;
    }
    public function htmlSettingsFormAccordionEnd($button = true){

      $html = NULL;

      //start accordion
          $html .= $this->htmlSettingsFormAccordionButtonWCount($button);
          $html .= '</div>';//accordion-content
          //$html .= '<hr class="uk-margin-top">';
        $html .= '</li>';
      $html .= '</ul>';

      return $html;

    }



}
