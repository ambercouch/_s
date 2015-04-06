<?php

function bd_shortcode_offer_box($atts) {
    $output = "This is an offer";
    return $output;
}

add_shortcode('offer-box', 'bd_shortcode_offer_box');