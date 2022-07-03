$(document).ready(function() {
    $(".form-change-answer").on('click', function(){
        var order = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/manager-change-answer',
            type:"POST",
            data:{
                order:order,
            },
            success:function(response){
                if(response == 0) {
                    $("#responded-false").show().delay(3000).fadeOut(700);
                } else if (response == 1) {
                    $("#responded-true").show().delay(3000).fadeOut(700);
                }
            }
        });
    });
});
