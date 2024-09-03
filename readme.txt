=== ZMPlugin ===
Contributors: zuestmedia
Stable tag: 1.1.5
Tags: cookie notice, gdpr, analytics, matomo, smtp
Requires at least: 4.7
Tested up to: 6.6
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

ZMPlugin contains various essential tools for WordPress websites that every webmaster may need and is the companion plugin to our themes.

== Description ==

[ZMPlugin](https://zuestmedia.com/zmplugin/) offers a whole range of features that every WordPress website administrator will benefit from:

1. Cookie consent banner (GDPR compliant)
2. Tracking script integration (GA4, Tagmanager, Matomo)
3. Private mode with redirection
4. SMTP for WordPress transactional mails 
5. Block Patterns 

== Plugin Features ==

= Cookie consent banner =
Cookie Consent Banner for GDPR compliant use of tracking solutions. Tracking scripts will only be loaded after consent has been given.

= Tracking script integration =
Google Analytics 4, Google Tag Manager or Matomo (self-hosted) can be integrated. GDPR compliant if configured with cookie consent banner.

= Private Mode =
Private mode to redirect visitors to the login form or to a page of their choice. Useful for maintenance work or not yet finished websites.

= SMTP Mail =
Send all mails sent via wp_mail() from your own SMTP server. Works for all system mailings and also with contact form 7.

= Block Patterns =
Access to a selection of pre-built block patterns that can be easily inserted in the WordPress Gutenberg editor.

= WP Dashboard Options =
Personalization options for the WordPress dashboard. WordPress logo, help tabs as well as footer text can be customized.

= WP Login Options =
Personalization options for the WordPress login form (wp-login.php). The login logo as well as the redirect destination can be customized.

== Theme Companion Features ==

As a companion plugin for our [WordPress Themes](https://zuestmedia.com/themes/), ZMPlugin extends your WordPress dashboard with theme settings, customizer settings and the design explorer for importing starter designs.

= Block Templates =
Our Themes use block templates to display static or dynamic content. All block templates can be edited using the WordPress Gutenberg editor.

= Theme & Customizer settings =
When using a ZuestMedia WordPress Theme, various new menus and settings are added to the Dashboard and Customizer for customizing the theme.

= Design Explorer =
The design explorer offers the possibility to import directly premade starter designs.

Only available in combination with ZuestMedia Themes, e.g. Corporate or [Modular](https://wordpress.org/themes/zmt-modular/).

== Resources ==

Learn more about ZuestMedia WordPress [themes](https://zuestmedia.com/themes/) and [plugins](https://zuestmedia.com/plugins/).

If you have any questions or need help, visit the [ZMPlugin documentation](https://zuestmedia.com/doc/zmplugin-documentation/).

You can also find us on [Github](https://github.com/zuestmedia/)!

== Frequently Asked Questions ==

= How to install ZMPlugin? =
To install ZMPlugin, navigate to WordPress Dashboard >> Plugins >> Add New. Then type "ZMPlugin" in the search box, click install and activate.

= What extensions are available? =
The [AI Assistant](https://wordpress.org/plugins/zmp-ai-assistant/) is an extension based on ZMPlugin that allows you to interact with Open AI’s artificial intelligence directly in the WordPress dashboard. 

== Changelog === 

= 1.1.5 = 
* Update: navmenu preset rename to dropdown_navbar_nav, dropdowns always start with dropdown

= 1.1.4 =
* New: controll horizontal margin
* Update: controll vertical margin
* Update: UIKIT to 3.21.11

= 1.1.3 =
* Update: UIKIT to 3.21.9
* Fix: view condition option "all single posttypes" added

= 1.1.2 =
* Fix: moved getZMBlocksArray from zmpro/ThemeExport to zmplugin/ThemeImport, gave an error without zmpro installed when importing data in design explorer!!!

= 1.1.1 =
* New: Customizer Design Explorer & Pro Link
* Update: .pot file & translations

= 1.1.0 =
* Update: Less settings in simple mode (2)
* Update: All modes (1-4) available in free and pro version
* Update: Themesettings description
* Update: Design Explorer Cards
* Update: .pot file
* Fix: scrollspy to work with all types of html tags (div, article, ...)
* New: Card helpers added padding options

= 1.0.36 =
* Fix: Autofocus values 1 or to -> zero did not work to set off

= 1.0.35 =
* Update: add revisions to block templates in zmthemes
* Update: readme tags
* Update: .pot file added
* Update: translations

= 1.0.34 =
* Update: Tested up to WP 6.6

= 1.0.33 =
* Fix: Dynamic properties warnings (https://php.watch/versions/8.2/dynamic-properties-deprecated#AllowDynamicProperties)

= 1.0.32 =
* Update: Matomo Script dns-prefetch & preconnect added to speed up loading times

= 1.0.31 =
* Update: UIKIT CSS & JS to 3.20.5
* New: Theme setting added to asign template modules by page_ids (view.php)
* New: Setting to exclude logged-in admin user from tracking

= 1.0.30 =
* Fix: Theme imports fix menu assign by slug

= 1.0.29 =
* Update: UIKIT CSS & JS to 3.18.3
* Fix: rest api requests up to 10 (now 100)...!

= 1.0.28 =
* Update: split files in months by default in addLogfileEntry & showLogfileEntries

= 1.0.27 =
* Update: Tested up to WordPress 6.4
* Update: UIKIT CSS & JS to 3.17.10
* Fix: UpdateAPI to wp

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
