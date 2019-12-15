//global variables
var w = window.innerWidth * 0.68 * 0.95;
var h = Math.ceil(w * 0.7);
var oR = 0;
var nTop = 0;
var svgContainer;
var svg;
var mainNote;
var bubbleObj;
var colVals;
$(document).ready(function() {

    checkSize();

    
    $('#order_check').change(function() {
        if(this.checked) {
            confirm("Ordered by Event?");
            reorder("event");
        }
        else
        {
            confirm("Ordered by Time?");
            reorder("");
        }
    });

    var timer;
    $(".pic_story").mouseenter(function() {
        var link = $(this).find('img').attr('src');
        timer = setTimeout(function(){
            
            processImage(link);
        }, 500);
    }).mouseleave(function() {
        clearTimeout(timer);
    });




    // data visualization
    // define svg
    // source http://sunsp.net/demo/BubbleMenu/
    svgContainer = d3.select("#mainBubble")
    .style("height", h + "px");

    svg = d3.select("#mainBubble").append("svg")
    .attr("class", "mainBubbleSVG")
    .attr("width", w)
    .attr("height", h)
    .on("mouseleave", function () {
        return resetBubbles();
    });

    mainNote = svg.append("text")
    .attr("id", "bubbleItemNote")
    .attr("x", 10)
    .attr("y", w / 2 - 15)
    .attr("font-size", 12)
    .attr("dominant-baseline", "middle")
    .attr("alignment-baseline", "middle")
    .style("fill", "#888888")
    .text(function (d) {
        return "Hovering on bubbles to view/edit/delete users";
    });
    fetch_bubble();
    //create bubbles
    // bubble();
    // reset bubbles to initial state
    resetBubbles = function () {
        w = window.innerWidth * 0.68 * 0.95;
        oR = w / (1 + 3 * nTop);

        h = Math.ceil(w / nTop * 2);
        svgContainer.style("height", h + "px");

        mainNote.attr("y", h - 15);

        svg.attr("width", w);
        svg.attr("height", h);

        d3.select("#bubbleItemNote").text(
            "Hovering on bubbles to view/edit/delete users"
        );

        var t = svg.transition()
            .duration(650);

        t.selectAll(".topBubble")
            .attr("r", function (d) {
                return oR;
            })
            .attr("cx", function (d, i) {
                return oR * (3 * (1 + i) - 1);
            })
            .attr("cy", (h + oR) / 3);

        t.selectAll(".topBubbleText")
            .attr("font-size", 10)
            .attr("x", function (d, i) {
                return oR * (3 * (1 + i) - 1);
            })
            .attr("y", (h + oR) / 3);

        for (var k = 0; k < nTop; k++) {
            t.selectAll(".childBubbleText" + k)
                .attr("x", function (d, i) {
                    return (oR * (3 * (k + 1) - 1) + oR * 1.5 * Math.cos((i - 1) * 45 / 180 * 3.1415926));
                })
                .attr("y", function (d, i) {
                    return ((h + oR) / 3 + oR * 1.5 * Math.sin((i - 1) * 45 / 180 * 3.1415926));
                })
                .attr("font-size", 6)
                .style("opacity", 0.5);

            t.selectAll(".childBubble" + k)
                .attr("r", function (d) {
                    return oR / 3.0;
                })
                .style("opacity", 0.5)
                .attr("cx", function (d, i) {
                    return (oR * (3 * (k + 1) - 1) + oR * 1.5 * Math.cos((i - 1) * 45 / 180 * 3.1415926));
                })
                .attr("cy", function (d, i) {
                    return ((h + oR) / 3 + oR * 1.5 * Math.sin((i - 1) * 45 / 180 * 3.1415926));
                });

        }
    }
    window.onresize = resetBubbles;
// end of data visualization
    save_bubble();
    create_bubble();
    delete_bubble();


});


//check if any of the input field is empty
function check_empty_field()
{

        if( !$("#username").val() ) {
            $("#username").parent('div').addClass('alert-danger');
            return false;
        }

        if( !$("#firstname").val() ) {
            $("#firstname").parent('div').addClass('alert-danger');
            return false;
        }

        if( !$("#lastname").val() ) {
            $("#lastname").parent('div').addClass('alert-danger');
            return false;
        }

    return true;
}

//edit and save users to database using bubble
function save_bubble()
{
    $("#save").on("click", function(){

        if(check_empty_field())
        {
            // alert($("#role_select").val());
            $.ajax({
                url: base_url+'/app/controller/ContentController.php?route=change_bubble',
                data: {
                    mode: 'save',
                    user_ID: $("#id").val(),
                    username: $("#username").val(),
                    firstname: $("#firstname").val(),
                    lastname: $("#lastname").val(),
                    role: $("#role_select").val()
                },
                method: 'post',
                dataType: 'json',
                success: function(output){
                    // alert(output.id);
                    $('div').removeClass('alert-danger');
                    $(".mainBubbleSVG g").remove();
                    fetch_bubble();
                    alert("Your changes are saved successfully !")
                    // alert(output.children[0].children.name);
                    // $("#event_home").replaceWith(output.event);
                },
                error: function (xhr, status, error) {
                    alert("error: "+xhr.responseText);
                }
            });

            
            // alert("ready to save");
        }
        
        
    });
}

