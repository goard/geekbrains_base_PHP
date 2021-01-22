<?php

function power(float $val = 0, int $pow = 1) : float {
  return $val *= $pow == 1 ? 1 :power($val, $pow-1);
}

var_dump(power(3,3));
