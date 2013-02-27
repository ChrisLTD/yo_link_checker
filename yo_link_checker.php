<?php
/* 
Yo Link Checker
Version .01
===========
Accepts a serialized array of urls via POST, checks each link for a 404, and displays a table of working and invalid links.
===========
By Chris Johnson 
http://chrisltd.com
Created February 2013
*/

// Generate results table
function generate_results_table($array){
  $output = "";
  $notfound_count = 0;
  $count = 0;
  foreach ($array as $key => $value) {
    $count ++;
    $output .= '<tr>';
    $output .= '<td>';
    $link_headers = get_headers($value, 1);
    if(strpos($link_headers[0], " 404 ")){
      $output .= '<b title="' . $value . '">Not Found</b>';
      $notfound_count++;
    }
    $output .= '</td>';
    $output .= '<td>' . $count . '.</td>';
    $output .= '<td><a href="' . $value . '">'. $value .'</a></td>';
  }
  $output = '<table><tr><td colspan="3"><b>' . $notfound_count . '</b> out of ' . $count . ' links not found.<br><br></td></tr>' . $output . '</table>';
  return $output;
}
?>

<html>
<head>
  <title></title>
  <style>
    body { margin: 2em; font-family: 'Helvetica Neue', Arial, Helvetica, sans-serif; }
    a { text-decoration: none; }
    b { color: red; }
    table { margin: 0 auto; }
    table td { padding: 5px 3px; } 
    table tr + tr td { border-top: 1px #eee solid; }
  </style>
</head>
<body>

<?php

// Check for array
if( isset($_REQUEST["links_array"]) ){
  $form_variable = $_POST["links_array"];
  if (get_magic_quotes_gpc()) { // Check to see if Magic Quotes is on, if so, stripslashes is necessary http://stackoverflow.com/questions/2888418/unserialize-problem-in-php
    $form_variable = stripslashes($form_variable); 
  }
  $links_array = unserialize($form_variable);
  if( $links_array[0] ){ // valid array?
    echo generate_results_table($links_array);
  }
} else {
  echo "<b>Error:</b> Invalid or missing links array.";
}

?>


</body>
</html>