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
        return "click bubbles to view/edit/delete users";
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
            "click bubbles to view/edit/delete users"
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

});
//TODO: 
// 
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
            alert(output.children[0].children.name);
            bubble(output);
            // $("#event_home").replaceWith(output.event);
        },
        error: function (xhr, status, error) {
            alert("error: "+xhr.responseText);
        }
    });
}


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
            return activateBubble(d, i);
        });


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


    for (var iB = 0; iB < nTop; iB++) {
        var childBubbles = svg.selectAll(".childBubble" + iB)
            .data(root.children[iB].children)
            .enter().append("g");
        childBubbles.append("circle")
            .attr("class", "childBubble" + iB)
            .attr("id", function (d, i) {
                return "childBubble_" + iB + "sub_" + i;
            })
            .attr("r", function (d) {
                return oR / 3.0;
            })
            .attr("cx", function (d, i) {
                return (oR * (3 * (iB + 1) - 1) + oR * 1.5 * Math.cos((i - 1) * 45 / 180 * 3.1415926));
            })
            .attr("cy", function (d, i) {
                return ((h + oR) / 3 + oR * 1.5 * Math.sin((i - 1) * 45 / 180 * 3.1415926));
            })
            .attr("font-size", 3)
            .attr("cursor", "pointer")
            .style("opacity", 0.5)
            .style("fill", "#eee")
            .on("click", function (d, i) {
                window.open(d.address);
            })
            .on("mouseover", function (d, i) {
                //window.alert("say something");
                var noteText = "";
                if (d.note == null || d.note == "") {
                    noteText = d.address;
                } else {
                    noteText = d.note;
                }
                d3.select("#bubbleItemNote").text(noteText);
            })
            .append("svg:title")
            .text(function (d) {
                return d.address;
            });

        childBubbles.append("text")
            .attr("class", "childBubbleText" + iB)
            .attr("x", function (d, i) {
                return (oR * (3 * (iB + 1) - 1) + oR * 1.5 * Math.cos((i - 1) * 45 / 180 * 3.1415926));
            })
            .attr("y", function (d, i) {
                return ((h + oR) / 3 + oR * 1.5 * Math.sin((i - 1) * 45 / 180 * 3.1415926));
            })
            .style("opacity", 0.5)
            .attr("text-anchor", "middle")
            .style("fill", function (d, i) {
                return colVals(iB);
            }) // #1f77b4
            .attr("font-size", 3)
            .attr("cursor", "pointer")
            .attr("dominant-baseline", "middle")
            .attr("alignment-baseline", "middle")
            .text(function (d) {
                return d.name
            })
            .on("click", function (d, i) {
                window.open(d.address);
            });

    }
}


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

