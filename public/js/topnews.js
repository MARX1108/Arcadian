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

    $('.pic_story').hover(function() {
        // alert(this.id);
        // alert($(this).find('img').attr('src'));
        var link = $(this).find('img').attr('src');
        processImage(link);
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
            // alert(output.event);
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



// $("#delete").click(function(){
//     alert("test");
//     if(confirm("Are you sure you want to delete this?")){
//         // $("#delete").attr("href", "<?= BASE_URL ?>/detail/<?= $story->id ?>/delete");
//     }
//     else{
//         return false;
//     }
// });



function processImage(sourceImageUrl) {
    // **********************************************
    // *** Update or verify the following values. ***
    // **********************************************

    // let subscriptionKey = process.env['COMPUTER_VISION_SUBSCRIPTION_KEY'];
    // let endpoint = process.env['COMPUTER_VISION_ENDPOINT']
    var subscriptionKey = '467b3c735c0a4779a19575f9a70a1bb3';
    var endpoint = 'https://3744p5.cognitiveservices.azure.com/';
    // if (!subscriptionKey) { throw new Error('Set your environment variables for your subscription key and endpoint.'); }
    var uriBase = endpoint + "vision/v2.1/analyze";

    // Request parameters.
    var params = {
        "visualFeatures": "Categories,Description,Color",
        "details": "",
        "language": "en",
    };

    // Display the image.
    // var sourceImageUrl = "https://upload.wikimedia.org/wikipedia/commons/3/3c/Shaki_waterfall.jpg";
    // document.querySelector("#sourceImage").src = sourceImageUrl;

    // Make the REST API call.
    $.ajax({
        url: uriBase + "?" + $.param(params),

        // Request headers.
        beforeSend: function(xhrObj){
            xhrObj.setRequestHeader("Content-Type","application/json");
            xhrObj.setRequestHeader(
                "Ocp-Apim-Subscription-Key", subscriptionKey);
        },
        type: "POST",
        data: '{"url": ' + '"' + sourceImageUrl + '"}',
        success: function(data)
        {
            // alert("test");
            console.log(JSON.stringify(data, null, 2));
            // $("#responseTextArea").val(JSON.stringify(data, null, 2));
        },
        error: function (xhr, status, error) {
            alert("error"+xhr.responseText);
        }
    });


}