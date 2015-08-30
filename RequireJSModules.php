<?php

class RequireJSModules {
   function __construct($config, $base_dir = "js") {
      $this->config = array_merge(array(
         "base_dir" => $base_dir
      ), $config);
      $this->base_dir = $base_dir;
      $this->files = array();
      $this->module_config = array();
   }

   function load($module, $config = array()) {
      $this->files[] = $module;
      if (is_array($config) && count($config)) {
         if (!isset($this->module_config[$module]) || !is_array($this->module_config[$module])) $this->module_config[$module] = array();
         $this->module_config[$module][] = $config;
      }
   }

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
