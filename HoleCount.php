<?php

function countHoles($str) {
    $count = 0;
    $chars = str_split($str);
    foreach($chars as $char) {
        if ( in_array ( $char, ["B", "8"] ) ) {
            $count += 2;
            }
        elseif ( in_array ( $char, ["A", "D", "O", "P", "Q", "R", "a", "b", "d",
                  "e", "g", "o", "p", "q", "4", "6", "9", "0"] ) ) {
            $count += 1;
            }
    }

    return $count;
}

print countHoles("This is a WebLab exercise that has 12 holes in it");

?>
