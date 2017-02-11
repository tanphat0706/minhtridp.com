/**
 * Created by letan on 02/11/2017.
 */
$(document).ready(function() {
    var notNull = 'Không được để trống thông tin này';
    var err_name = 'Vui lòng nhập Họ & Tên ít nhất 4 ký tự';
    var err_email = 'Email không đúng định dạng';
    var err_phone1 = 'Điện thoại không đúng định dạng';
    var err_phone2 = 'Vui lòng nhập số điện thoại từ 8 đến 11 ký tự';
    var err_content = 'Vui lòng nhập nội dung từ 10 đến 500 ký tự';
    $('#hotro').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            ht_name: {
                validators: {
                    stringLength: {
                        min: 4,
                        message: err_name
                    },
                    notEmpty: {
                        message: notNull
                    },
                }
            },
            ht_email: {
                validators: {
                    notEmpty: {
                        message: notNull
                    },
                    emailAddress: {
                        message: err_email
                    }
                }
            },
            ht_phone: {
                validators: {
                    notEmpty: {
                        message: notNull
                    },
                    digits: {
                        message: err_phone1
                    },
                    stringLength: {
                        min: 8,
                        max: 11,
                        message: err_phone2
                    },
                }
            },
            ht_content: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 500,
                        message: err_content
                    },
                    notEmpty: {
                        message: notNull
                    },
                }
            }
        }
    })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
            $('#contact_form').data('bootstrapValidator').resetForm();
            // Prevent form submission
            e.preventDefault();
            // Get the form instance
            var $form = $(e.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});

$(document).ready(function(){
    //tooltip
    $('[data-toggle="tooltip"]').tooltip();
    //get and change data in product summary
    var i;
    for (i = 1; i < 5; ++i) {
        $('#option_'+i).text($('#option'+i).val());
    }
    $("#quantity").text($("input[name='qty']").val()+' cái');
    $("#option1").change(function(){
        $('#option1 option').each(function() {
            if ($(this).is(':selected')){
                $('#option_1').text($('#option1').val());
            }
        });
    });
    $("#option2").change(function(){
        $('#option2 option').each(function() {
            if ($(this).is(':selected')){
                $('#option_2').text($('#option2').val());
            }
        });
    });
    $("#option3").change(function(){
        $('#option3 option').each(function() {
            if ($(this).is(':selected')){
                $('#option_3').text($('#option3').val());
            }
        });
    });
    $("#option4").change(function(){
        $('#option4 option').each(function() {
            if ($(this).is(':selected')){
                $('#option_4').text($('#option4').val());
            }
        });
    });
    $("input[name='qty']").click(function() {
        if($("input[name='qty']").is(':checked')) {
            $("input[name='qty']").parent().removeClass('active');
            $(this).parent().addClass('active');
            var qty = $(this).val();
            $('#quantity_hidden').text(qty);
            $('#quantity_hidden').number( true, 0);
            var qty_2 = $('#quantity_hidden').text();
            $('#quantity').text(qty_2+' cái');
        }
    });
    $('#yc-bao-gia').click(function(){
        $('#bao-gia').submit()
    });
});
//tab content
document.getElementById("defaultOpen").click();
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}