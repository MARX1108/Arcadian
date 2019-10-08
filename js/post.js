$(document).ready(function() {
    $("#btn-post").click(function() {
        //       $(''<div> you successfully post a comment </div>").insertAfter( "#post_win" );


        var post = $('#post_box').val();

        $( "<div class = 'post' id = ''> <p><a href='#'>Me</a></p><p>" + post + " </p><p id='time_stamp'>Just now</p></div>"
        ).insertBefore("#post_win");

            $( "<div class = 'post' id = 'success'>You successfully post a comment :)</div>"
    ).insertBefore("#post_win");
        setTimeout(function() {
            $("#success").remove();
        }, 4000);

        $("#post_win > textarea").css(
            {
                "background":"#e7e8e8"
            }
        );

        // console.log("remove");
    });
});


