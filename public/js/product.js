$(function() {
    $('#property_1').change(function(){
        $('#propertyDetail_1').empty();
        $('#property_1 option').each(function(){
            if($(this).is(':selected')){
                var pro_id = $(this).data('detail');
                if($(this).val() == ''){
                    $('#propertyDetail_1').append('<option value="" disabled selected>Select Property first</option>');
                }
                $(pro_id).each(function(){
                    $('#propertyDetail_1').append($('<option>', {
                        value: this.id,
                        text: this.name
                    }));
                });
                console.log(pro_id);
            }
        });
    });

    $('#property_2').change(function(){
        $('#propertyDetail_2').empty();
        $('#property_2 option').each(function(){
            if($(this).is(':selected')){
                var pro_id = $(this).data('detail');
                if($(this).val() == ''){
                    $('#propertyDetail_2').append('<option value="" disabled selected>Select Property first</option>');
                }
                $(pro_id).each(function(){
                    $('#propertyDetail_2').append($('<option>', {
                        value: this.id,
                        text: this.name
                    }));
                });
                console.log(pro_id);
            }
        });
    });

    $('#property_3').change(function(){
        $('#propertyDetail_3').empty();
        $('#property_3 option').each(function(){
            if($(this).is(':selected')){
                var pro_id = $(this).data('detail');
                if($(this).val() == ''){
                    $('#propertyDetail_3').append('<option value="" disabled selected>Select Property first</option>');
                }
                $(pro_id).each(function(){
                    $('#propertyDetail_3').append($('<option>', {
                        value: this.id,
                        text: this.name
                    }));
                });
                console.log(pro_id);
            }
        });
    });

    $('#property_4').change(function(){
        $('#propertyDetail_4').empty();
        $('#property_4 option').each(function(){
            if($(this).is(':selected')){
                var pro_id = $(this).data('detail');
                if($(this).val() == ''){
                    $('#propertyDetail_4').append('<option value="" disabled selected>Select Property first</option>');
                }
                $(pro_id).each(function(){
                    $('#propertyDetail_4').append($('<option>', {
                        value: this.id,
                        text: this.name
                    }));
                });
                console.log(pro_id);
            }
        });
    });

    $('#property_5').change(function(){
        $('#propertyDetail_5').empty();
        $('#property_5 option').each(function(){
            if($(this).is(':selected')){
                var pro_id = $(this).data('detail');
                if($(this).val() == ''){
                    $('#propertyDetail_5').append('<option value="" disabled selected>Select Property first</option>');
                }
                $(pro_id).each(function(){
                    $('#propertyDetail_5').append($('<option>', {
                        value: this.id,
                        text: this.name
                    }));
                });
                console.log(pro_id);
            }
        });
    });
});