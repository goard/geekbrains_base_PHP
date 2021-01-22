<?php
$i = 0;
do {
  echo $i . ' - ';
  if ($i === 0) {
    echo "ноль.<br/>";
    $i++;
    continue;
  }
  if ($i % 2) echo "нечетное число. <br/>";
  else echo "четное число. <br/>";
  $i++;
} while ($i <= 10);
