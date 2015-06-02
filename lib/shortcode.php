<?php

/*
 * Offer box
 */
function bd_shortcode_offer_box($atts) {

  $a = shortcode_atts(array(0 => NULL, 'title' => '', 'offer' => '',), $atts);


  $output = '<div class="offer-box">';
  //$output .= 'TEST The offers';
  ob_start();
  ac_custom_loop('offer', 1, $a[0]);
  $loop = ob_get_contents();
  ob_end_clean();

  $output .= $loop;
  $output .= '</div>';


  return $output;
}

add_shortcode('offer-box', 'bd_shortcode_offer_box');

/*
 * Product group
 */
function bd_shortcode_product_group($atts) {

//  $a = shortcode_atts(array(
//    0 => NULL,
//    'title' => '',
//    'offer' => '',
//  ), $atts );

  $products = get_field(product_group);
  if(empty($products)){
    return;
  }

  $product_key = FALSE;

  foreach($products as $key => $product ){
    if (key_value_pair_exists($product, 'product_group_title', $atts[0])){
      $product_key = $key;
      break;
    }
  }

  if($product_key === FALSE){
    return;
  }

  $output = '<div class="product-group">';
  $output .= '<div class="product-group__title">';
  $output .= '<h3>' . $products[$product_key]["product_group_title"] . '</h3>';
  $output .= '</div>';
  $output .= '<div class="product-group__table--product">';
  $output .= '<table class="table--products">';
  foreach ($products[$product_key]['product'] as $product) :
    $output .= '<tr>';
    $output .= '<td class="table--product__title">';
    $output .= $product['product_title'];
    $output .= '<td>£</td>';

    $output .= '<td class="table--product__price">';
    $output .= number_format($product['product_price'], 2);
    $output .= '</td>';
    $output .= '<td class="table--product__pp">';
    $output .= '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">';
    $output .= '<input type="hidden" value="kwillicomb@aol.com" name="business">';
    $output .= '<input type="hidden" value="_xclick" name="cmd">';

    $output .= '<input type="hidden" value="1" name="upload">';
    $output .= '<input type="hidden" value="GBP" name="currency_code">';
    $output .= '<input type="hidden" value="2" name="rm">';
    $output .= '<input type="hidden" value="http:// ' . $_SERVER["SERVER_NAME"] . ' /thank-you" name="return">';
    $output .= '<input type="hidden" value="http://' . $_SERVER["SERVER_NAME"] . '/cancelled" name="cancel_return">';
    $output .= '<input type="hidden" value="' . $products[$product_key]['product_group_title'] . ' - ' . $product['product_title'] . '" name="item_name">';
    $output .= '<input type="hidden" name="charset" value="utf-8">';
    $output .= '<input type="hidden" name="custom" value="custom name" >';
    $output .= '<input type="hidden" value="' . number_format($product['product_price'], 2) . ' " name="amount">';
    $output .= '<input type="hidden" value="1" name="quantity">';
    $output .= '<input type="hidden" value="' . $product['product_title'] . '" name="on0">';
    $output .= '<input type="hidden" value="&pound;' . number_format($product['product_price'], 2) . ' " name="os0">';
    $output .= '<button class="table--product__buy" type="submit">Buy Now</button>';

    $output .= '</form>';

    $output .= '</td>';
    $output .= '</tr>';
  endforeach;
  $output .= '</table>';
  $output .= '</div>';
  $output .= '</div>';


  return $output;
}

add_shortcode('product-group', 'bd_shortcode_product_group');