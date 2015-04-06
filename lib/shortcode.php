<?php

function bd_shortcode_offer_box($atts) {

    $a = shortcode_atts(array(
        0 => NULL,
        'title' => '',
        'offer' => '',
    ), $atts );


   $output = '<div class="offer-box">';
    //$output .= 'TEST The offers';
    ob_start();
    ac_custom_loop('offer', 1, $a[0] );
    $loop = ob_get_contents();
    ob_end_clean();

    $output .= $loop;
    $output .= '</div>';




    return $output;
}

add_shortcode('offer-box', 'bd_shortcode_offer_box');