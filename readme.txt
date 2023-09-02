=== ZMPlugin ===
Contributors: zuestmedia
Stable tag: 1.0.26
Tags: cookie notice, gdpr, analytics, matomo, private, smtp, mail
Requires at least: 4.7
Tested up to: 6.3.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Essential tools for webmasters; cookie notice, analytics integration, private mode, SMTP mail and extension for ZuestMedia WordPress Themes.

== Description ==

[ZMPlugin](https://zuestmedia.com/zmplugin/) is a basic plugin for WordPress websites and contains several essential tools that every webmaster needs:

1. cookie notice (GDPR compliant). 
2. analytics integration (GA4, Tagmanager, Matomo). 
3. private mode for websites in development or temporary forwarding/redirection. 
4. send WordPress system mails via SMTP server. 
5. display options for dashboard and login form. 

Furterhmore, all [ZuestMedia WordPress Themes](https://zuestmedia.com/themes/) will be extended with theme settings, customizer settings and the design explorer to import starter designs.

== Plugin Features ==

= Cookie Notice =
Cookie Consent Banner for GDPR compliant integration of Google Analytics, Google Tag Manager and Matomo (self-hosted).

= Analytics =
Google Analytics 4, Google Tag Manager or Matomo (self-hosted) can be integrated. GDPR compliant if configured correctly.

= Private Mode =
Private mode to redirect visitors to the login form or to a page of their choice. Useful for maintenance work or not yet finished websites.

= SMTP Mail =
Send all mails sent via wp_mail() from your own SMTP server. Works for all system mailings and also with contact form 7.

= WP Dashboard Options =
Personalization options for the WordPress dashboard. WordPress logo, help tabs as well as footer text can be customized.

= WP Login Options =
Personalization options for the WordPress login form (wp-login.php). The login logo as well as the redirect destination can be customized.

= Block Patterns =
Access to a selection of pre-built block patterns that can be easily inserted in the WordPress Gutenberg editor.

= Block Templates <sup>*</sup> =
ZuestMedia WordPress Themes use block templates to display content statically or dynamically. All block templates can be edited using the WordPress Gutenberg editor.

= Customizer settings <sup>*</sup> =
When using a ZuestMedia WordPress Theme, additional customizer settings are displayed.

= Design Explorer <sup>*</sup> =
The design explorer offers the possibility to import directly premade starter designs.

<sup>*</sup> only available in combination with [ZuestMedia Themes](https://zuestmedia.com/themes/), e.g. Corporate or Modular

== Resources ==

Learn more about ZuestMedia WordPress [themes](https://zuestmedia.com/themes/) and [plugins](https://zuestmedia.com/plugins/).

If you have any questions or need help, visit the [ZMPlugin documentation](https://zuestmedia.com/doc/zmplugin-documentation/).

You can also find us on [Github](https://github.com/zuestmedia/)!

== Frequently Asked Questions ==

= How to install ZMPlugin? =
To install ZMPlugin, navigate to WordPress Dashboard >> Plugins >> Add New. Then type "ZMPlugin" in the search box, click install and activate.

== Changelog === 

= 1.0.26 =
* Update: UIKIT CSS & JS to  3.16.26
* Update: readme description

= 1.0.25 =
* Update: readme tags, description
* Update: up to 3 extensions including zmplugin
* Update: Cookie Consent button text & translation 
* Update: zmplugin dashboard manage and install links 
* Update: sidebar docs link to zuestmedia docs

= 1.0.24 =
* New: Cookie consent domain setting, to use on main and subdomain same cookie consent
* Update: Readme text
* Update: Privacy Url to cookie consent from WP privacy setting or alt url from plugin settings
* Update: UIKIT CSS & JS to  3.16.21

= 1.0.23 =
* New: Settings for trackingscripts to depend on cookie consent or not
* Update: New translations for cookie-consent
* Update: cookie consent script and css

= 1.0.22 =
* New: Translations for CH & AT
* Update: add disableCookies option to Matomo script
* Fix: GA4 Tracking Script updated

= 1.0.21 =
* Update: matomo settings created

= 1.0.20 =
* New: added matomo tracker methods setting

= 1.0.19 =
* Update: CookieConsentBanner style and accessibility

= 1.0.18 =
* Update: Design API -> design_explorer_api & _free_post_tag_id / _pro_post_tag_id changed to https://design.zuestmedia.com
* Update: UIKIT CSS & JS to  3.16.19

= 1.0.17 =
* Update: View / display settings updated -> "hide if" view_status added
* Update: ActiveCallbacks for hide if view_conditions in customizer
* Fix: view_conditions bbpress lowercase because of slug validation!

= 1.0.16 =
* New: AJAX Post Loading controlls
* New: Mobile menu preset navbar_dropdown_nav

= 1.0.15 =
* Update: UIKIT CSS & JS to 3.16.17
* Fix: use posts_per_page instead of numberposts (works for all query types)
* Fix: is_smtp settings

= 1.0.14 =
* New: WP Mail send through SMTP settings added

= 1.0.13 =
* Update: prepared for PHP 9; defined all dynamic properties in classes (except themecustomizer settings and controls)

= 1.0.12 =
* Update UIKIT CSS & JS to 3.15.24
* Update: CI/CD Routines

= 1.0.11 =
* Fix: Validation "text" added ;:- 

= 1.0.10 =
* Fix: Validation "str" dont use htmlspecialchars!

= 1.0.9 =
* Update: new function in PluginHelpers for addons -> registerExtensionCheck()
* Fix: added setting _css_type to AdminButtonRestore

= 1.0.8 =
* Update: showLogfileEntries file exists check added

= 1.0.7 =
* New: added methods addLogfileEntry & showLogfileEntries

= 1.0.6 =
* New: Custom CSS classes for background-img-size and background-pos
* New: WP_KSES settings added to CustomizerControlls / ThemeCustomizer
* Fix: Escaping all $variables in CustomizerControlls (wp_kses)
* Fix: Presets access_level auto = 3
* Removed: getRequiredPluginsTable
* Removed: Skewy

= 1.0.5 =
* New: new customizer controlls for imageoverlay size and wrap in articlecontainer

= 1.0.4 =
* New: ThemeHelper Class, Blockpatterns Class
* Update: UIKIT Version 3.15.14
* Update: Load Textdomain early
* Update: various controlls choices and preset settings
* Fix: Escaping CustomizerControlls and remove some unused controlls
* Fix: Order of Adminmenu Pages
* Fix: Readme Resources documentation url updated
* Fix: Translations of Cookie Consent Banner

= 1.0.3 =
* Fix: Plugin URI / Author URI

= 1.0.2 =
* Update: Tested up to: 6.1
* Fix: Validation - arrays checks for NULL now, (PHP Warning during saving themesettings)

= 1.0.1 =
* New: Moved BlockTemplates Custom Post Type from theme to plugin
* Update: readme.txt
* Update: Language Files de_DE

= 1.0.0 =
* Update: readme.txt
* Update: theme-settings-template documentation and pro link changed
* Added: new controlls - avatar_class, meta_subnav_attrs
* Added: controll choice - _element "main"
* Update: Services Free/Pro id

= 0.9.11 =
* Update: Presets some args not resetting anymore on preset Change
* Update: Presets postmeta choices
* Update: Presets sitelogo choices
* Update: UIKIT Version 3.15.10
* Update: Customizer Visibility Controll - tablet landscape
* New: Customizer Image Controll - align

= 0.9.10 =
* New: BlockPatterns API
* Removed: static BlockPatterns html
* Updated: Customizer Controlls Background Image and others
* Updated: Presets files created

= 0.9.9 =
* Update: Language Files
* Fix: Cookie Consent Banner Colors and Links/Button Hover

= 0.9.8 =
* Update: UIKIT Version 3.15.6
* Update: Presets CSSVars
* New: CSSType Settings
* Update: css_type import/export
* Update: customizer controlls

= 0.9.7 =
* Update: some Controlls & Validation - prepared for template-editor quickedit pro setting.

= 0.9.6 =
* Fix: Block Patterns check if folder exists (php error)

= 0.9.5 =
* Fix: Com-Type and Module labels fixed

= 0.9.4 =
* New: Block Templates (CPT)
* New: Block Patterns
* New: Color Presets
* Fix: Customizer controlls permissions
* Update: UIKIT updated to version 3.15.3
* Update: Themesettings Pages
* Update: Template Blocks - Widgets (blocks) confusion solved and renamed
* Update: Import/Export new fields - show_on_front, zm_blocks
* Update: Translation Files DE

= 0.9.3 =
* Update: ci/cd update
* Update: QueryTerm presets added and controll updated
* Update: added com_postmeta controll (no view_status settings without com_ file!)

= 0.9.2 =
* Update: Tested up to: 6.0.1
* Update: Descriptions optimized
* Update: UIKIT updated to Version 3.15.1
* Fix: hide template-editor sidebar in customizer
* Removed: Customizer controlls - multiselect & javascript
* Update: Added new dropdown-background-color css var setting
* Update: Security - escaping functions added to templates
* Update: Module Configs (uk-sticky, uk-navbar)
* Update: New Settings added: Tracking & Analytics, Cookie Consent Banner
* Update: New Settings added: WP Dashboard, WP Login Form
* Update: View Settings extended
* Update: Internationalization - added/updated translations
* Update: removed VersionNotice from config and Plugin

= 0.9.1 =
* Connected with ZM Update API

= 0.9.0 =
* Initial release of ZMPlugin

== The plugin uses the following third-party resources ==
* uikit CSS, JS, Icons Framework
License: MIT
Source: https://getuikit.com/

== Copyright ==
ZMPlugin WordPress Plugin, Copyright 2023 zuestmedia.com
ZMPlugin is distributed under the terms of the GNU GPL
