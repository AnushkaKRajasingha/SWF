/**
 * Created by Anushka K R on 7/26/2017.
 */
(function($){
    $(document).ready(function(){
        $('form#scswebform').submit(function(){
            window.open($(this).data('newtaburl'));
        });
    });
})(jQuery)