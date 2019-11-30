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


    
function processImage() {
    // **********************************************
    // *** Update or verify the following values. ***
    // **********************************************

    // let subscriptionKey = process.env['467b3c735c0a4779a19575f9a70a1bb3'];
    // let endpoint = process.env['https://3744p5.cognitiveservices.azure.com/'];
    // if (!subscriptionKey) { throw new Error('Set your environment variables for your subscription key and endpoint.'); }
    
    // let subscriptionKey = process.env['COMPUTER_VISION_SUBSCRIPTION_KEY'];
    // let endpoint = process.env['COMPUTER_VISION_ENDPOINT'];

    let subscriptionKey = '467b3c735c0a4779a19575f9a70a1bb3';
    let endpoint = 'https://3744p5.cognitiveservices.azure.com/';
    var uriBase = endpoint + "vision/v2.1/analyze";

    // Request parameters.
    var params = {
        "visualFeatures": "Categories,Description,Color",
        "details": "",
        "language": "en",
    };

    // Display the image.
    var sourceImageUrl = document.getElementById("inputImage").value;
    document.querySelector("#sourceImage").src = sourceImageUrl;

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

        // Request body.
        data: '{"url": ' + '"' + sourceImageUrl + '"}',
    })

    .done(function(data) {
        // Show formatted JSON on webpage.
        alert(JSON.stringify(data, null, 2));
        // $("#responseTextArea").val(JSON.stringify(data, null, 2));
    })

    .fail(function(jqXHR, textStatus, errorThrown) {
        // Display error message.
        var errorString = (errorThrown === "") ? "Error. " :
            errorThrown + " (" + jqXHR.status + "): ";
        errorString += (jqXHR.responseText === "") ? "" :
            jQuery.parseJSON(jqXHR.responseText).message;
        alert(errorString);
    });
};

                  
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
