<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _s
 */
if (!function_exists('the_posts_navigation')) :

  /**
   * Display navigation to next/previous set of posts when applicable.
   *
   * @todo Remove this function when WordPress 4.3 is released.
   */
//  function the_posts_navigation() {
//    // Don't print empty markup if there's only one page.
//    if ($GLOBALS['wp_query']->max_num_pages < 2) {
//      return;
//    }
//    ?>
<!--    <nav class="test navigation posts-navigation" role="navigation">-->
<!--      <h2 class="screen-reader-text">--><?php //_e('Posts navigation', '_s'); ?><!--</h2>-->
<!--      <div class="nav-links">-->
<!---->
<!--        --><?php //if (get_next_posts_link()) : ?>
<!--          <div class="nav-previous">--><?php //next_posts_link(__('Older posts', '_s')); ?><!--</div>-->
<!--        --><?php //endif; ?>
<!---->
<!--        --><?php //if (get_previous_posts_link()) : ?>
<!--          <div class="nav-next">--><?php //previous_posts_link(__('Newer posts', '_s')); ?><!--</div>-->
<!--        --><?php //endif; ?>
<!---->
<!--      </div><!-- .nav-links -->-->
<!--    </nav><!-- .navigation -->-->
<!--    --><?php
//  }

endif;

if (!function_exists('the_post_navigation')) :

  /**
   * Display navigation to next/previous post when applicable.
   *
   * @todo Remove this function when WordPress 4.3 is released.
   */
  function the_post_navigation() {
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);

    if (!$next && !$previous) {
      return;
    }
    ?>
    <nav class="navigation post-navigation" role="navigation">
      <h2 class="screen-reader-text"><?php _e('Post navigation', '_s'); ?></h2>
      <div class="nav-links">
        <?php
        previous_post_link('<div class="nav-previous">%link</div>', '%title');
        next_post_link('<div class="nav-next">%link</div>', '%title');
        ?>
      </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
  }

endif;

