
$(function($){


    /* Copy */

    var clipboard = new ClipboardJS('button.copy');

    /* Menu */

    var $items = $('.menu li');

    $items.find('input').on('change', function(){
        $(this).closest('li').addClass('active')
            .siblings().removeClass('active');
        $('#text').val(galipsum.texts[this.value].content);
    });

    $items.eq(2).find('input').trigger('click');

});
