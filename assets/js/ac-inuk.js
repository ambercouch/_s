ACINUK = {
  common: {
    init: function () {

      //uncomment to debug
      //console.log('common');

      //add js class
      jQuery('body').addClass('js');

    }
  },
  page: {
    init: function () {
        //uncomment to debug
        //console.log('pages');
    }
  },
  post: {
    init: function () {
        //uncomment to debug
        //console.log('posts');
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





