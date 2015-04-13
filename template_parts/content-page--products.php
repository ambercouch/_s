<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page--products'); ?>>
  <header class="page__header">
    <?php the_title('<h1 class="page__title">', '</h1>'); ?>
  </header>
  <!-- .entry-header -->

  <div class="page__content">
    <?php the_content(); ?>

    <?php //print_r(get_field(product_group)); ?>

    <?php $products = get_field(product_group); ?>

    <div class="product-group">
      <div class="product-group__title">
        <h3><?php echo $products[0]['product_group_title']; ?></h3>
      </div>
      <div class="product-group__table--product">
        <table class="table--products">
          <?php foreach ($products[0]['product'] as $product) : ?>
            <tr>
              <td class="table--product__title">
                <?php echo $product['product_title'] ?>
              </td>
              <td class="table--product__currency">
                £
              </td>
              <td class="table--product__price">
                <?php echo number_format($product['product_price'], 2); ?>
              </td>
              <td class="table--product__pp">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                  <input type="hidden" value="paypal@ambercouch.co.uk" name="business">
                  <input type="hidden" value="_xclick" name="cmd">

                  <input type="hidden" value="1" name="upload">
                  <input type="hidden" value="GBP" name="currency_code">
                  <input type="hidden" value="2" name="rm">
                  <input type="hidden" value="http://<?php echo $_SERVER['SERVER_NAME'];?>/thank-you" name="return">
                  <input type="hidden" value="http://<?php echo $_SERVER['SERVER_NAME'];?>/cancelled" name="cancel_return">
                  <input type="hidden" value="<?php echo $products[0]['product_group_title']; ?> - <?php echo $product['product_title'] ?>" name="item_name">
                  <input type="hidden" name="charset" value="utf-8">
                  <input type="hidden" name="custom" value="custom name" >
                  <input type="hidden" value="<?php echo number_format($product['product_price'], 2); ?>" name="amount">
                  <input type="hidden" value="1" name="quantity">
                  <input type="hidden" value="<?php echo $product['product_title'] ?>" name="on0">
                  <input type="hidden" value="&pound;<?php echo number_format($product['product_price'], 2); ?>" name="os0">
                  <button class="table--product__buy" type="submit">Buy Now</button>

                </form>

              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>

    </div>

    <?php
    wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', '_s'), 'after' => '</div>',));
    ?>
  </div>
  <!-- .entry-content -->

  <footer class="page__footer">
    <?php edit_post_link(__('Edit', '_s'), '<span class="edit-link">', '</span>'); ?>
  </footer>
  <!-- .entry-footer -->
</article><!-- #post-## -->
