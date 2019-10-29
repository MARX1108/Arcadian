<?php if(isset($_SESSION['username'])): ?>
<div class="main">
    <ul id="secondary-nav">
        <li class="selected">
            <a href="#" style="color: #01CEFF; font-family: JosefinSans-Bold">Following</a>
        </li>
        <li><a href="<?= BASE_URL ?>/profile/timeline">Timeline</a></li>
        <!-- <li><a href="./profile_gallery.html">Gallery</a></li> -->
    </ul>
    <div id="content-left">
        <form id="post" method="POST" action="<?= BASE_URL ?>/profile/submit">
        <div class="post" id="post_win">
            <label for="title">Title</label>
            <input id="title" name="title" type="text" placeholder="Title goes here">

            <label for="url">URL (optional)</label>
            <input id="url" name="url" type="text" placeholder="URL goes here">

            <label for="tags">Tags (optional)</label>
            <input id="url" name="tags" type="text" placeholder="Tags goes here">

            <label for="img_url">URL of Your Art Work (required)</label>
            <input id="img_url" name="img_url" type="text" placeholder="URL of Your Art Work (required)">
            
            <textarea id="description" name="description" placeholder="Description goes here"></textarea>

            <button id="upload" type="submit">Post</button>

        </div>
        </form>

        <?php foreach($stories as $story): ?>
        <?php if(strcmp(($story->author), $_SESSION['username']) != 0):?>
        <div class="post">
            <p><a href="#"><?=$story->title?></a> by <?=$story->author?></p>

            <ul class="post_pic">
                <a href="<?= BASE_URL ?>/detail/<?= $story->id ?>"><img src="<?= $story->img_url ?>" width = "80%" alt="<?=$story->title?>" /></a>
                <p style=" color: #4f4382; width: 80%;">Description: </br><?=$story->description?></p>
                <p style=" color: #4f4382; width: 80%;">Tags: </br><?=$story->tags?></p>

            </ul>
            <p class="time_stamp"><?=$story->date_created?></p>
        </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>

    <div id="content-right">
        <h2>Welcome to Arcadian</h2>

        <p>
            Arcadian is a user-generate-content online community which targets college students who are interested
            in learn graphic design, and aims to facilitate a art-based social community where people can share they
            work, critic each other, meet new people and look for inspirations
        </p>
    </div>

    <?php else: ?>
    <div class="main" style=" padding: 20% 33% 20% 39%; ">
    <!-- <div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/"             title="Flaticon">www.flaticon.com</a></div> --> 
    <img src="<?= BASE_URL ?>/public/assets/padlock.png" alt="" width = "15%" 
    style = "margin-left: 31%;" href="<?= BASE_URL ?>/home" > 
    </br>
    
    <a id="btn-signin" href="<?= BASE_URL ?>/home" 
        style="text-decoration: none; 
        color: #448eff;
        font-size: 100%; width: 100%; text-align: center;
        margin-left: 22%;">
        Click Here To Sign in</a>
        <?php endif; ?>
    </div>