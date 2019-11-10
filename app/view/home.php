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

                    <!-- <div> -->
                    <form id="login" method="POST" action="<?= BASE_URL ?>/login/process">

                        <?php if(isset($_SESSION['username'])): ?>
                        <p>Welcome, <strong><?= $_SESSION['username'] ?></strong>
                            </br>
                            <a id="btn-signup" href="<?= BASE_URL ?>/logout">Log Out</a></p>
                        <?php else: ?>
                        <p>Welcome Back!</p>


                        <?php if(isset($_SESSION['msg'])): ?>
                        <div class="success">
                            <?= $_SESSION['msg'] ?>
                        </div>
                        <?php unset($_SESSION['msg']); ?>
                        <?php endif; ?>

                        <input id="un" name="un" type="text" placeholder=" Username" />
                        <input id="pw" name="pw" type="text" placeholder=" Password" />
                        <button id="btn-signin">sign in</button>
                        <button id="btn-signup" disabled>sign up</button>
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