<?php
  function sum(float $a=0, float $b=0) : float {
    return $a + $b;
  }

  function dif(float $a=0, float $b=0) : float {
    return $a - $b;
  }

  function mul(float $a=1, float $b=1) : float {
    return $a * $b;
  }

  function div(float $a=0, float $b=1) : float {
    return $a / $b;
  }

  var_dump(sum(2,3));
  var_dump(dif(2,3));
  var_dump(mul(2,3));
  var_dump(div(2,3));
?>