jQuery(document).ready(function($){
    if (typeof $.cookie('token') === 'undefined'){
        // show div 
        $("#cookiebar").css("display", "block");
        // Set Cookie
        $.cookie('token', 'yes', { expires: 100000 });        
    } else {
        console.log('Token = ' + $.cookie('token'));
    }

    $("#hidebar").click(function () {
        $("#cookiebar").css("display", "none");
    });
});