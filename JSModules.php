<?php

class JSModules {
   function __construct($config, $base_dir = "js", $base_url = "") {
      $this->config = array_merge(array(
         "base_dir" => $base_dir
      ), $config);
      $this->base_dir = $base_dir;
      $this->files = array();
      $this->module_config = array();
   }

   function include_module($module, $config = array()) {
      $this->files[] = $module;
      if (is_array($config) && count($config)) {
         if (!isset($this->module_config[$module]) || !is_array($this->module_config[$module])) $this->module_config[$module] = array();
         $this->module_config[$module][] = $config;
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
