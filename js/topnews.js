$(document).ready(function() {
    $("#news > #topnews").css({
        "padding-top": $("#news >#signin").innerHeight() + "px",
        width:
            $(document).width() -
            ($("#news").css("padding-left") +
                $("#news").css("padding-right") +
                $("#news >#signin").outerWidth())
    });
$("#header > #search-bar > input").focus(function() {
        $("#primary-nav").hide();
        $("#header form > input").css({ "padding-top": 5+"%",
                                      "padding-left": 30+"%", "padding-right": 30+"%",  "padding-bottom": 5+"%" });
        $("#primary-nav").show();
 
});
    
});



    

                  
/*$("#header > #search-bar > input").focus(function() {
        $("#primary-nav").remove();
        $("#header form").css({
            "padding-top": 10%
        });
});*/