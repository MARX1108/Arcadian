$(document).ready(function() {

    checkSize();

    
    $('#order_check').change(function() {
        if(this.checked) {
            confirm("Ordered by Event?");
            reorder("event");
            // alert(base_url);
            // $(this).prop("checked", returnVal);
        }
        else
        {
            confirm("Ordered by Time?");
            reorder("");
        }
        // $('#textbox1').val(this.checked);        
    });
});

function reorder(order)
{
    $.ajax({
        url: base_url+'/app/controller/ContentController.php?route=event_order',
        data: {
            order: order
        },
        method: 'get',
        dataType: 'json',
        success: function(output){
            $("#event_home").replaceWith(output.event);
            // console.log(id);
            // $( "#"+id ).remove();
            // alert(output.message);
            alert(output.event);
        },
        error: function (xhr, status, error) {
            alert("error"+xhr.responseText);
        }
    });
}
function delete_(id, BASE_URL, userid){
    // alert("test");

    if(confirm("Are you sure you want to delete this?"))
    {
        url = BASE_URL+"/detail/"+id+"/edit";
        // alert(url);
        $.ajax({
            url: BASE_URL+'/app/controller/ContentController.php',
            data: {
                route: 'detail',
                delete_request: 'true',
                storyID: id,
                userid: userid
            },
            method: 'post',
            dataType: 'json',
            success: function(output){
                // console.log(id);
                $( "#"+id ).remove();
                // alert(output.message);
            },
            error: function (xhr, status, error) {
                alert("error"+xhr.responseText);
            }
        });

        // window.location.replace(BASE_URL+"/profile/timeline");
    }
    else{
        return false;
    }
}

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


$("#delete").click(function(){
    alert("test");
    if(confirm("Are you sure you want to delete this?")){
        // $("#delete").attr("href", "<?= BASE_URL ?>/detail/<?= $story->id ?>/delete");
    }
    else{
        return false;
    }
});
