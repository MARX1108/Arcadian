$(document).ready(function() {
    $("#btn-signin").click(function() {
        //       $(''<div> you successfully post a comment </div>").insertAfter( "#post_win" );
        var height = $("#topnews").innerHeight();
        var weight = 0.90;
        $("#signin").remove();
        $("#news > #topnews").css({
            "padding-top":  height + "px",
            width:
                $(document).width()* weight,
            "float":"none"
                });

        $( "<p id = 'signin_prompt'>You successfully signed in! )</p>"
                ).insertBefore("#topnews");

        $("#signin_prompt").css({
                    width:
                        $(document).width()*0.8,
                        });

    });
    checkSize();



//
//
//$("#header > #search-bar > input").focus(function() {
//        $("#primary-nav").hide();
//        $("#header form > input").css({ "padding-top": 5+"%",
//                                      "padding-left": 30+"%", "padding-right": 30+"%",  "padding-bottom": 5+"%" });
//        $("#primary-nav").show();
//
//});
//
});


$(window).resize(function() {
      checkSize();
});

function checkSize(){
    console.log($(document).width());
    if ($(document).width() <= 800){
		$("#header > #search-bar").hide();
    }

    if ($(document).width() <= 800){
        console.log(($(document).width()));
		$("#content-right").hide();
    }


    if ($(document).width() >= 500 && $("#signin").length){
        $("#news > #topnews").css({
        "padding-top": $("#news >#signin").innerHeight() + "px",
        width:
            $(document).width() -
            ($("#news").css("padding-left") +
                $("#news").css("padding-right") +
                $("#news >#signin").outerWidth())

    });
    }



}


    

                  
/*$("#header > #search-bar > input").focus(function() {
        $("#primary-nav").remove();
        $("#header form").css({
            "padding-top": 10%
        });
});*/
