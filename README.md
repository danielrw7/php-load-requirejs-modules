# php-requirejs-modules
A tool for loading RequireJS modules with configuration from within PHP

## Usage:

### Inclusion
```
<?php

include("RequireJSModules.php");

$requirejs_config = array();
$javascript_dir = "js";

$modules = new RequireJSModules($requirejs_config, $javascript_dir);
```

### [Loading a module](examples/load)
```
$modules->load("moduleName", array(
  "moduleOption" => "value",
  "anotherModuleOption" => "anotherValue"
));
```

### [Loading multiple modules](examples/load_multiple)
```
$modules->load(array(
  array(
    "file" => "moduleName",
    "options" => array(
      "moduleOption" => "value",
      "anotherModuleOption" => "anotherValue"
    )
  ),
  array(
    "file" => "anotherModule",
    "options" => array(
      "moduleOption" => "value",
      "anotherModuleOption" => "anotherValue"
    )
  ),
));
```

### [Loading multiple instances of the same module](examples/load_multiple)
```
$modules->load("moduleName", array(
  array(
    "moduleOption" => "value",
    "anotherModuleOption" => "anotherValue"
  ),
  array(
    "moduleOption" => "value",
    "anotherModuleOption" => "anotherValue"
  ),
));
```

### [Output HTML scripts](//danielrw7.github.io/php-requirejs-modules/classes/RequireJSModules.html#method_output)
```
echo $modules->output();
```

-----------
[View Documentation](//danielrw7.github.io/php-requirejs-modules/classes/RequireJSModules.html)
