"use strict";
(function($) {
var BDS = {
    common: {
        init: function () {

            console.log('common js ');
            $("#masthead").sticky({topSpacing:0});
            $('#main-navigation').sticky({topSpacing:0});

        }
    },
    page: {
        init: function () {

            console.log('page js')
        }
    },
    post: {
        init: function () {
            console.log('all posts');
        }
    },
    gaq :{
        video : function(){



        },//gaq.video
        tel : function(){



        },//gaq.tel
        contact : function(){


        }//gaq.tel
    }
};
var UTIL = {
    exec: function (template, handle) {
        var ns = BDS,
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

    //load scripts
    $(window).load(UTIL.init);

})( jQuery );




