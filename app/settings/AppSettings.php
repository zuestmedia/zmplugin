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
    		height:80px;
    		width:100%;
    		background-size: auto;
    		background-repeat: no-repeat;
        <?php if( $this->getLoginLogoUrl() == false ){ ?>
        text-indent: 0;
        <?php } ?>
      }
    </style>
    <?php

  }
  public function addLoginLogo(){
    if( $this->getLoginLogoTitle() ){
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

  public function HelpTab( $old_help, $screen_id, $screen ){
      $screen->remove_help_tabs();
      return $old_help;
  }
  public function removeHelpTab() {
    if( $this->getRemoveHelpTabs() ){
      add_filter( 'contextual_help', array( $this, 'HelpTab' ), 999, 3 );
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
    return __('By clicking Accept, you accept the storing of cookies on your device to enhance site navigation, analyze site usage, and assist in our marketing efforts.', 'zmplugin');
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

  /**
  * Cookie Consent Functions
  */
  public function loadCookieConsentBannerCommonFunctions(){

    ?>

    <script>

      function zmCreateCookie(name,value,days) {
        if (days) {
          var date = new Date();
          date.setTime(date.getTime()+(days*24*60*60*1000));
          var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
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
        z-index: 99999999;
        position: fixed !important;
        bottom: 0;
        left: 0;
        right: 0;
        max-width: 100%;
      }
      .zminnercookieconsentbox{
        margin: 0 !important;
        text-align: center !important;
        background: var(--color_background_secondary, #253946);
        color: rgba( var(--color_text_inverse, 255, 255, 255), 1 );
        position: relative;
        padding: 15px 29px 15px 15px;
      }
      .zmcookieconsenttext{
        margin-bottom: 0;
        font-size: var(--text_small_fontsize, 0.875rem);
        line-height: var(--text_small_lineheight, 1.5);
      }
      .zmcookieconsentnotice{
        margin-left: 40px !important;
        color: rgba(var(--color_text_inverse,255,255,255),.5) !important;
        text-decoration: none;
        cursor: pointer;
      }
      .zmcookieconsentnotice:hover{
        color: rgba(var(--color_text_inverse,255,255,255),.7) !important;
        text-decoration: none;
      }
      .zmcookieconsentbutton{
        cursor: pointer;
        margin-left: 40px !important;
        padding: 0 15px;
        background-color: var(--color_background_muted, #f8f8f8);
        color: var(--color_text_emphasis, #333);
        margin: 0;
        border: none;
        overflow: visible;
        font: inherit;
        line-height: 30px;
        font-size: 0.875rem;
        text-transform: none;
        -webkit-appearance: none;
        border-radius: 0;
        display: inline-block;
        box-sizing: border-box;
        vertical-align: middle;
        text-align: center;
        text-decoration: none;
      }
      .zmcookieconsentbutton:hover{
        filter:brightness(110%);
      }
      .zmcookieconsentbuttonaccept{}
      .zmcookieconsentbuttondecline{
        margin-left: 20px !important;
      }
    </style>
    <script>

        function zmRemoveCookieConsentBanner(){

          element = document.getElementById('zmcookieconsentbanner');
          element.remove();

        }

        function zmCreateCookieConsentBanner(){

          var tag_position = document.createElement("div");
          tag_position.className = 'zmoutercookieconsentbox';
          tag_position.setAttribute('id', 'zmcookieconsentbanner');

          var tag_alert = document.createElement("div");
          tag_alert.className = 'zminnercookieconsentbox';
          tag_alert.setAttribute('uk-alert', '');

          var tag_text = document.createElement("p");
          tag_text.className = 'uk-text-small zmcookieconsenttext';
          tag_text.innerHTML = '<?php echo esc_html( $this->getCookieConsentText() ); ?>';

          var tag_cookie_notice = document.createElement("a");
          tag_cookie_notice.className = 'zmcookieconsentnotice';
          tag_cookie_notice.setAttribute('href', '<?php echo esc_url( $this->getCookieConsentPrivacyUrl() ); ?>');
          tag_cookie_notice.innerHTML = '<?php echo __( 'Cookie Notice', 'zmplugin' ); ?>';

          var tag_button_accept = document.createElement("span");
          tag_button_accept.className = 'zmcookieconsentbutton zmcookieconsentbuttonaccept';
          tag_button_accept.setAttribute('id', 'zmcookieconsentaccept2');
          //tag_button_accept.innerHTML = 'Accept';
          tag_button_accept.innerHTML = '<?php echo __( '✓ Accept', 'zmplugin' ); ?>';

          var tag_button_decline = document.createElement("span");
          tag_button_decline.className = 'zmcookieconsentbutton zmcookieconsentbuttondecline';
          tag_button_decline.setAttribute('id', 'zmcookieconsentdecline2');
          //tag_button_decline.innerHTML = 'Decline';
          tag_button_decline.innerHTML = '<?php echo __( '✗ Decline', 'zmplugin' ); ?>';

                tag_text.appendChild(tag_cookie_notice);
                tag_text.appendChild(tag_button_accept);
                tag_text.appendChild(tag_button_decline);
              tag_alert.appendChild(tag_text);
            tag_position.appendChild(tag_alert);
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
              zmCreateCookie('zm_cookie_consent', 1, 365);
              zmRemoveCookieConsentBanner();

              zmLoadTrackingScripts();

              var matomoexception = '<?php echo esc_attr( $this->getMatomoNoCookieTrackingStatus() ); ?>';
              if( matomoexception != 1){
                zmLoadMatomoScriptsWithException();
              }

            };
            document.getElementById("zmcookieconsentdecline2").onclick = function(){

              //console.log('cookie created with name: zm_cookie_consent value: 0 and days: 30');
              zmCreateCookie('zm_cookie_consent', 0, 7);
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
    /*
    * g4-a:
    * script tag must be added via document head appendChild...
    * <script async src="https://www.googletagmanager.com/gtag/js?id=G-YZHBGBPXNH"></script>
    * noscript via php! to body --> no noscript via js!!! :-)
    */
    ?>

    <script>
      <?php if($this->getG4AId()){ ?>
        function zmLoadG4AScript(){

          var script_w_src = document.createElement('script');
          script_w_src.setAttribute('src','https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $this->getG4AId() ); ?>');
          script_w_src.setAttribute('async','');
          document.head.appendChild(script_w_src);

          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'G-YZHBGBPXNH');

        }
      <?php } ?>

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
          /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
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

      function zmLoadTrackingScripts(){

        //g4-a
        <?php if($this->getG4AId()){ ?>
        zmLoadG4AScript();
        <?php } ?>

        //gtm
        <?php if($this->getGTMId()){ ?>
        zmLoadGTMScript();
        <?php } ?>

      }
      function zmLoadMatomoScriptsWithException(){

        //mato
        <?php if( $this->getMatomoUrl() && $this->getMatomoSiteId() ){ ?>
        zmLoadMatoScript();
        <?php } ?>

      }

      function zmInitCookieConsentTrackingScripts(){

          var zm_cookie_consent = zmReadCookie('zm_cookie_consent');

          if( zm_cookie_consent == 1 ){
            zmLoadTrackingScripts();
          }

          var matomoexception = '<?php echo esc_attr( $this->getMatomoNoCookieTrackingStatus() ); ?>';
          if( zm_cookie_consent == 1 || matomoexception == 1){
            zmLoadMatomoScriptsWithException();
          }

      }

      function zmCheckCookieConsentStatusAndMaybeLoadScripts(){

        var cookieconsentstatus = '<?php echo esc_attr( $this->getCookieConsentStatus() ); ?>';

        if(cookieconsentstatus == 1){

          //load scripts only if cookie consent is accepted!
          zmInitCookieConsentTrackingScripts();

        } else {

          //load scripts always
          zmLoadTrackingScripts();
          zmLoadMatomoScriptsWithException();

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

  public function addCookieConsentBanner() {

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

}
