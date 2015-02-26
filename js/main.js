ACINUK = {
  common: {
    init: function () {

      var menu_offset = jQuery('body.admin-bar').length === 1 ? 32 : 0;
      jQuery('#product-list').sticky({topSpacing: menu_offset});

      console.log('common');
      //Get header vars
      var $win = jQuery(window),
              win_height = $win.height(),
              $header = jQuery('.header--master'),
              header_height = $header.height(),
              header_top = (win_height / 2.4) - (header_height / 2);

      //set header height
      jQuery('#masthead').height(win_height);
      $header.css('margin-top', header_top);

      //add vegas bg
      $(function () {
        $.vegas('slideshow', {
          delay: 6000,
          backgrounds: [
            {src: '/content/themes/ac-inuk/assets/images/vegas/myntapps-for-business.jpg', fade: 3000},
            {src: '/content/themes/ac-inuk/assets/images/vegas/myntapps-cardiff.jpg', fade: 3000},
            {src: '/content/themes/ac-inuk/assets/images/vegas/myntapps-apps.jpg', fade: 3000}
          ]
        })('overlay', {
          src: '/content/themes/ac-inuk/assets/images/vegas/overlays/13.png'
        });
      });

      //position header on resize
      jQuery(window).on('resize', function () {
        win_height = $win.height();
        header_height = $header.height();
        header_top = (win_height / 2) - (header_height / 2);
        //set header height
        jQuery('#masthead').height(win_height);
        $header.css('margin-top', header_top);
      });

      //responsive menus
      if (jQuery('#nav-main').data('responsive-clone')) {
        $clone_nav = jQuery('#nav-main').clone();
        jQuery('#nav-main').clone();
        $clone_nav.attr('id', 'nav-responsive');

        $clone_nav.prependTo('body');

        els = jQuery('#nav-responsive *').each(function () {
          if (jQuery(this).attr('id')) {
            id = jQuery(this).attr('id');
            jQuery(this).attr('id', id + '-clone');
          }
        });
        var $menu = jQuery('#nav-responsive .menu--site__container'),
                $menulink = jQuery('#site_menu_toggle-clone'),
                $container = jQuery('#nav-main'),
                container_height = $container.height();
      } else {
        var $menu = jQuery('.menu--products'),
                $container = jQuery('.menu-menu-products-container'),
                $menulink = $menu.prepend('<a id="site_menu_toggle" class="menu--responsive-toggle__toggle" href="#menu">Menu</a>');
      }

      jQuery('body').addClass('js');



      if ($container.css('position') == 'absolute') {
        jQuery('body').css('margin-top', container_height);
      }

      jQuery('#site_menu_toggle').click(function () {
        $container.toggleClass('active');
        jQuery('#site_menu_toggle').toggleClass('active');
        return false;
      });

      //empty p class to hide wp crazy editor markup
      jQuery('p').each(function (i) {
        if (jQuery(this).text() == '') {
          jQuery(this).addClass('is-empty');
        }
      });

      //section links

      jQuery('a[rel = section]').each(function (i, e) {
        var href = e.href,
                href_id = href.substr(href.lastIndexOf('/') + 1);
        console.log(href_id);
        if (href_id.indexOf('?') > -1) {
          var selector = href_id.replace('?', '').replace('=', '');
          var sectioned = jQuery('#' + selector).length === 1 ? true : false;
        } else {
          console.log(href_id);
        }



        console.log(sectioned === true ? 'a section' : 'no section');

        if (sectioned === true) {
          e.href = '#' + selector;

          $(e).smoothScroll({offset: 50, easing: 'swing'});
        }

      });
    }
  },
  page: {
    init: function () {
      console.log('all pages');
    }
  },
  post: {
    init: function () {
      console.log('all posts');
    }
  }
};
UTIL = {
  exec: function (template, handle) {
    var ns = ACINUK,
            handle = (handle === undefined) ? "init" : handle;

    if (template !== '' && ns[template] && typeof ns[template][handle] === 'function') {
      ns[template][handle]();
    }
  },
  init: function () {
    var body = document.body,
            template = body.getAttribute('data-post-type'),
            handle = body.getAttribute('data-post-slug');

    UTIL.exec('common');
    UTIL.exec(template);
    UTIL.exec(template, handle);
  }
};
jQuery(window).load(UTIL.init);





