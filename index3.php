<?php
  $a = 12;
  $b = 35;
  echo "initial a = $a, initial b = $b" . '<br>';

  $a = $a + $b;
  $b = $a - $b;
  $a = $a - $b;
  echo "a = $a, b = $b";

?>