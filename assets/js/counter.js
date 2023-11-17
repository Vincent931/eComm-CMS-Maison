
! function($) {
    "use strict";

    var Landik = function() {}; 

    Landik.prototype.initFunFacts = function() {
        var a = 0;
        $(window).on('scroll', function() {
            var oTop = $('#counter').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.count').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                        countNum: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }

                    });
                });
                a = 1;
            }
        });
    },

    Landik.prototype.init = function() {
        this.initFunFacts();
    },
    //init
    $.Landik = new Landik, $.Landik.Constructor = Landik
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Landik.init();
}(window.jQuery);