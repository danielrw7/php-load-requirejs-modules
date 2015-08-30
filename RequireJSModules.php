<?php

/**
 * A helper class for loading RequireJS modules with options
 *
 * @author Daniel Wilson <danielrw7@gmail.com>
 */
class RequireJSModules {
   /**
    * @var array $files Files that will be outputted
    */
   public $files = array();

   /**
    * @var mixed[] $module_config An assoc array that will be passed to requirejs.config
    */
   public $module_config = array();

   /**
    * @var string $base_dir The base directory for javascript files that will be loaded
    */
   public $base_dir = "";

   /**
    * The class constructor
    *
    * @param mixed[] $config An assoc array that will be passed to requirejs.config
    * @param string  $base_dir The base directory for javascript files that will be loaded
    */
   function __construct($config, $base_dir = "js") {
      $this->config = array_merge(array(
         "base_dir" => $base_dir
      ), $config);
      $this->base_dir = $base_dir;
   }

   /**
    * Save module name and configuration
    *
    * @param string $module The module name
    * @param array  $config The configuration for the module
    */
   function load($module, $config = array()) {
      $this->files[] = $module;
      if (is_array($config) && count($config)) {
         if (!isset($this->module_config[$module]) || !is_array($this->module_config[$module])) $this->module_config[$module] = array();
         $this->module_config[$module][] = $config;
      }
   }

   /**
    * Load multiple modules
    *
    * @param string|array $arg1 The module name or an array with multiple modules
    * @param array $config Multiple configurations for when $arg1 is a module name.
    */
   function load_multiple($arg1, $arg2 = array()) {
      if (gettype($arg1) == "string") {
         $module = $arg1;
         $options_arr = $arg2;
         foreach($options_arr as $options) {
            $this->load($module, $options);
         }
      } else if (is_array($arg1)) {
         $modules = $arg1;
         foreach($modules as $module) {
            if (is_array($module)) {
               if (isset($module['options'])) {
                  $this->load($module['file'], $module['options']);
               } else {
                  $this->load($module['file']);
               }
            } else {
               $this->load($module);
            }
         }
      }
   }

   /**
    * Generate HTML scripts to be outputted into the page
    *
    * @return string Script tags to output into the page
    */
   function output() {
      $requre_config_json = json_encode($this->config);
      $files_json = json_encode($this->files);
      $config_json = json_encode($this->module_config);

      $output .= <<<SCRIPTS
<script>
   requirejs.config($requre_config_json);
   (function() {
      var files = JSON.parse('$files_json');
      var config = JSON.parse('$config_json');
      for(var file in config) {
         require([file], function(module) {
            module.init(config[file]);
         });
      }
   }());
</script>
SCRIPTS;

      return $output;
   }
}

?>
