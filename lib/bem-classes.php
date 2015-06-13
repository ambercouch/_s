<?php
/*
 * bem css class added to wordpress generated markup
 */

//.menu__item
function ac_menu_classes($classes , $item){
$classes[]= "menu__item";
return $classes;
}
add_filter( 'nav_menu_css_class', 'ac_menu_classes', 10, 2 );