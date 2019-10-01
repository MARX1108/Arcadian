$(document).ready(function() {
    $("#news > #topnews").css(
        {
            'padding-top':($("#news >#signin").innerHeight()+'px'),
            'width': $(document).width() -($("#news").css("padding-left") + $("#news").css("padding-right") +
                $("#news >#signin").outerWidth())
        }

    );
})
