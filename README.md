# php-requirejs-modules
A tool for loading RequireJS modules with configuration from within PHP

## Usage:

### Inclusion
```
include("RequireJSModules.php");
$modules = new RequireJSModules($requirejs_config, $javascript_dir);
```

### [Loading a module](//danielrw7.github.io/php-requirejs-modules/classes/RequireJSModules.html#method_load)
```
$modules->load("moduleName", array(
  "moduleOption" => "value",
  "anotherModuleOption" => "anotherValue"
));
```

### [Loading multiple modules](//danielrw7.github.io/php-requirejs-modules/classes/RequireJSModules.html#method_load_multiple)
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

### [Loading multiple instances of the same module](//danielrw7.github.io/php-requirejs-modules/classes/RequireJSModules.html#method_load_multiple)
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

-----------
[View Documentation](//danielrw7.github.io/php-requirejs-modules/classes/RequireJSModules.html)
