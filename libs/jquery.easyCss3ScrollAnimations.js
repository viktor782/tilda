(function($){
    
    var methods = {
        
        animaged : function(elems, settings){
            var scrollTop = $(window).scrollTop();

            elems.each(function(){
                var dataClasses = $(this).data('classes'),
                    offset = $(this).offset();

                if(dataClasses && scrollTop + settings.windowHeight - settings.startAnimation > offset.top ){
                    $(this).addClass(dataClasses).removeAttr('data-classes');
                    
                    if(settings.hideElements){
                        $(this).css({'visibility': 'visible'});
                    }
                }

            });
        }
        
    };
    
    
    $.fn.easyCss3ScrollAnimations = function(options) {
        var $elems = this;
    
        var settings = $.extend( {
            hideElements : false,
            startAnimation: 100,
            windowHeight: $(window).height()
            }, options);
                  
        if(settings.hideElements){
            $elems.css({'visibility': 'hidden'});
        }     
                          
        $(window).scroll(function(){
            methods.animaged($elems, settings);
        });   
        
        $( document ).ready( function(){
            methods.animaged($elems, settings);
        });
        
        
    };
})(jQuery);