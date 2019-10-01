$(document).ready(function() {
    $("#btn-post").click(function() {
        //       $(''<div> you successfully post a comment </div>").insertAfter( "#post_win" );
        $( "<div class = 'post' id = 'success'>You successfully post a comment :)</div>"
        ).insertBefore("#post_win");

        setTimeout(function() {
            $("#success").remove();
        }, 4000);
        console.log("remove");
    });
});


