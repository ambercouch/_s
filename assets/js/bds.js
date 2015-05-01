//"use strict";

(function ($) {
    var BDS = {
        common: {
            init: function () {
                console.log('common ');
                // media query event handler
                if (matchMedia) {
                    var mq = window.matchMedia("(min-width: 500px)");
                    mq.addListener(WidthChange);
                    WidthChange(mq);
                }

                function WidthChange(mq) {

                    if (mq.matches) {
                        $("#masthead").sticky({topSpacing: 0});
                        $('#main-navigation').sticky({topSpacing: 0});
                    }
                    else {
                        $("#masthead").unstick();
                        $('#main-navigation').unstick();
                    }
                }

            }

        },
        page: {
            init: function () {

                console.log('page js')
            },
            home: function () {

                console.log('page home js ');
                console.log('tp caption test');

                $('#masthead').on('sticky-start' , function(){

                    $('.pushy__btn').addClass('stick');
                });
                $('#masthead').on('sticky-end' , function(){

                    $('.pushy__btn').removeClass('stick');
                });

                //// media query event handler
                //if (matchMedia) {
                //    var mq = window.matchMedia("(max-width: 694px)");
                //    mq.addListener(WidthChange);
                //    WidthChange(mq);
                //}
                //
                //function WidthChange(mq) {
                //
                //    if (mq.matches) {
                //        $(".tp-caption").css('left', '300px');
                //
                //        $('.tp-caption h2').css('font-size', '30px');
                //        console.log('tp caption');
                //    }
                //    else {
                //
                //    }
                //}



            }
        },
        post: {
            init: function () {
                console.log('all posts');
            }
        },
        archive: {
            testimonial: function () {
                console.log('testimonial');
                console.log('rand');
                console.log(Math.floor(Math.random() * ((-10-10)+1) + 10));
                $(".testimonial__wrapper").each(function(i){
                    var rand = Math.floor(Math.random() * ((-10-10)+1) + 10);
                    $(this).addClass('tester');
                    $(this).css('transform', 'rotateZ('+rand+'deg)');
                });
                //var currentTallest = 0,
                //    currentRowStart = 0,
                //    rowDivs = [],
                //    $el,
                //    topPosition = 0,
                //    count = $('.testimonial__wrapper').length;
                //
                //
                //$('.testimonial__wrapper').each(function(index, el) {
                //    //console.log(i);
                //    //console.log(count);
                //    $el = $(this);
                //    if ($el.offset().top > topPosition || index == count - 1 ){
                //        if(rowDivs.length > 0){
                //
                //            console.log(currentTallest);
                //            for (var i = 0; i < rowDivs.length; ++i) {
                //                console.log();
                //            }
                //            //$.each(rowDivs , function(i,el){
                //            //    console.log('ech div');
                //            //    console.log(i);
                //            //    $(el).outerHeight(currentTallest);
                //            //})
                //        }
                //        rowDivs = [];
                //        console.log('reset');
                //        console.log(rowDivs.length);
                //        topPosition = $el.offset().top;
                //        currentTallest = 0;
                //    }
                //    if( $el.outerHeight() > currentTallest){
                //        currentTallest = $el.outerHeight();
                //        rowDivs.push($el);
                //    }
                //        console.log(rowDivs.length);
                //
                //
                //
                //});​
            }
        },
        gaq: {
            video: function () {


            },//gaq.video
            tel: function () {


            },//gaq.tel
            contact: function () {


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

})(jQuery);




