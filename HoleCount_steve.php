<?php
/**
 * Created by PhpStorm.
 * User: steveperry
 * Date: 8/27/15
 * Time: 6:20 PM
 */

/*error_reporting(0);*/

//score card
$points = [
  'a' => 1,
  'b' => 1,
  'd' => 1,
  'e' => 1,
  'g' => 1,
  'o' => 1,
  'p' => 1,
  'q' => 1,
  '4' => 1,
  '6' => 1,
  '8' => 2,
  '9' => 1,
  'A' => 1,
  'B' => 2,
  'D' => 1,
  'O' => 1,
  'P' => 1,
  'Q' => 1,
  'R' => 1,
  '0' => 1
];

//string with holes to be counted
$name = 'Booyaaa!';

//store counted holes. use either function (map_reduce, or count_holes)
$all_holes = count_holes_map_reduce($name);

//human readable response
echo $name . ' has ' . $all_holes . ' hole(s) in it';

//common loop solution
function count_holes($str, $points_ary) {
  $str = str_split($str);
  $count = 0;
  foreach ($str as $val) {
    if (isset($points_ary[$val])) {
      $count += $points_ary[$val];
    }
  }

  return $count;
}

//map reduce solution
function count_holes_map_reduce($str) {
  $str = str_split($str);
  $ltr_to_score = array_map("letter_to_points", $str);

  return array_reduce($ltr_to_score, function($carry, $item){
    return $carry + $item;
  });
}

//convert a letter to a score
function letter_to_points($letter) {
  global $points;
  return isset($points[$letter]) ? $points[$letter] : 0;
}