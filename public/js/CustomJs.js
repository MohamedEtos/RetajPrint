$(document).ready(function () {
    $('#smoth').delay(5000).slideUp(800);
    $('[placeholder]').focus(function () {

        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '')

    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-text'))
    })
    // end for hide placeholder if foucs





    //show and hide divs with font awosme

    $(".toggle").click(function () {
        $(this).toggleClass("selected").parent().next(".panel-b").toggle('fast');
        if ($(this).hasClass("selected")) {
            $(this).html('<i class="fa fa-plus" ></i>');
        } else {
            $(this).html('<i class="fa fa-minus" ></i>')
        }
    })

    ///////////HOME PAGE EDIT AJAX////////////
    // $(".edit").click(function(e){
    //     e.preventDefault();

    //     $(".hide").slideUp(300,function(){
    //         $(".edit_fild").slideDown(300)
    //     });
    // })

    // $(".timess").click(function(){
    //     $(".edit_fild").slideUp(300,function(){
    //         $(".hide").slideDown(300)
    //     });
    // })

});