//create new users using bubble
function create_bubble()
{
    $("#create").on("click", function(){
        if($("#id").val())
        {
            alert("user already exists !");
        }
        else if(check_empty_field())
        {
            $.ajax({
                url: base_url+'/app/controller/ContentController.php?route=change_bubble',
                data: {
                    mode: 'create',
                    username: $("#username").val(),
                    password: $("#username").val(),
                    firstname: $("#firstname").val(),
                    lastname: $("#lastname").val(),
                    role: $("#role_select").val()
                },
                method: 'post',
                dataType: 'json',
                success: function(output){
                    // alert(output.id);
                    $('div').removeClass('alert-danger');
                    $(".mainBubbleSVG g").remove();
                    fetch_bubble();
                    alert("New user created ! Default password is the same as username")
                },
                error: function (xhr, status, error) {
                    alert("error: "+xhr.responseText);
                }
            });
        }
    });
}


//delete users using bubble
function delete_bubble()
{
    $("#delete").on("click", function(){
        if (confirm('Are you sure you want to delete this user ?')) {
            $.ajax({
                url: base_url+'/app/controller/ContentController.php?route=change_bubble',
                data: {
                    mode: 'delete',
                    user_ID: $("#id").val(),
                    username: $("#username").val(),
                    firstname: $("#firstname").val(),
                    lastname: $("#lastname").val(),
                    role: $("#role_select").val()
                },
                method: 'post',
                dataType: 'json',
                success: function(output){
                    // alert(output.id);
                    $(".mainBubbleSVG g").remove();
                    fetch_bubble();
                    alert("Deleted successfully !")
                   
                },
                error: function (xhr, status, error) {
                    alert("error: "+xhr.responseText);
                }
            });
        } else {
            alert('Why did you press cancel? You should have confirmed');
        }
    });
}

// fetch data from the database and populate the bubble
function fetch_bubble()
{
    $.ajax({
        url: base_url+'/app/controller/ContentController.php?route=user_bubble',
        data: {
        },
        method: 'get',
        dataType: 'json',
        success: function(output){
            // alert(output.name);
            // alert(output.children[0].children.name);
            bubble(output);
            // $("#event_home").replaceWith(output.event);
        },
        error: function (xhr, status, error) {
            alert("error: "+xhr.responseText);
        }
    });
}

//source http://sunsp.net/demo/BubbleMenu/
// d3.js library
function bubble(root)
{
    bubbleObj = svg.selectAll(".topBubble")
        .data(root.children)
        .enter().append("g")
        .attr("id", function (d, i) {
            return "topBubbleAndText_" + i
        });

    console.log(root);
    nTop = root.children.length;
    oR = w / (1 + 3 * nTop);

    h = Math.ceil(w / nTop * 2);
    svgContainer.style("height", h + "px");

    colVals = d3.scale.category10();

    bubbleObj.append("circle")
        .attr("class", "topBubble")
        .attr("id", function (d, i) {
            return "topBubble" + i;
        })
        .attr("r", function (d) {
            return oR;
        })
        .attr("cx", function (d, i) {
            return oR * (3 * (1 + i) - 1);
        })
        .attr("cy", (h + oR) / 3)
        .style("fill", function (d, i) {
            return colVals(i);
        }) // #1f77b4
        .style("opacity", 0.3)
        .on("mouseover", function (d, i) {
            // var noteText = "";
            // if (d.info == null || d.info == "") {
            //     noteText = "d.address";
            // } else {
            //     noteText = d.info;
            // }
            // d3.select("#bubbleItemNote").text(noteText);

            $('#id').val(d.info.ID);
            $('#username').val( d.info.Username);
            $('#firstname').val(d.info.Firstname);
            
            if(d.info.Role === '1')
            {

                $('#site_user').prop('selected', 'selected').change();
                $('#regular_user').removeAttr("selected");      

            }
            else
            {
                $('#regular_user').prop('selected', 'selected').change();
                $('#site_user').removeAttr("selected");      
                // alert(d.info.Role);
            }

            $('#lastname').val(d.info.LastName);
            $('#date').attr("placeholder", d.info.Date);


            return activateBubble(d, i);
        })
        ;


    bubbleObj.append("text")
        .attr("class", "topBubbleText")
        .attr("x", function (d, i) {
            return oR * (3 * (1 + i) - 1);
        })
        .attr("y", (h + oR) / 3)
        .style("fill", function (d, i) {
            return colVals(i);
        }) // #1f77b4
        .attr("font-size", 10)
        .attr("text-anchor", "middle")
        .attr("dominant-baseline", "middle")
        .attr("alignment-baseline", "middle")
        .text(function (d) {
            return d.name
        })
        .on("mouseover", function (d, i) {
            return activateBubble(d, i);
        });
}

