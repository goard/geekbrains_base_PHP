<?php

$a = 0;
$b = 0;

if ($a>=0 && $b>=0) return var_dump($a-$b);
if ($a<0 && $b<0) return var_dump($a*$b);
if (($a<0 && $b>=0) ||($a>=0 && $b<0)) return var_dump($a+$b);
