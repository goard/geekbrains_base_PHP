<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

</body>

</html>
<?php
const TRANSLITARR = array(
  'а' => 'a',
  'б' => "b",
  "в" => "v",
  "г" => "g",
  "д" => "d",
  "е" => "e",
  "ё" => "ye",
  "ж" => "zh",
  "з" => "z",
  "и" => "i",
  "й" => "y",
  "к" => "k",
  "л" => "l",
  "м" => "m",
  "н" => "n",
  "о" => "o",
  "п" => "p",
  "р" => "r",
  "с" => "s",
  "т" => "t",
  "у" => "u",
  "ф" => "f",
  "х" => "kh",
  "ц" => "ts",
  "ч" => "ch",
  "ш" => "sh",
  "щ" => "shch",
  "ъ" => "",
  "ы" => "y",
  "ь" => "",
  "э" => "e",
  "ю" => "yu",
  "я" => "ya",
);

function strTranslit(string $str): string
{
  $str = mb_strtolower($str);
  $strArr = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
  $strArrTr = array();
  for ($i = 0; $i <= array_key_last($strArr); $i++) {
    if ($strArr[$i] == " ") array_push($strArrTr, $strArr[$i]);
    elseif ($strArr[$i] == "." || $strArr[$i] == "," || $strArr[$i] == "-") {
      array_push($strArrTr, "");
    } else {
      foreach (TRANSLITARR as $key => $value) {
        if ($strArr[$i] == $key) {
          array_push($strArrTr, $value);
          break;
        }
      }
    }
  }
  return implode("", $strArrTr);
}

var_dump(strTranslit("Альбина."));
