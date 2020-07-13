import $ from 'cash-dom';
import ClipboardJS from 'clipboard';

$(function($){


    /* Copy */

    var clipboard = new ClipboardJS('button.copy');

    /* Menu */
    function getChars(text, length){
        var result = '';
        do{
            result += text;
        }while(result.length < length);
        return result.substr(0, length);
    }
    function getWords(text, length){
        var result = '';
        do{
            result += text;
        }while(result.split(' ').length < length);
        return result.split(' ').slice(0, length).join(' ');
    }

    var $items = $('.menu li');

    $(document.body).on('galipsum.fill', function(){

        var length = $('input[name=length]').val();
        var origin = $('input[name=origin]:checked').val();
        var measure = $('input[name=measure]:checked').val();
        if(typeof galipsum.texts[origin] === 'undefined') return;

        var content = galipsum.texts[origin].content;
        var result = measure === 'words'
            ? getWords(content, length)
            : getChars(content, length);

        $('#text').val(result);

    });

    $items.find('input').on('change', function(){
        $(this).closest('li').addClass('active')
            .siblings().removeClass('active');
        $(document.body).trigger('galipsum.fill');
    });

    $('input[name=length]').on('change', function(){
        $(document.body).trigger('galipsum.fill');
    });
    $('input[name=measure]').on('change', function(){
        $(document.body).trigger('galipsum.fill');
    });

    $items.eq(2).find('input').trigger('click');

});
