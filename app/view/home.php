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
                        <div class = "container text-center">
                        <?php if(isset($_SESSION['loggedInUserID']) && $_SESSION['loggedInUserRole'] == 0): ?>
                        <p class="h2 justify-content-center mt-5 mb-4"> <Strong> Welcome, <?= $_SESSION['username'] ?></strong></p>
                        <a id="btn-signup" class = "mt-4" href="<?= BASE_URL ?>/logout">Log Out</a>
                        <?php elseif(isset($_SESSION['loggedInUserID']) && $_SESSION['loggedInUserRole'] == 1):  ?>
                        <p class="h2 justify-content-center mt-5 mb-4"> <Strong> Dear <?= $_SESSION['username'] ?>, you can access admin page here</strong></p>
                        <a id="btn-signup" class = "mt-4" href="<?= BASE_URL ?>/admin">Admin</a>
                        <a id="btn-signup" class = "mt-4" href="<?= BASE_URL ?>/logout">Log Out</a>
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
                        <div class = "container ">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="mb-0">Email address</label>
                            <input id="un" name="un" type="text" placeholder=" Username" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" class="mb-0">Password</label>
                            <input id="pw" name="pw" type="text" placeholder=" Password" class="form-control" />
                        </div>

                        <button id="btn-signin" class="btn btn-primary ml-0 my-0 py-2">sign in</button>
                        <button id="btn-signup" class="btn btn-primary ml-0 my-0 py-2"><a href = "<?= BASE_URL ?>/signup">sign up</a></button>
                        </div>
                        <?php endif; ?>
                    </form>

                    <!-- </div> -->
                </div>
            </div>
        </div>

    </div>

    <div class="main">
       

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
        <div class = "container w-100" width = "100%">
        <?php if(isset($_SESSION['loggedInUserID'])): ?>
        <!-- <div class = "card"> -->
        <p class = "h2 text-center mt-4 mb-2"> Recent Activity Feed</p>
        <!-- <p></p> -->
        <!-- <div class = "card-deck"> -->
        <?=$content?>
        <!-- </div> -->
        <!-- </div> -->
        <?php endif; ?>
        </div>

    </div>