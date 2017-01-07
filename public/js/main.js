/*
* @Author: lich.dv
* @Date:   2016-03-18 08:29:02
* @Last Modified by:   lich.dv
* @Last Modified time: 2016-04-21 09:13:34
*/
var _token = null;
$(document).ready(function() {
    $.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });
    $('.btn.select-file').click(function(){
        var target = $(this).attr('for');
        $('#'+target).click();
    });
    $('.close-alert').click(function(){
        $(this).parents('.alert').hide();
    });
    $('.fadeOut').delay(10000).fadeOut();
    $('[data-toggle="tooltip"]').tooltip();
});
function showModal(that, message){
    var modalId = $(that).attr('data-target');
    $('#'+modalId+' .modal-body').html(message);
    $('#'+modalId).modal();
    
    return false;
};
function showModalWithAjax(that){
    var modalId = 'common-modal';
    if(that.hasAttribute('data-target')) {
        modalId = $(that).attr('data-target');
    }
    if(that.hasAttribute('data-header')) {
        $('#'+modalId+' .modal-header .modal-title').html($(that).attr('data-header'));
    }
    if(that.hasAttribute('data-width')) {
        $('#'+modalId+' .modal-dialog').css('width', $(that).attr('data-width'));
    }
    $.ajax({
        url: $(that).attr('href'),
        beforeSend: function() {
            $('#'+modalId+' .modal-body').html('');
            $('.overlay').show();
        },
        success: function(data) {
            $('.overlay').hide();
            $('#'+modalId+' .modal-body').html(data);
            $('#'+modalId).modal();
        },
        error: function(x,x,z) {
            $('.overlay').hide();
            $('#'+modalId+' .modal-body').html(z);
            $('#'+modalId).modal();
        }
    });

    return false;
};

function executeDelete(url)
{
    if(_token == null) {
        $('#modal-confirm-loading').hide();
        $('#confirm-modal .modal-body').html('Csrf token is not set');
        $('#confirm-modal').modal();
        return;
    }
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
        data: {_token: _token},
        beforeSend: function() {
            $('.overlay').show();
        },
        success: function(data) {
            if(data.res == 1) {
                window.location.href = data.url;
                location.reload();
                $('.overlay').hide();
                $('#close-confirm').click();
            } else {
                $('.overlay').hide();
                $('#confirm-modal .modal-body').html(data.error);
                $('#confirm-modal').modal();
            }
        },
        error: function(x,y,z) {
            console.log(x.responseText);
            $('.overlay').hide();
            $('#confirm-modal .modal-body').html(z);
            $('#confirm-modal').modal();
        }
    });
}

function confirmDelete(that)
{
    var url = $(that).attr('href');
    var message = 'Are you sure to delete it ?';
    if(that.hasAttribute('data-confirm')) {
        message = $(that).attr('data-confirm');
    }
    $('#yes-button').attr('onclick', 'executeDelete("'+url+'")');
    $('#confirm-modal .modal-body').html(message);
    $('#confirm-modal').modal();

    return false;
}