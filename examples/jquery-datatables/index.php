<?php

require_once("../../RequireJSModules.php");

$js_modules = new RequireJSModules(array(
   "paths" => array(
      "jquery" => "//code.jquery.com/jquery-2.1.4.min",
      "datatables" => "//cdn.datatables.net/1.10.8/js/jquery.dataTables.min",
   ),
), ".");

$js_modules->load_multiple("datatable", array(
   array(
      "selector" => "#first",
   ),
   array(
      "selector" => "#second",
      "ordering" => false,
      "paging"   => false,
      "filter"   => false,
   ),
));


echo "
<html>
   <head>
      <link rel='stylesheet' type='text/css' href='//cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css'/>
      <script src='lib/require.js'></script>
      {$js_modules->output()}
   </head>
   <body>
";
include("tables.php");

?>
