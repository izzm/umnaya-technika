<?php
  require_once('outlets.php');
  
  $outlets_tree = array();
  foreach($outlets as $outlet) {
    $c = $outlet['CITY'];
    $r = $outlet['REGION'];
    $a = $outlet['ADDRESS'];
    $n = $outlet['NAME'];
    
    if(!isset($outlets_tree[$c])) {
      $outlets_tree[$c] = array();
    }
    if(!isset($outlets_tree[$c][$r])) {
      $outlets_tree[$c][$r] = array();
    }
    if(!isset($outlets_tree[$c][$r][$n])) {
      $outlets_tree[$c][$r][$n] = array();
    }
    
    $outlets_tree[$c][$r][$n][$a] = $outlet['ID_OUTLET'];
  }
  
  ksort($outlets_tree);
  echo 'window.outlets = ' . json_encode($outlets_tree) . ';';
  //echo json_encode($outlets_tree);
?>
