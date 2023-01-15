=== ZMPlugin ===
Contributors: zuestmedia
Stable tag: 1.0.10
Tags: block patterns, cookie consent banner, customizer, zmtheme
Requires at least: 4.7
Tested up to: 6.1.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

ZMPlugin is an extension for WordPress themes based on the ZM-Theme-Framework and extends ZMT-Themes with various options and customizer settings.

== Description ==

[ZMPlugin](https://zmplugin.com/) is an extension for WordPress themes based on the [ZM-Theme-Framework](https://zmtheme.com/) (ZMT) and extends ZMT-Themes with various options and customizer settings. This plugin can also be used as a "standalone" plugin in a reduced scope.

== Plugin Features ==

= Block Patterns =
Access to a selection of pre-built block patterns that can be easily inserted in the WordPress Gutenberg editor.

= Block Templates <sup>*</sup> =
ZMT themes use block templates to display content statically or dynamically. All block templates can be edited using the WordPress Gutenberg editor.

= Cookie Consent Banner =
Cookie Consent Banner for GDPR compliant integration of Google Analytics, Google Tag Manager and Matomo (self-hosted).

= Customizer settings <sup>*</sup> =
When using a WordPress theme based on the ZM theme framework, additional customizer settings are displayed.

= Design Explorer <sup>*</sup> =
The design explorer offers the possibility to import directly prefabricated starter designs.

= Private Mode =
Private mode to redirect visitors to the login form or to a page of their choice. Useful for maintenance work or not yet finished websites.

= Tracking & Analytics  =
Google Analytics 4, Google Tag Manager or Matomo (self-hosted) can be integrated. GDPR compliant if desired, if Cookie Consent banner is enabled.

= WP Dashboard Options =
Personalization options for the WordPress dashboard. WordPress logo, help tabs as well as footer text can be customized.

= WP Login Options =
Personalization options for the WordPress login form (wp-login.php). The login logo as well as the redirect destination can be customized.

<sup>*</sup> only available in combination with [ZMT Themes](https://zmtheme.com/), e.g. Corporate or Modular

== Resources ==

Learn more about ZM WordPress themes and plugins at [zmtheme.com](https://zmtheme.com/).

If you have any questions or need help, visit the [documentation page](https://zmtheme.com/documentation/).

You can also find us on [Github](https://github.com/zuestmedia/)!


== Frequently Asked Questions ==

= How to install ZMPlugin? =
To install ZM Plugin, go to Dashboard >> Plugins >> Add new. Then enter "ZMPlugin" in the search field, click on install and activate.

= Does ZMPlugin work as standalone? =
Yes. The website management and config settings are working on all themes. The extended customizer settings are only available with ZMTheme WordPress Themes.

== Changelog ==

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

== Copyright ==
ZMPlugin WordPress Plugin, Copyright 2022 zmplugin.com
ZMPlugin is distributed under the terms of the GNU GPL

== Resources ==
* uikit © 2022 YOOtheme GmbH, MIT
