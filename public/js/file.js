/*
* @Author: lich.dv
* @Date:   2016-03-25 08:12:47
* @Last Modified by:   lich.dv
* @Last Modified time: 2016-03-25 10:55:10
*/

$(function(){
    if($('.file-group .file-input-group').length <= 0 ){
        $('.file-group').append('<div class="file-input-group"><span class="select-file-btn">Browser</span><span class="file-form-control">No file chosen</span></div>');
    }
    $('.select-file-btn').click(function(){
        $(this).parents('.file-group').children('input[type="file"]').click();
    });
    $('.file-form-control').click(function(){
        $(this).parents('.file-group').children('input[type="file"]').click();
    });
    $('input[type="file"]').change(function(){
        showSelectFile(this);
    });
    function showSelectFile(input) {
        if (input.files && input.files.length > 0) {
            var files = input.files;
            showName(input);
            var filesArr = Array.prototype.slice.call(files);
            addShowArea(input);
            var item_width = getItemWidth(input);
            filesArr.forEach(function(f) {
                if(!f.type.match("image.*")) {
                    return;
                }

                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).parents('.file-group').children('.show-file').append('<span class="item" style="width: '+item_width+'px"><img src="'+e.target.result+'"><div class="caption"><h6 title="'+input.files[0].name+'">'+input.files[0].name+'</h6></div></span>');
                }
                reader.readAsDataURL(f);
            });
        } else {
            $(input).parents('.file-group').children('.show-file').remove();
            $(input).parents('.file-group').children('.file-input-group').children('.file-form-control').html('No file chosen');
        }
    }
    function getItemWidth(input) {
        var data_item = $(input).attr('data-item');
        var item = 2;
        if($.isNumeric(data_item)) {
            item = data_item;
        }
        var item_width = ($(input).parents('.file-group').children('.show-file').width() - 9)/item;
        return item_width - 10;
    }
    function addShowArea(input)
    {
        $(input).parents('.file-group').children('.show-file').remove();
        $(input).parents('.file-group').append('<div class="show-file" style="display: none"></div>');
        $(input).parents('.file-group').children('.show-file').slideDown();
    }
    function showName(input){
        var files = input.files;
        if(files.length == 1) {
            $(input).parents('.file-group').children('.file-input-group').children('.file-form-control').html(files[0].name);
        } else {
            $(input).parents('.file-group').children('.file-input-group').children('.file-form-control').html(files.length + ' item');
        }
    }
});