if (!function_exists('_s_posted_on')) :

  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function _s_posted_on() {
    $time_string = '<time class="post__date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
      $time_string = '<time class="post__date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
    );

    $posted_on = sprintf(
            _x('Posted on %s', 'post date', '_s'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    $byline = sprintf(
            _x('by %s', 'post author', '_s'), '<span class="post__author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="post__posted-on">' . $posted_on . '</span><span class="post__byline"> ' . $byline . '</span>';
  }

endif;

if (!function_exists('_s_entry_footer')) :

  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function _s_entry_footer() {
    // Hide category and tag text for pages.
    if ('post' == get_post_type()) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list(__(', ', '_s'));
      if ($categories_list && _s_categorized_blog()) {
        printf('<span class="post__cat-links">' . __('Posted in %1$s', '_s') . '</span>', $categories_list);
      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list('', __(', ', '_s'));
      if ($tags_list) {
        printf('<span class="post__tags-links">' . __('Tagged %1$s', '_s') . '</span>', $tags_list);
      }
    }

    if (!is_single() && !post_password_required() && ( comments_open() || get_comments_number() )) {
      echo '<span class="post__comments-link">';
      comments_popup_link(__('Leave a comment', '_s'), __('1 Comment', '_s'), __('% Comments', '_s'));
      echo '</span>';
    }

    edit_post_link(__('Edit', '_s'), ' <span class="post__edit-link">', '</span>');
  }

endif;



if (!function_exists('the_archive_description')) :

  /**
   * Shim for `the_archive_description()`.
   *
   * Display category, tag, or term description.
   *
   * @todo Remove this function when WordPress 4.3 is released.
   *
   * @param string $before Optional. Content to prepend to the description. Default empty.
   * @param string $after  Optional. Content to append to the description. Default empty.
   */
  function the_archive_description($before = '', $after = '') {
    $description = apply_filters('get_the_archive_description', term_description());

    if (!empty($description)) {
      /**
       * Filter the archive description.
       *
       * @see term_description()
       *
       * @param string $description Archive description to be displayed.
       */
      echo $before . $description . $after;
    }
  }

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function _s_categorized_blog() {
  if (false === ( $all_the_cool_cats = get_transient('_s_categories') )) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories(array(
        'fields' => 'ids',
        'hide_empty' => 1,
        // We only need to know if there is more than one category.
        'number' => 2,
    ));

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count($all_the_cool_cats);

    set_transient('_s_categories', $all_the_cool_cats);
  }

  if ($all_the_cool_cats > 1) {
    // This blog has more than 1 category so _s_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so _s_categorized_blog should return false.
    return false;
  }
}

/**
 * Flush out the transients used in _s_categorized_blog.
 */
function _s_category_transient_flusher() {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient('_s_categories');
}

add_action('edit_category', '_s_category_transient_flusher');
add_action('save_post', '_s_category_transient_flusher');

if (!function_exists('_s_comment')) :

  /**
   * Template for comments and pingbacks.
   *
   * Used as a callback by wp_list_comments() for displaying the comments.
   *
   */
  function _s_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
      case 'pingback' :
      case 'trackback' :
        ?>
        <li class="post pingback">
          <p><?php _e('Pingback:', '_s'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', '_s'), ' '); ?></p>
          <?php
          break;
        default :
          ?>
        <li <?php comment_class('comment-list__comment'); ?> id="li-comment-<?php comment_ID(); ?>">
          <article id="comment-<?php comment_ID(); ?>" class="comment">

            <div class="comment__author vcard">
              <?php echo get_avatar($comment, 120); ?>
            </div><!-- .comment__author .vcard -->

            <div class="comment__body">
              <div class="comment__body__wrapper">
                <?php printf(__('%s', 'ambercouch'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?>
                <?php if ($comment->comment_approved == '0') : ?>
                  <em class="comment__mod"><?php _e('Your comment is awaiting moderation.', 'ambercouch'); ?></em>
                  <br />
                <?php endif; ?>

                <div class="comment__body__comment-meta">
                  <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><time datetime="<?php comment_time('c'); ?>">
                      <?php
                      /* translators: 1: date, 2: time */
                      printf(__('%1$s at %2$s', 'ambercouch'), get_comment_date(), get_comment_time());
                      ?>
                    </time></a>
                  <?php edit_comment_link(__('(Edit)', 'ambercouch'), ' ');
                  ?>
                </div><!-- .comment__body__comment-meta -->
                <?php comment_text(); ?>
              </div><!-- .comment__body__wrapper -->
            </div><!-- .comment__body -->

            <footer class="comment__reply">
              <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
            </footer><!-- .comment__reply -->
          </article><!-- #comment-## -->
          <?php
          break;
      endswitch;
    }

  endif; // ends check for _s_comment()

  if (!function_exists('_s_comment_form_args')) :

    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     */
    function _s_comment_form_args() {
      $fields = array(
          'author' =>
          '<div class="comment-form__author"><label for="author">' . __('Name', 'domainreference') . '</label> ' .
          ( $req ? '<span class="required">*</span>' : '' ) .
          '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
          '" size="30"' . $aria_req . ' /></div>',
          'email' =>
          '<div class="comment-form__email"><label for="email">' . __('Email', 'domainreference') . '</label> ' .
          ( $req ? '<span class="required">*</span>' : '' ) .
          '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
          '" size="30"' . $aria_req . ' /></div>',
          'url' =>
          '<div class="comment-form__url"><label for="url">' . __('Website', 'domainreference') . '</label>' .
          '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) .
          '" size="30" /></div>',
      );

      $comment_field = '<div class="comment-form__comment"><label for="comment">' . _x('Comment', 'noun') .
              '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
              '</textarea></div>';

      $comment_notes_before = '<p class="comment-form__notes">' .
              __('Your email address will not be published.') . ( $req ? $required_text : '' ) .
              '</p>';

      $comment_notes_after = '<p class="comment-form__allowed-tags">' .
              sprintf(
                      __('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s'), ' <code>' . allowed_tags() . '</code>'
              ) . '</p>';


      return array('fields' => $fields,
          'comment_field' => $comment_field,
          'comment_notes_before' => $comment_notes_before,
          'comment_notes_after' => $comment_notes_after);
    }

























  endif;