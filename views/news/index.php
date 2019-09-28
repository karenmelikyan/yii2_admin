<?php

$str = '';

foreach($news as $new){
   $str .= $new[id] . ' ' . $new[title] . '</br> ' . $new[content] . '</br>';
}

echo $str;