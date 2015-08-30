<?php

echo <<<TABLES

<h3>Default:</h3>
<table id='first' class='display'>
   <thead>
      <tr>
         <th>Header 1</th>
         <th>Header 2</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>Cell 1</td>
         <td>Cell 3</td>
      </tr>
      <tr>
         <td>Cell 2</td>
         <td>Cell 4</td>
      </tr>
   </tbody>
</table>

<br><br><br>

<h3>With options:</h3>
<table id='second' class='display'>
   <thead>
      <tr>
         <th>Header 3</th>
         <th>Header 4</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>Cell 5</td>
         <td>Cell 7</td>
      </tr>
      <tr>
         <td>Cell 6</td>
         <td>Cell 8</td>
      </tr>
   </tbody>
</table>

TABLES;

?>