//source http://sunsp.net/demo/BubbleMenu/
// from d3.js library
function activateBubble(d, i) {
    // increase this bubble and decrease others
    var t = svg.transition()
        .duration(d3.event.altKey ? 7500 : 350);

    t.selectAll(".topBubble")
        .attr("cx", function (d, ii) {
            if (i == ii) {
                // Nothing to change
                return oR * (3 * (1 + ii) - 1) - 0.6 * oR * (ii - 1);
            } else {
                // Push away a little bit
                if (ii < i) {
                    // left side
                    return oR * 0.6 * (3 * (1 + ii) - 1);
                } else {
                    // right side
                    return oR * (nTop * 3 + 1) - oR * 0.6 * (3 * (nTop - ii) - 1);
                }
            }
        })
        .attr("r", function (d, ii) {
            if (i == ii)
                return oR * 1.8;
            else
                return oR * 0.8;
        });

    t.selectAll(".topBubbleText")
        .attr("x", function (d, ii) {
            if (i == ii) {
                // Nothing to change
                return oR * (3 * (1 + ii) - 1) - 0.6 * oR * (ii - 1);
            } else {
                // Push away a little bit
                if (ii < i) {
                    // left side
                    return oR * 0.6 * (3 * (1 + ii) - 1);
                } else {
                    // right side
                    return oR * (nTop * 3 + 1) - oR * 0.6 * (3 * (nTop - ii) - 1);
                }
            }
        })
        .attr("font-size", function (d, ii) {
            if (i == ii)
                return 10 * 1.5;
            else
                return 10 * 0.6;
        });

    var signSide = -1;
    for (var k = 0; k < nTop; k++) {
        signSide = 1;
        if (k < nTop / 2) signSide = 1;
        t.selectAll(".childBubbleText" + k)
            .attr("x", function (d, i) {
                return (oR * (3 * (k + 1) - 1) - 0.6 * oR * (k - 1) + signSide * oR * 2.5 * Math.cos((i - 1) *
                    45 / 180 * 3.1415926));
            })
            .attr("y", function (d, i) {
                return ((h + oR) / 3 + signSide * oR * 2.5 * Math.sin((i - 1) * 45 / 180 * 3.1415926));
            })
            .attr("font-size", function () {
                return (k == i) ? 12 : 6;
            })
            .style("opacity", function () {
                return (k == i) ? 1 : 0;
            });

        t.selectAll(".childBubble" + k)
            .attr("cx", function (d, i) {
                return (oR * (3 * (k + 1) - 1) - 0.6 * oR * (k - 1) + signSide * oR * 2.5 * Math.cos((i - 1) *
                    45 / 180 * 3.1415926));
            })
            .attr("cy", function (d, i) {
                return ((h + oR) / 3 + signSide * oR * 2.5 * Math.sin((i - 1) * 45 / 180 * 3.1415926));
            })
            .attr("r", function () {
                return (k == i) ? (oR * 0.55) : (oR / 3.0);
            })
            .style("opacity", function () {
                return (k == i) ? 1 : 0;
            });
    }
}

// reorder the event list without refresh
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
        },
        error: function (xhr, status, error) {
            alert("error"+xhr.responseText);
        }
    });
}

// delete a news story
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

//resize the home page element
$(window).resize(function() {
      checkSize();
});

// check the home page element
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




// machine learning api
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
            // console.log(JSON.stringify(data, null, 2));
            // var json = JSON.stringify(data, null, 2);
            var tag_0 = data.description.tags[0];
            var tag_1 = data.description.tags[1];
            var tag_2 = data.description.tags[2];

            if (typeof tag_0 === "undefined") {
                tag_0 = "Unknown";
            }
            if (typeof tag_1 === "undefined") {
                tag_1 = "Unknown";
            }
            if (typeof tag_2 === "undefined") {
                tag_2 = "Unknown";
            }

            $("#tags").html("#"+ tag_0
             + ", #" + tag_1 + ", #" + tag_2 );
            // console.log(data.categories[0].name);
            $("#category").html(data.categories[0].name);
            $("#colors").html(data.color.accentColor);
            // alert("#tags"+data.categories[0].name);
            // $("#responseTextArea").val(JSON.stringify(data, null, 2));
        },
        error: function (xhr, status, error) {
            alert("error"+xhr.responseText);
        }
    });


}

