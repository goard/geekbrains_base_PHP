<?php
  //TYPE const
  const SUM = "сложение";
  const DIF = "вычитание";
  const MUL = "умножение";
  const DIV = "деление";

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

function mathOperation(float $arg1, float $arg2, string $operation) {
  switch ($operation) {
    case SUM:
      return sum($arg1,$arg2);
      break;
    case DIF:
      return dif($arg1,$arg2);
      break;
    case MUL:
      return mul($arg1,$arg2);
      break;
    case DIV:
      return div($arg1,$arg2);
      break;

    default:
      echo "Введите арифметические операции \"сложение\",\"вычитание\",\"умножение\",\"деление\"";
      break;
  }
}

var_dump(mathOperation(2,10, DIV));