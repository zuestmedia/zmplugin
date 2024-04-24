<?php

namespace ZMP\Plugin\Settings;

use ZMP\Plugin\Helpers;

class AppSettings extends \ZMP\Plugin\App {

  function __construct($optpra){
    parent::__construct($optpra);

    //add functions to desired action here
    $this->addNonAdminRedirect();

    $this->addLoginLogo();
    $this->addLoginLogoTarget();
    $this->addLoginLogoTitle();

    if(is_admin()){
      $this->addFooterText();
      $this->removeHelpTab();
      $this->removeDashboardWPLogo();
      $this->addLoginRedirect();
    }

    $this->addCookieConsentBanner();

    $this->addSMTP();

  }

  private $nonadmin_redirect = false;
  private $nonadmin_redirect_field_name = '_nonadmin_redirect';

  private $nonadmin_redirect_exceptions = NULL;
  private $nonadmin_redirect_exceptions_field_name = '_nonadmin_redirect_exceptions';

  private $nonadmin_redirect_target = NULL;
  private $nonadmin_redirect_target_field_name = '_nonadmin_redirect_target';

  private $login_logo_url = NULL;
  private $login_logo_url_field_name = '_login_logo_url';
  private $login_logo_target = NULL;
  private $login_logo_target_field_name = '_login_logo_target';
  private $login_logo_title = NULL;
  private $login_logo_title_field_name = '_login_logo_title';

  private $dashboard_footer_text = NULL;
  private $dashboard_footer_text_field_name = '_dashboard_footer_text';

  private $remove_help_tabs = NULL;
  private $remove_help_tabs_field_name = '_remove_help_tabs';

  private $remove_dashboard_logo = NULL;
  private $remove_dashboard_logo_field_name = '_remove_dashboard_logo';

  private $login_redirect_status = NULL;
  private $login_redirect_status_field_name = '_login_redirect_status';

