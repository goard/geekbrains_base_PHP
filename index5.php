<?php

function transformStr(string $str) : string {
  return str_replace(" ", "_", $str);
}

var_dump(transformStr("Привет лунатикам привет мир!"));