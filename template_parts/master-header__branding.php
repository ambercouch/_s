<div class="master-header__branding">
    <div class="branding">
        <?php //var_dump(get_field('global_hide_blog_title', 'options')); ?>
        <?php if (!get_field('global_company_logo', 'options')) : //no logo ?>
            <h1 class="branding__title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
            </h1>
            <?php if (! get_field('global_hide_blog_description', 'options')): // no logo or description ?>
              <h2 class="branding__description"><?php bloginfo('description'); ?></h2>
            <?php endif; ?>

        <?php elseif (get_field('global_hide_blog_title', 'options') )  : //logo, no title ?>
            <h1 class="branding__logo is-title">
                <?php $logo = get_field('global_company_logo', 'options'); ?>
                <img src="<?php echo $logo['url']; ?>" alt=""/>
            </h1>
            <?php if (! get_field('global_hide_blog_description', 'options')) : //logo, no title, description?>
              <h2 class="branding__description"><?php bloginfo('description'); ?></h2>
            <?php endif; ?>
        <?php else : //logo, title ?>
            <div class="branding__logo has-title">
                <?php $logo = get_field('global_company_logo', 'options'); ?>
                <img src="<?php echo $logo['url']; ?>" alt=""/>
            </div>
            <?php if (get_field('global_hide_blog_description', 'options')): //logo, title, no description ?>
                <h1 class="branding__title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : //logo, title, description ?>
                <div class="branding__title-wrapper">
                    <h1 class="branding__title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <h2 class="branding__description"><?php bloginfo('description'); ?></h2>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
    <!-- .branding -->
</div><!-- .master-header__branding -->