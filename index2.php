<?php

function caesarEncrypt($string, $shift) {
  $result = "";
  $string = preg_replace("[^a-zA-Z0-9]", "", $string); // удаляем все, кроме букв и цифр
  $string = mb_strtolower($string); // переводим все символы в нижний регистр
  $length = mb_strlen($string, 'UTF-8');
  for($i = 0; $i < $length; $i++) {
    $char = mb_substr($string, $i, 1, 'UTF-8');
    if (is_numeric($char)) { // если символ - цифра
      $result .= ($char + $shift) % 10; // сдвигаем и берем остаток от деления на 10
    } else { // иначе
      $code = ord($char) + $shift;
      if ($code > 122) { // если символ выходит за пределы латинского алфавита
        $code -= 26; // перематываем на начало алфавита
      }
      $result .= chr($code);
    }
  }
  return $result;
}
echo caesarEncrypt("helloworld1",2);



//function caesarDecrypt($string, $shift) {
//  $result = "";
//  $string = preg_replace("[^a-zA-Z0-9]", "", $string); // удаляем все, кроме букв и цифр
//  $string = mb_strtolower($string); // переводим все символы в нижний регистр
//  $length = mb_strlen($string, 'UTF-8');
//  for($i = 0; $i < $length; $i++) {
//    $char = mb_substr($string, $i, 1, 'UTF-8');
//    if (is_numeric($char)) { // если символ - цифра
//      $result .= ($char - $shift + 10) % 10; // сдвигаем и берем остаток от деления на 10
//    } else { // иначе
//      $code = ord($char) - $shift;
//      if ($code < 100) { // если символ выходит за пределы латинского алфавита
//        $code += 25; // перематываем на конец алфавита
//      }
//      $result .= chr($code);
//    }
//  }
//  return $result;
//}
//echo " = ";
//echo caesarDecrypt('Jjgnnqyqtnf3',2)."<br>";;