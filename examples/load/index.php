<?php
/**
 * An example of using the method `load`
 */

require_once("../../RequireJSModules.php");

$js_modules = new RequireJSModules(array(), ".");

$js_modules->load("example", array(
   "option1" => "value",
   "option2" => "value",
));

$js_modules->load("example", array(
   "option1" => "another value",
   "option2" => "another value",
));

echo "<script src='lib/require.js'></script>";
echo $js_modules->output();

?>
