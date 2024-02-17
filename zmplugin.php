<?php
  /*
  Plugin Name: ZMPlugin
  Plugin URI: https://zuestmedia.com/zmplugin/
  Description: ZMPlugin contains various essential tools for WordPress websites that every webmaster may need and is the companion plugin to our themes.
  Author: ZuestMedia
  Author URI: https://zuestmedia.com/
  Version: 1.0.30
  Text Domain: zmplugin
  Domain Path: /languages
  ZMDLID: 2myl7t6emmbu4819uojautl0m0fo2fdktoaw
  ZMUPDAPI: wp
  */

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
  * use first action after plugins have loaded to init zmplugin!
  */
  add_action('plugins_loaded', 'zmplugin_init');
  function zmplugin_init() {

  /**
    * This is the global var of ZMPlugins!
    * @var array
    * @access public
    */
    global $zmplugin;

    /**
    * load plugin.php if not loaded to get plugin basename
    */
    if ( ! function_exists( 'plugin_basename' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

  /**
    * add pugin basename to global var for later use
    */
    $zmplugin['plugin_basename'] = plugin_basename( __FILE__ );

    $zmpluginpsr4autoloader = new ZMPluginPsr4AutoloaderClass;
    $zmpluginpsr4autoloader->register();

    //Core Classes
    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin', __DIR__ . '/app/');
    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin\Settings', __DIR__ . '/app/settings/');

    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin\ThemeCustomizer', __DIR__ . '/app/themecustomizer/');
    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin\ThemeSettings', __DIR__ . '/app/themesettings/');

    //Config Files
    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin\Config', __DIR__ . '/config/');

    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin\Config\ThemeCustomizer', __DIR__ . '/config/themecustomizer/');
    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin\Config\ThemeCustomizer\Controlls', __DIR__ . '/config/themecustomizer/controlls/');

    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin\Config\ThemeSettings', __DIR__ . '/config/themesettings/');

    $zmpluginpsr4autoloader->addNamespace('ZMP\Plugin\Config\ZMTheme\Presets', __DIR__ . '/config/zmtheme/presets/');

    new \ZMP\Plugin\Init();

  }

class ZMPluginPsr4AutoloaderClass {

  /**
    * An associative array where the key is a namespace prefix and the value
    * is an array of base directories for classes in that namespace.
    *
    * @var array
    */
    protected $prefixes = array();

  /**
    * Register loader with SPL autoloader stack.
    *
    * @return void
    */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

  /**
    * Adds a base directory for a namespace prefix.
    *
    * @param string $prefix The namespace prefix.
    * @param string $base_dir A base directory for class files in the
    * namespace.
    * @param bool $prepend If true, prepend the base directory to the stack
    * instead of appending it; this causes it to be searched first rather
    * than last.
    * @return void
    */
    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        // normalize namespace prefix
        $prefix = trim($prefix, '\\') . '\\';

        // normalize the base directory with a trailing separator
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';

        // initialize the namespace prefix array
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }

        // retain the base directory for the namespace prefix
        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $base_dir);
        } else {
            array_push($this->prefixes[$prefix], $base_dir);
        }
    }

  /**
    * Loads the class file for a given class name.
    *
    * @param string $class The fully-qualified class name.
    * @return mixed The mapped file name on success, or boolean false on
    * failure.
    */
    public function loadClass($class)
    {
        // the current namespace prefix
        $prefix = $class;

        // work backwards through the namespace names of the fully-qualified
        // class name to find a mapped file name
        while (false !== $pos = strrpos($prefix, '\\')) {

            // retain the trailing namespace separator in the prefix
            $prefix = substr($class, 0, $pos + 1);

            // the rest is the relative class name
            $relative_class = substr($class, $pos + 1);

            // try to load a mapped file for the prefix and relative class
            $mapped_file = $this->loadMappedFile($prefix, $relative_class);
            if ($mapped_file) {
                return $mapped_file;
            }

            // remove the trailing namespace separator for the next iteration
            // of strrpos()
            $prefix = rtrim($prefix, '\\');
        }

        // never found a mapped file
        return false;
    }

  /**
    * Load the mapped file for a namespace prefix and relative class.
    *
    * @param string $prefix The namespace prefix.
    * @param string $relative_class The relative class name.
    * @return mixed Boolean false if no mapped file can be loaded, or the
    * name of the mapped file that was loaded.
    */
    protected function loadMappedFile($prefix, $relative_class)
    {
        // are there any base directories for this namespace prefix?
        if (isset($this->prefixes[$prefix]) === false) {
            return false;
        }

        // look through base directories for this namespace prefix
        foreach ($this->prefixes[$prefix] as $base_dir) {

            // replace the namespace prefix with the base directory,
            // replace namespace separators with directory separators
            // in the relative class name, append with .php
            $file = $base_dir
                  . str_replace('\\', '/', $relative_class)
                  . '.php';

            // if the mapped file exists, require it
            if ($this->requireFile($file)) {
                // yes, we're done
                return $file;
            }
        }

        // never found it
        return false;
    }

  /**
    * If a file exists, require it from the file system.
    *
    * @param string $file The file to require.
    * @return bool True if the file exists, false if not.
    */
    protected function requireFile($file)
    {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }

}