  /**
  * getNonAdminRedirect
  */
  public function getNonAdminRedirectDefaultValue(){
    return $this->nonadmin_redirect;
  }
  public function getNonAdminRedirectFieldName() {
    return $this->nonadmin_redirect_field_name;
  }
  public function getNonAdminRedirect(){
    return Helpers::getOption(
      $this->getNonAdminRedirectFieldName(),
      $this->getNonAdminRedirectDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  /**
  * getNonAdminRedirectExceptions
  */
  public function getNonAdminRedirectExceptionsDefaultValue(){
    return $this->nonadmin_redirect_exceptions;
  }
  public function getNonAdminRedirectExceptionsFieldName() {
    return $this->nonadmin_redirect_exceptions_field_name;
  }
  public function getNonAdminRedirectExceptions(){
    return Helpers::getOption(
      $this->getNonAdminRedirectExceptionsFieldName(),
      $this->getNonAdminRedirectExceptionsDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_text'
    );
  }

  /**
  * getNonAdminRedirectTarget
  */
  public function getNonAdminRedirectTargetDefaultValue(){
    return $this->nonadmin_redirect_target;
  }
  public function getNonAdminRedirectTargetFieldName() {
    return $this->nonadmin_redirect_target_field_name;
  }
  public function getNonAdminRedirectTarget(){
    return Helpers::getOption(
      $this->getNonAdminRedirectTargetFieldName(),
      $this->getNonAdminRedirectTargetDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_url'
    );
  }

  public function getLoginLogoUrlFieldName() {
    return $this->login_logo_url_field_name;
  }
  public function getLoginLogoUrlDefaultValue(){
    return $this->login_logo_url;
  }
  public function getLoginLogoUrl(){
    return Helpers::getOption(
      $this->getLoginLogoUrlFieldName(),
      $this->getLoginLogoUrlDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_url'
    );
  }

  public function getLoginLogoTargetFieldName() {
    return $this->login_logo_target_field_name;
  }
  public function getLoginLogoTargetDefaultValue(){
    return $this->login_logo_target;
  }
  public function getLoginLogoTarget(){
    return Helpers::getOption(
      $this->getLoginLogoTargetFieldName(),
      $this->getLoginLogoTargetDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_url'
    );
  }

  public function getLoginLogoTitleFieldName() {
    return $this->login_logo_title_field_name;
  }
  public function getLoginLogoTitleDefaultValue(){
    return $this->login_logo_title;
  }
  public function getLoginLogoTitle(){
    return Helpers::getOption(
      $this->getLoginLogoTitleFieldName(),
      $this->getLoginLogoTitleDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_text'
    );
  }

  public function getDashboardFooterTextFieldName() {
    return $this->dashboard_footer_text_field_name;
  }
  public function getDashboardFooterTextDefaultValue(){
    return $this->dashboard_footer_text;
  }
  public function getDashboardFooterText(){
    return Helpers::getOption(
      $this->getDashboardFooterTextFieldName(),
      $this->getDashboardFooterTextDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_text'
    );
  }

  public function getRemoveHelpTabsFieldName() {
    return $this->remove_help_tabs_field_name;
  }
  public function getRemoveHelpTabsDefaultValue(){
    return $this->remove_help_tabs;
  }
  public function getRemoveHelpTabs(){
    return Helpers::getOption(
      $this->getRemoveHelpTabsFieldName(),
      $this->getRemoveHelpTabsDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getRemoveDashboardLogoFieldName() {
    return $this->remove_dashboard_logo_field_name;
  }
  public function getRemoveDashboardLogoDefaultValue(){
    return $this->remove_dashboard_logo;
  }
  public function getRemoveDashboardLogo(){
    return Helpers::getOption(
      $this->getRemoveDashboardLogoFieldName(),
      $this->getRemoveDashboardLogoDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getLoginRedirectStatusFieldName() {
    return $this->login_redirect_status_field_name;
  }
  public function getLoginRedirectStatusDefaultValue(){
    return $this->login_redirect_status;
  }
  public function getLoginRedirectStatus(){
    return Helpers::getOption(
      $this->getLoginRedirectStatusFieldName(),
      $this->getLoginRedirectStatusDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  /**
  * NonAdminRedirectTarget Function
  */
  public function NonAdminRedirect(){

    if($this->getNonAdminRedirect()){

      if ( is_user_logged_in() || is_page( explode( ',', $this->getNonAdminRedirectExceptions() ) ) ) {
    		//do nothing
    	} else {

        $url = home_url('/wp-login.php');

        if($this->getNonAdminRedirectTarget()){
          $url = $this->getNonAdminRedirectTarget();
        }

    		wp_redirect($url);
    		exit();

    	}

    }

  }
  public function addNonAdminRedirect(){
    add_action( 'template_redirect', array( $this, 'NonAdminRedirect' ) );
  }

  //Login Logo
  public function LoginLogo() {

    ?>
    <style type="text/css">
      #login h1 a, .login h1 a {
        background-image: url( <?php echo esc_url( $this->getLoginLogoUrl() ); ?> );
    		width:100%;
        background-size: contain;
        <?php if( $this->getLoginLogoUrl() == false ){ ?>
        height:auto;
        text-indent: 0;
        <?php } ?>
      }
    </style>
    <?php

  }
  public function addLoginLogo(){
    if( $this->getLoginLogoUrl() || $this->getLoginLogoTitle()){
      add_action( 'login_enqueue_scripts',  array( $this, 'LoginLogo' ) );
    }
  }

  //logo target url
  public function LoginLogoTarget() {
      return $this->getLoginLogoTarget();
  }
  public function addLoginLogoTarget(){
    if( $this->getLoginLogoTarget() ){
      add_filter( 'login_headerurl', array( $this, 'LoginLogoTarget' ) );
    }
  }

  //logo title
  public function LoginLogoTitle() {
      return $this->getLoginLogoTitle();
  }
  public function addLoginLogoTitle(){
    if( $this->getLoginLogoTitle() ){
      add_filter( 'login_headertext', array( $this, 'LoginLogoTitle') );
    }
  }

  public function FooterText($content) {
      return $this->getDashboardFooterText();
  }
  public function addFooterText() {
    if($this->getDashboardFooterText()){
      add_filter( 'admin_footer_text', array( $this, 'FooterText'), 11 );
    }
  }

  public function HelpTab(){
    $screen = get_current_screen();
    $screen->remove_help_tabs();
  }
  public function removeHelpTab() {
    if( $this->getRemoveHelpTabs() ){
      add_action( 'admin_head', array( $this, 'HelpTab' ) );
    }
  }

  public function DashboardWPLogo() {
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu( 'wp-logo' );
  }
  public function removeDashboardWPLogo() {
    if( $this->getRemoveDashboardLogo() ){
      add_action( 'wp_before_admin_bar_render', array( $this, 'DashboardWPLogo' ), 0 );
    }
  }

  public function LoginRedirect( $redirect_to, $request, $user ){
      return home_url();
  }
  public function addLoginRedirect() {
    if($this->getLoginRedirectStatus()){
      add_filter( 'login_redirect', array( $this, 'LoginRedirect' ), 10, 3 );
    }
  }

  /**
  * Cookie Consent Settings
  */
  public function getCookieConsentStatusTextFieldName() {
    return '_cookie_consent_status';
  }
  public function getCookieConsentStatusDefaultValue(){
    return false;
  }
  public function getCookieConsentStatus(){
    return Helpers::getOption(
      $this->getCookieConsentStatusTextFieldName(),
      $this->getCookieConsentStatusDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getCookieConsentTextTextFieldName() {
    return '_cookie_consent_text';
  }
  public function getCookieConsentTextDefaultValue(){
    return __('This website uses cookies to provide you with a better and more enjoyable browsing experience on the website.', 'zmplugin');
  }
  public function getCookieConsentText(){
    return Helpers::getOption(
      $this->getCookieConsentTextTextFieldName(),
      $this->getCookieConsentTextDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_text'
    );
  }

  public function getCookieConsentPrivacyUrlTextFieldName() {
    return '_cookie_consent_privacy_url';
  }
  public function getCookieConsentPrivacyUrlDefaultValue(){
    return false;
  }
  public function getCookieConsentPrivacyUrl(){
    return Helpers::getOption(
      $this->getCookieConsentPrivacyUrlTextFieldName(),
      $this->getCookieConsentPrivacyUrlDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_url'
    );
  }

  public function getCookieDomainTextFieldName() {
    return '_cookie_domain';
  }
  public function getCookieDomainDefaultValue(){
    return false;
  }
  public function getCookieDomain(){
    return Helpers::getOption(
      $this->getCookieDomainTextFieldName(),
      $this->getCookieDomainDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_text'
    );
  }

  public function excludeTrackingLoggedinUserTextFieldName() {
    return '_exclude_tracking_loggedin_user';
  }
  public function excludeTrackingLoggedinUserDefaultValue(){
    return false;
  }
  public function excludeTrackingLoggedinUser(){
    return Helpers::getOption(
      $this->excludeTrackingLoggedinUserTextFieldName(),
      $this->excludeTrackingLoggedinUserDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getMatomoUrlTextFieldName() {
    return '_matomo_url';
  }
  public function getMatomoUrlDefaultValue(){
    return false;
  }
  public function getMatomoUrl(){
    return Helpers::getOption(
      $this->getMatomoUrlTextFieldName(),
      $this->getMatomoUrlDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_url'
    );
  }

  public function getMatomoSiteIdTextFieldName() {
    return '_matomo_site_id';
  }
  public function getMatomoSiteIdDefaultValue(){
    return false;
  }
  public function getMatomoSiteId(){
    return Helpers::getOption(
      $this->getMatomoSiteIdTextFieldName(),
      $this->getMatomoSiteIdDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_int'
    );
  }

  public function getMatomoTrackerWebsiteUrlTextFieldName() {
    return '_matomo_tracker_website_url';
  }
  public function getMatomoTrackerWebsiteUrlDefaultValue(){
    return false;
  }
  public function getMatomoTrackerWebsiteUrl(){
    return Helpers::getOption(
      $this->getMatomoTrackerWebsiteUrlTextFieldName(),
      $this->getMatomoTrackerWebsiteUrlDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_url'
    );
  }

  public function getMatomoTrackerMethodsetDocumentTitleTextFieldName() {
    return '_matomo_tracker_method_set_document_title';
  }
  public function getMatomoTrackerMethodsetDocumentTitleDefaultValue(){
    return false;
  }
  public function getMatomoTrackerMethodsetDocumentTitle(){
    return Helpers::getOption(
      $this->getMatomoTrackerMethodsetDocumentTitleTextFieldName(),
      $this->getMatomoTrackerMethodsetDocumentTitleDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getMatomoTrackerMethodsetCookieDomainTextFieldName() {
    return '_matomo_tracker_method_set_cookie_domain';
  }
  public function getMatomoTrackerMethodsetCookieDomainDefaultValue(){
    return false;
  }
  public function getMatomoTrackerMethodsetCookieDomain(){
    return Helpers::getOption(
      $this->getMatomoTrackerMethodsetCookieDomainTextFieldName(),
      $this->getMatomoTrackerMethodsetCookieDomainDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getMatomoTrackerMethodsetDomainsTextFieldName() {
    return '_matomo_tracker_method_set_domains';
  }
  public function getMatomoTrackerMethodsetDomainsDefaultValue(){
    return false;
  }
  public function getMatomoTrackerMethodsetDomains(){
    return Helpers::getOption(
      $this->getMatomoTrackerMethodsetDomainsTextFieldName(),
      $this->getMatomoTrackerMethodsetDomainsDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getMatomoTrackerMethodsetDoNotTrackTextFieldName() {
    return '_matomo_tracker_method_set_do_not_track';
  }
  public function getMatomoTrackerMethodsetDoNotTrackDefaultValue(){
    return false;
  }
  public function getMatomoTrackerMethodsetDoNotTrack(){
    return Helpers::getOption(
      $this->getMatomoTrackerMethodsetDoNotTrackTextFieldName(),
      $this->getMatomoTrackerMethodsetDoNotTrackDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getMatomoNoCookieTrackingStatusTextFieldName() {
    return '_matomo_no_cookie_tracking_status';
  }
  public function getMatomoNoCookieTrackingStatusDefaultValue(){
    return false;
  }
  public function getMatomoNoCookieTrackingStatus(){
    return Helpers::getOption(
      $this->getMatomoNoCookieTrackingStatusTextFieldName(),
      $this->getMatomoNoCookieTrackingStatusDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function excludeMatomoFromCookieConsentTextFieldName() {
    return '_exclude_matomo_from_cookie_consent';
  }
  public function excludeMatomoFromCookieConsentDefaultValue(){
    return false;
  }
  public function excludeMatomoFromCookieConsent(){
    return Helpers::getOption(
      $this->excludeMatomoFromCookieConsentTextFieldName(),
      $this->excludeMatomoFromCookieConsentDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getG4AIdTextFieldName() {
    return '_g4a_id';
  }
  public function getG4AIdDefaultValue(){
    return false;
  }
  public function getG4AId(){
    return Helpers::getOption(
      $this->getG4AIdTextFieldName(),
      $this->getG4AIdDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_text'
    );
  }

  public function excludeG4AFromCookieConsentTextFieldName() {
    return '_exclude_ga4_from_cookie_consent';
  }
  public function excludeG4AFromCookieConsentDefaultValue(){
    return false;
  }
  public function excludeG4AFromCookieConsent(){
    return Helpers::getOption(
      $this->excludeG4AFromCookieConsentTextFieldName(),
      $this->excludeG4AFromCookieConsentDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  public function getGTMIdTextFieldName() {
    return '_gtm_id';
  }
  public function getGTMIdDefaultValue(){
    return false;
  }
  public function getGTMId(){
    return Helpers::getOption(
      $this->getGTMIdTextFieldName(),
      $this->getGTMIdDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_text'
    );
  }

  public function excludeGTMFromCookieConsentTextFieldName() {
    return '_exclude_gtm_from_cookie_consent';
  }
  public function excludeGTMFromCookieConsentDefaultValue(){
    return false;
  }
  public function excludeGTMFromCookieConsent(){
    return Helpers::getOption(
      $this->excludeGTMFromCookieConsentTextFieldName(),
      $this->excludeGTMFromCookieConsentDefaultValue(),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_bool'
    );
  }

  /**
  * Cookie Consent Functions
  */
  public function loadCookieConsentBannerCommonFunctions(){

    $cookie_domain = $this->getCookieDomain();

    $cookie_domain_string = '';

    if($cookie_domain){
      $cookie_domain_string = '; domain='.$cookie_domain;
    }    

    ?>

    <script>

      function zmCreateCookie(name,value,days) {
        if (days) {
          var date = new Date();
          date.setTime(date.getTime()+(days*24*60*60*1000));
          var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/<?php echo esc_attr($cookie_domain_string); ?>";
      }
      function zmReadCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
          var c = ca[i];
          while (c.charAt(0)==' ') c = c.substring(1,c.length);
          if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
      }

    </script>

    <?php

  }

  public function getCookieConsentBannerScript(){

    ?>
    <style>
      .zmoutercookieconsentbox{
        z-index: 1000;
        position: fixed !important;
        bottom: 0;
        left: 0;
        right: 0;
        max-width: 100%;
        background-color: var(--wp--preset--color--default,#eaedea);
        color: var(--wp--preset--color--default-text,#222222);
        border-top: 1px solid var(--wp--preset--color--border,#999999);
      }
      .zminnercookieconsentbox{
        text-align: center !important;
        position: relative;
        display: flow-root;
        box-sizing: content-box;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        padding: 15px;
      }
      @media (min-width: 640px){
          .zminnercookieconsentbox {
            padding-left: 30px;
            padding-right: 30px;
        }
      }
      .zmcookieconsenttitle{
        font-size: 1.4rem;
        line-height: 1.5;
      }
      .zmcookieconsenttext{        
        margin-top: 15px;
        font-size: 0.875rem;
        line-height: 1.5;
      }
      .zmcookieconsentnotice{
        margin-left: 5px !important;
        /*color: rgba(var(--color_text_inverse,255,255,255),.5) !important;*/
        text-decoration: none;
        cursor: pointer;
      }
      .zmcookieconsentnotice:hover{
        /*color: rgba(var(--color_text_inverse,255,255,255),.7) !important;*/
        text-decoration: underline;
      }
      .zmcookieconsentbutton{
        cursor: pointer;
        padding: 0 15px;
        background-color: var(--wp--preset--color--muted,#d5d6d2);
        color: var(--wp--preset--color--emphasis-text,#111111);
        margin: 0;
        border: none;
        overflow: visible;
        font: inherit;
        line-height: 30px;
        font-size: 0.875rem;
        text-transform: none;
        -webkit-appearance: none;
        border-radius: 0;
        display: block;
        margin-left: auto;
        margin-right: auto;
        box-sizing: border-box;
        text-align: center;
        text-decoration: none;
        min-width:100%;
      }
      @media (min-width: 640px){
          .zmcookieconsentbutton {
            min-width:200px;
        }
      }
      .zmcookieconsentbutton:hover{
        filter:brightness(95%);
      }
      .zmcookieconsentbuttonaccept{
        /*color: var(--wp--preset--color--success,#107720);*/
      }
      .zmcookieconsentbuttondecline{
        margin-top: 5px !important;
        /*background-color: transparent;*/
      }
    </style>
    <script>

        function zmRemoveCookieConsentBanner(){

          skiplink = document.getElementById('zmcookieconsentskiplink');
          skiplink.remove();

          banner = document.getElementById('zmcookieconsentbanner');
          banner.remove();

        }

        function zmCreateCookieConsentBanner(){

          var tag_skip_link_cookie_consent = document.createElement("a");
          tag_skip_link_cookie_consent.className = 'screen-reader-text';
          tag_skip_link_cookie_consent.setAttribute('href', '#zmcookieconsentbanner');
          tag_skip_link_cookie_consent.setAttribute('id', 'zmcookieconsentskiplink');
          tag_skip_link_cookie_consent.innerHTML = '<?php echo __('Skip to Cookie Consent', 'zmplugin'); ?>';

          var tag_position = document.createElement("div");
          tag_position.className = 'zmoutercookieconsentbox';
          tag_position.setAttribute('id', 'zmcookieconsentbanner');

          var tag_alert = document.createElement("div");
          tag_alert.className = 'zminnercookieconsentbox';
          //tag_alert.setAttribute('uk-alert', '');

          var tag_title = document.createElement("div");
          tag_title.className = 'zmcookieconsenttitle';
          tag_title.innerHTML = '<?php echo __( 'Cookie consent', 'zmplugin' ); ?>';

          var tag_text = document.createElement("p");
          tag_text.className = 'zmcookieconsenttext';
          tag_text.innerHTML = '<?php echo esc_html( $this->getCookieConsentText() ); ?>';

          <?php $privacy_url = get_privacy_policy_url();
          if($privacy_url){ ?>

            var tag_cookie_notice = document.createElement("a");
            tag_cookie_notice.className = 'zmcookieconsentnotice';
            tag_cookie_notice.setAttribute('href', '<?php echo esc_url( $privacy_url ); ?>');
            tag_cookie_notice.innerHTML = '<?php echo __( 'Privacy policy', 'zmplugin' ); ?>';

          <?php } elseif( $this->getCookieConsentPrivacyUrl() ){ ?>

            var tag_cookie_notice = document.createElement("a");
            tag_cookie_notice.className = 'zmcookieconsentnotice';
            tag_cookie_notice.setAttribute('href', '<?php echo esc_url( $this->getCookieConsentPrivacyUrl() ); ?>');
            tag_cookie_notice.innerHTML = '<?php echo __( 'Privacy policy', 'zmplugin' ); ?>';

          <?php } ?>

          var tag_button_accept = document.createElement("button");
          tag_button_accept.className = 'zmcookieconsentbutton zmcookieconsentbuttonaccept';
          tag_button_accept.setAttribute('id', 'zmcookieconsentaccept2');
          //tag_button_accept.innerHTML = 'Accept';
          tag_button_accept.innerHTML = '<?php echo __( '✓ Ok, I agree to cookies', 'zmplugin' ); ?>';

          var tag_button_decline = document.createElement("button");
          tag_button_decline.className = 'zmcookieconsentbutton zmcookieconsentbuttondecline';
          tag_button_decline.setAttribute('id', 'zmcookieconsentdecline2');
          //tag_button_decline.innerHTML = 'Decline';
          tag_button_decline.innerHTML = '<?php echo __( 'Only necessary cookies', 'zmplugin' ); ?>';          

          var tag_button_box = document.createElement("div");
          tag_button_box.className = '';

          <?php if( $privacy_url || $this->getCookieConsentPrivacyUrl() ){ ?>
                tag_text.appendChild(tag_cookie_notice);
          <?php } ?>
                tag_button_box.appendChild(tag_button_accept);
                tag_button_box.appendChild(tag_button_decline);
              tag_alert.appendChild(tag_title);
              tag_alert.appendChild(tag_text);
              tag_alert.appendChild(tag_button_box);
            tag_position.appendChild(tag_alert);

          document.body.prepend(tag_skip_link_cookie_consent);
          document.body.appendChild(tag_position);

        }

        document.addEventListener('DOMContentLoaded', function(){

          if(zmReadCookie('zm_cookie_consent') == 1){

            //console.log('accepted do not show cookie_consent_banner');

          } else if (zmReadCookie('zm_cookie_consent') == 0){

            //console.log('declined - do not show cookie_consent_banner');

          } else if (zmReadCookie('zm_cookie_consent') == null){

            //console.log('not answered - show cookie_consent_banner');

            zmCreateCookieConsentBanner();

            document.getElementById("zmcookieconsentaccept2").onclick = function(){

              //console.log('cookie created with name: zm_cookie_consent value: 1 and days: 365');
              zmCreateCookie('zm_cookie_consent', 1, 365*10);
              zmRemoveCookieConsentBanner();

              var g4aexception = '<?php echo esc_attr( $this->excludeG4AFromCookieConsent() ); ?>';
              if( g4aexception != 1){
                zmLoadG4AScriptsWithCheck();
              }

              var gtmexception = '<?php echo esc_attr( $this->excludeGTMFromCookieConsent() ); ?>';
              if( gtmexception != 1){
                zmLoadGTMScriptsWithCheck();
              }
              var matomoexception = '<?php echo esc_attr( $this->excludeMatomoFromCookieConsent() ); ?>';
              if( matomoexception != 1){
                zmLoadMatomoScriptsWithCheck();
              }

            };
            document.getElementById("zmcookieconsentdecline2").onclick = function(){

              //console.log('cookie created with name: zm_cookie_consent value: 0 and days: 30');
              zmCreateCookie('zm_cookie_consent', 0, 30);
              zmRemoveCookieConsentBanner();

            };

          }

        });

    </script>

    <?php

  }

  public function getNoScriptTrackingPixels(){


    //gtm noscript tag
    if($this->getGTMId()){
      ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $this->getGTMId() ); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <?php
    }

    //mato noscript tag
    if( $this->getMatomoUrl() && $this->getMatomoSiteId() ){
      ?>
        <noscript><img src="<?php echo esc_url( $this->getMatomoUrl() ); ?>matomo.php?idsite=<?php echo esc_attr( $this->getMatomoSiteId() ); ?>&amp;rec=1" style="border:0;" /></noscript>
      <?php
    }

  }

  public function getTrackingScripts(){

    /**
      * G4A:
      *
      * script tag must be added via document head appendChild...
      * <script async src="https://www.googletagmanager.com/gtag/js?id=XXX"></script>
      *
      * ga4 gtag function needs to be available globally, not nested inside function in script above!!!
      * ga4 gtag function has no effect if script is not loaded, so add to head if g4a is activated even if no consent yet...
      */
    ?>    

    <?php if($this->getG4AId()){ ?>

      <script>
        function zmLoadG4AScript(){

          var script_w_src = document.createElement('script');
          script_w_src.setAttribute('async','');
          script_w_src.setAttribute('src','https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $this->getG4AId() ); ?>');
          document.head.appendChild(script_w_src);

        }
      </script>

      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo esc_attr( $this->getG4AId() ); ?>');
      </script>

    <?php } ?>

    <script>

      <?php if($this->getGTMId()){ ?>
        function zmLoadGTMScript(){

        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo esc_attr( $this->getGTMId() ); ?>');

        }
      <?php } ?>

      <?php if( $this->getMatomoUrl() && $this->getMatomoSiteId() ){ ?>
        function zmLoadMatoScript(){

          var _paq = window._paq = window._paq || [];
          
          <?php 

          $tracker_website_url = $this->getMatomoTrackerWebsiteUrl();
          
          if($tracker_website_url){

            $parsed_url_array = parse_url($tracker_website_url);

            if(array_key_exists('host',$parsed_url_array)){

              $host = $parsed_url_array['host'];

              $document_title = $this->getMatomoTrackerMethodsetDocumentTitle();
              if($document_title){

                //add document_title
                echo '_paq.push(["setDocumentTitle", document.domain + "/" + document.title]);';

              }

              $cookie_domain = $this->getMatomoTrackerMethodsetCookieDomain();
              if($cookie_domain){

                //add cookie_domain
                echo '_paq.push(["setCookieDomain", "*.'.esc_js($host).'"]);';

              }

              $domains = $this->getMatomoTrackerMethodsetDomains();
              if($domains){

                //add domains
                echo '_paq.push(["setDomains", ["*.'.esc_js($host).'"]]);';

              }

              $donottrack = $this->getMatomoTrackerMethodsetDoNotTrack();
              if($donottrack){

                //add domains
                echo '_paq.push(["setDoNotTrack", true]);';

              }

              $cookieless = $this->getMatomoNoCookieTrackingStatus();
              if($cookieless){

                //add domains
                echo '_paq.push(["disableCookies"]);';

              }


            }
        
          } 
        
          ?>

          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u="<?php echo esc_url( $this->getMatomoUrl()  ); ?>";
            _paq.push(['setTrackerUrl', u+'matomo.php']);
            _paq.push(['setSiteId', '<?php echo esc_attr( $this->getMatomoSiteId() ); ?>']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
          })();

        }
      <?php } ?>

      function zmLoadG4AScriptsWithCheck(){

        <?php if( $this->getG4AId() ){ ?>
          zmLoadG4AScript();
        <?php } ?>

      }
      function zmLoadGTMScriptsWithCheck(){

        <?php if( $this->getGTMId() ){ ?>
          zmLoadGTMScript();
        <?php } ?>

      }
      function zmLoadMatomoScriptsWithCheck(){

        <?php if( $this->getMatomoUrl() && $this->getMatomoSiteId() ){ ?>
          zmLoadMatoScript();
        <?php } ?>

      }

      function zmInitCookieConsentTrackingScripts(){

        var zm_cookie_consent = zmReadCookie('zm_cookie_consent');

        var g4aexception = '<?php echo esc_attr( $this->excludeG4AFromCookieConsent() ); ?>';
        if( zm_cookie_consent == 1 || g4aexception == 1){
          zmLoadG4AScriptsWithCheck();
        }

        var gtmexception = '<?php echo esc_attr( $this->excludeGTMFromCookieConsent() ); ?>';
        if( zm_cookie_consent == 1 || gtmexception == 1){
          zmLoadGTMScriptsWithCheck();
        }

        var matomoexception = '<?php echo esc_attr( $this->excludeMatomoFromCookieConsent() ); ?>';
        if( zm_cookie_consent == 1 || matomoexception == 1){
          zmLoadMatomoScriptsWithCheck();
        }

      }

      function zmCheckCookieConsentStatusAndMaybeLoadScripts(){

        var cookieconsentstatus = '<?php echo esc_attr( $this->getCookieConsentStatus() ); ?>';

        if(cookieconsentstatus == 1){

          //load scripts only if cookie consent is accepted!
          zmInitCookieConsentTrackingScripts();

        } else {

          //load scripts always
          zmLoadG4AScriptsWithCheck();
          zmLoadGTMScriptsWithCheck();
          zmLoadMatomoScriptsWithCheck();

        }

      }

      //do all checks, then load scripts if ok
      zmCheckCookieConsentStatusAndMaybeLoadScripts();

    </script>

    <?php

  }

  public function isAnalyticsScriptActive(){

    $ga4 = $this->getG4AId();

    $gtm = $this->getGTMId();

    $mato_url = $this->getMatomoUrl();
    $mato_sid = $this->getMatomoSiteId();

    if($ga4 || $gtm || ($mato_url && $mato_sid) ){

      return true;

    }

    return false;

  }

  public function BodySkipLinks(){

    echo '<a href="#cookie-consent" class="screen-reader-text">'.__('Skip to Cookie Consent', 'zmplugin').'</a>';

  }

  public function addCookieConsentBanner() {
    
    //stop execution if is admin and tracking not allowed when logged in
    if( current_user_can('administrator') && $this->excludeTrackingLoggedinUser() == true ) {
      return;
    }

    if($this->isAnalyticsScriptActive()){

      //to body for no js tracking!
      add_action( 'wp_body_open', array( $this, 'getNoScriptTrackingPixels' ) );

      //javascript functions
      if($this->getCookieConsentStatus()){
        add_filter( 'wp_head', array( $this, 'loadCookieConsentBannerCommonFunctions' ) );
        add_filter( 'wp_head', array( $this, 'getCookieConsentBannerScript' ) );
      }

      add_filter( 'wp_head', array( $this, 'getTrackingScripts' ) );

    }

  }


  private $smtp_settings = array(
    "is_smtp" => false,//boolean
    "smtp_from" => NULL,//email
    "smtp_fromname" => NULL,//string
    "smtp_username" => NULL,//string
    "smtp_password" => NULL,//string
    "smtp_host" => NULL,//domain
    "smtp_port" => NULL,//numeric
    "smtp_auth" => true,//boolean
    "smtp_secure" => 'tsl',//tsl/ssl
  );
  public function getSMTPSettings(){
    return Helpers::getOption(
      $this->getOptPra().'_smtp_settings',
      $this->getSMTPSettingsDefaultValues(),
      '2',//always checks option if >= 2
      'option'        
    );
  }
  public function getSMTPSettingsDefaultValues(){
    return $this->smtp_settings;
  }      
  //single SMTPSetting
  public function getSMTPSetting($sub_field_name){
    return Helpers::getOption(
      $this->getSMTPSettingFieldName($sub_field_name),
      $this->getSMTPSettingDefaultValue($sub_field_name),
      '2',//always checks option if >= 2
      'option_mod',
      $this->getOptPra().'_smtp_settings'
    );
  }
  public function getSMTPSettingFieldName($sub_field_name) {
    return $sub_field_name;
  } 
  public function getSMTPSettingDefaultValue($key){
    return $this->smtp_settings[$key];
  }

  public function addSMTP(){

    add_action( 'phpmailer_init', array( $this, 'SMTPtoWPMail' ) );

  }
  public function SMTPtoWPMail( $phpmailer ) {

    $settings = $this->getSMTPSettings();

    if( is_array($settings) ){

      if( array_key_exists('is_smtp', $settings) && $settings['is_smtp'] == 1 ){

        $phpmailer->isSMTP();  
        
        if(!empty($settings['smtp_from'])){
          $phpmailer->From = $settings['smtp_from'];
        }
        if(!empty($settings['smtp_fromname'])){
          $phpmailer->FromName = $settings['smtp_fromname'];
        }
        if(!empty($settings['smtp_username'])){
          $phpmailer->Username = $settings['smtp_username'];
        }
        if(!empty($settings['smtp_password'])){
          $phpmailer->Password = $settings['smtp_password'];
        }
        if(!empty($settings['smtp_host'])){
          $phpmailer->Host = $settings['smtp_host'];  
        }
        if(!empty($settings['smtp_port'])){
          $phpmailer->Port = $settings['smtp_port'];
        }
  
        $phpmailer->SMTPSecure = $settings['smtp_secure'];
        $phpmailer->SMTPAuth = $settings['smtp_auth'];
  
      }   
      
    }

  }

}
