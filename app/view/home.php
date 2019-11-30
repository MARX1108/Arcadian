    <!-- body content section -->
    <div id="news" class="row h-20">

        <div class="card col-md-7 mr-0 ml-5 container">
            <div class="card-body">
                <!-- <div id="topnews"> -->
                <img src="<?= BASE_URL ?>/public/assets/all_topnews.png" width="100%">
                <!-- </div> -->
            </div>
        </div>

        <div class="card col-md-4 ml-4 container">
            <div class="card-body container">
                <div id="signin">

                    <!-- Sign in /Sign up messages -->
                    <form id="login" method="POST" action="<?= BASE_URL ?>/login/process">
                        <div class="container text-center">
                            <?php if(isset($_SESSION['loggedInUserID']) && $_SESSION['loggedInUserRole'] == 0): ?>
                            <p class="h2 justify-content-center mt-5 mb-4"> <Strong> Welcome,
                                    <?= $_SESSION['username'] ?></strong></p>
                            <a id="btn-signup" class="mt-4" href="<?= BASE_URL ?>/logout">Log Out</a>
                            <?php elseif(isset($_SESSION['loggedInUserID']) && $_SESSION['loggedInUserRole'] == 1):  ?>
                            <p class="h2 justify-content-center mt-5 mb-4"> <Strong> Dear <?= $_SESSION['username'] ?>,
                                    you can access admin page here</strong></p>
                            <a id="btn-signup" class="mt-4" href="<?= BASE_URL ?>/admin">Admin</a>
                            <a id="btn-signup" class="mt-4" href="<?= BASE_URL ?>/logout">Log Out</a>
                            <?php else: ?>
                            <p class="h3 mb-3 text-left"> <Strong>Welcome Back! </Strong></p>

                            <?php if(isset($_SESSION['msg'])): ?>
                            <div class="success mb-2 text-left">
                                <Strong>
                                    <?= $_SESSION['msg'] ?>
                                </Strong>
                            </div>
                            <?php unset($_SESSION['msg']); ?>
                            <?php endif; ?>
                        </div>
                        <!-- Sign in /Sign up card -->
                        <div class="container ">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="mb-0">Username</label>
                                <input id="un" name="un" type="text" placeholder=" Username" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1" class="mb-0">Password</label>
                                <input id="pw" name="pw" type="text" placeholder=" Password" class="form-control" />
                            </div>

                            <button id="btn-signin" class="btn btn-primary ml-0 my-0 py-2">sign in</button>
                            <form action="<?= BASE_URL ?>/signup" id="signup_form">
                                <button id="btn-signup" class="btn btn-primary ml-0 my-0 py-2"><a href = "<?= BASE_URL ?>/signup" id = "signup_link"> sign up</a></button>
                            </form>
                    </form>


                </div>
                <?php endif; ?>


                <!-- </div> -->
            </div>
        </div>
    </div>

    </div>



    <div class="main">
    <script type="text/javascript">
    function processImage() {
        // **********************************************
        // *** Update or verify the following values. ***
        // **********************************************

        // let subscriptionKey = process.env['COMPUTER_VISION_SUBSCRIPTION_KEY'];
        // let endpoint = process.env['COMPUTER_VISION_ENDPOINT']
        let subscriptionKey = '467b3c735c0a4779a19575f9a70a1bb3';
        let endpoint = 'https://3744p5.cognitiveservices.azure.com/';
        if (!subscriptionKey) { throw new Error('Set your environment variables for your subscription key and endpoint.'); }
        
        var uriBase = endpoint + "vision/v2.1/analyze";

        // Request parameters.
        var params = {
            "visualFeatures": "Categories,Description,Color",
            "details": "",
            "language": "en",
        };

        // Display the image.
        var sourceImageUrl = "https://upload.wikimedia.org/wikipedia/commons/3/3c/Shaki_waterfall.jpg";
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

            // Request body.
            data: '{"url": ' + '"' + sourceImageUrl + '"}',
            success: function(data)
            {
                alert(JSON.stringify(data, null, 2));
                // $("#responseTextArea").val(JSON.stringify(data, null, 2));
            },
            error: function (xhr, status, error) {
            alert("error"+xhr.responseText);
            }
        });

        // .done(function(data) {
        //     // Show formatted JSON on webpage.
        //     $("#responseTextArea").val(JSON.stringify(data, null, 2));
        // })

        // .fail(function(jqXHR, textStatus, errorThrown) {
        //     // Display error message.
        //     var errorString = (errorThrown === "") ? "Error. " :
        //         errorThrown + " (" + jqXHR.status + "): ";
        //     errorString += (jqXHR.responseText === "") ? "" :
        //         jQuery.parseJSON(jqXHR.responseText).message;
        //     alert(errorString);
        // });
    };
    </script>
    
    <input type="text" name="inputImage" id="inputImage"
    value="https://upload.wikimedia.org/wikipedia/commons/3/3c/Shaki_waterfall.jpg" />
    <button onclick="processImage()">Analyze image</button>

        <?php 
        $count = 0;
        foreach($stories as $story): 
        $count = $count + 1;
        ?>

        <?php if($count% 4 == 1): ?>
        <!-- <ul class="content"> -->
        <div id="news" class="row card-deck">

            <?php endif; ?>
            <div class="card pic_story">
                <!-- <li> -->
                <a href="<?= BASE_URL ?>/detail/<?= $story->id ?>"><img src="<?= $story->img_url ?>" class="pic"
                        width="100%" alt="001" /></a>
                <!--source: <?= $story->url ?> -->
                <!-- </li> -->
            </div>
            <?php if($count % 4 == 0): ?>
            <!-- </ul> -->
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
        </ul>
    </div>
    <div class="container w-100" width="100%">
        <?php if(isset($_SESSION['loggedInUserID'])): ?>
        <!-- <div class = "card"> -->
        <p class="h2 text-center mt-4 mb-2"> Recent Activity Feed</p>
        <div class = "container">
            
        <label class="switch">
        <input type="checkbox" name='reordered' id ='order_check' >
        <span class="slider round"></span>
        
        </label>
        Ordered by event
        </div>
        <!-- <label class="h5 text-center ml-2 mt-2">Ordered by
        <select class = 'form-control' name='class_standing' id = 'event_order' required>
            <option>time</option>
            <option>type</option>
        </select>
        </label> -->
        <!-- <p></p> -->
        <!-- <div class = "card-deck"> -->
        <?=$content?>
        <!-- </div> -->
        <!-- </div> -->
        <?php endif; ?>
    </div>

    </div>