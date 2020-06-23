/* global $, alert , console */

$(function () {

    'use strict';

    var userError   = true,

        emailError  = true,

        msgError    = true;


    $('.username').blur(function () {


        //shortcut 
        if ($(this).val().length < 4) {  // Show Error
            $(this).css("border", "1px solid #F00").parent().find(".custom-alert").fadeIn(200)
            .end().find(".asterisx").fadeIn(100);
            
            userError = true;

        } else { // No Errors
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
            .end().find(".asterisx").fadeOut(100);

            userError = false;

        }

    });

    $('.email').blur(function () {


        /* the selector not wrorking in all field unless i write calss username for div */
        if ($(this).val() === '' ) {
            $(this).css("border", "1px solid #F00");
            $(this).parent().find(".custom-alert").fadeIn(200);
            $(this).parent().find(".asterisx").fadeIn(100);

            emailError = true;

        } else {
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find(".asterisx").fadeOut(100);

            emailError = false;
        }



    });


    $('.message').blur(function () {


        /* the selector not wrorking in all field unless i write calss username for div */
        if ($(this).val().length < 11 ) {
            $(this).css("border", "1px solid #F00");
            $(this).parent().find(".custom-alert").fadeIn(200);
            $(this).parent().find(".asterisx").fadeIn(100);
            
            msgError = true;

        } else {
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find(".asterisx").fadeOut(100);

            msgError = false;
        }

       

    });

    // Submit form validation 

    $('.contact-form').submit(function (e) {

        if( userError === true || emailError === true || msgError === true ) {

            e.preventDefault();

            $( '.username, .email , .message').blur();
        }

    });

});