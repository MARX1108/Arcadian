<?php if(isset($_SESSION['username'])): ?>

<div class="main row">

    <div class="card col-md-2 mr-5 p-1 mt-4">
        <li class="selected">
            <a href="<?= BASE_URL ?>/profile/following">Following</a>
        </li>
        <li>
            <a href="#" id="current_tab">Timeline</a>
        </li>
    </div>

    <div class="card col-md-6 p-1  m-2 mr-5" id="middle_container">

        <form id="post" method="POST" action="<?= BASE_URL ?>/profile/submit">
            <div class="post card my-4 p-4" id="post_win">
                <label for="title" class="h5 ml-2 ">Title</label>
                <input id="title" name="title" type="text" placeholder="Titles goes here" class="form-control">

                <label for="url" class="h5  ml-2 mt-2">URL (required)</label>
                <input id="url" name="url" type="text" placeholder="URL goes here" class="form-control">

                <label for="tags" class="h5  ml-2 mt-2">Tags </label>
                <input id="url" name="tags" type="text" placeholder="Tags goes here" class="form-control">

                <label for="img_url" class="h5 ml-2 mt-2">URL of Your Art Work (required)</label>
                <input id="img_url" name="img_url" type="text" placeholder="URL of Your Art Work" class="form-control">

                <textarea id="description" name="description" placeholder="Description goes here. "
                    class="form-control my-4 mt-2"></textarea>
                <button id="upload" type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>

        <?php foreach($stories as $story): ?>
        <?php if(strcmp(($story->author), $_SESSION['username'])== 0):?>
        <div class="post card m-2 p-4">

            <p><a href="#"><?=$story->title?></a> by <?=$story->author?></p>
            <ul class="post_pic">
                <a href="<?= BASE_URL ?>/detail/<?= $story->id ?>"><img src="<?= $story->img_url ?>" width="80%"
                        alt="<?=$story->title?>" /></a>
                <p>Description: </br><?=$story->description?></p>
                <p>Tags: </br><?=$story->tags?></p>
                <form id="post" method="POST" action="<?= BASE_URL ?>/detail/<?= $story->id ?>/edit">
                    <button class="edit" type="submit" name="edit_request" value="true">Edit</button>
                    <button class="delete" type="button" id="delete" name="delete_request" value="true"
                        onclick="delete_('<?= $story->id ?>', '<?= BASE_URL ?>')"> Delete</button>
                </form>
            </ul>
            <p class="time_stamp"><?=$story->date_created?></p>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>


    </div>
    <div class="card col-md-3 mt-4 ml-auto p-3">
        <h2>Welcome to Arcadian</h2>
        <p>
            Arcadian is a user-generate-content online community which targets college students who are interested
            in learn graphic design, and aims to facilitate a art-based social community where people can share they
            work, critic each other, meet new people and look for inspirations
        </p>
    </div>
    <!-- #content-right -->

    <?php else: ?>
    <div class="main container text-center">
        <!-- <div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/"             title="Flaticon">www.flaticon.com</a></div> -->
        <!-- <div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/"             title="Flaticon">www.flaticon.com</a></div> -->
        <!-- <div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/"             title="Flaticon">www.flaticon.com</a></div> -->
        <img src="<?= BASE_URL ?>/public/assets/padlock.png" alt="" width="10%" href="<?= BASE_URL ?>/home">
        </br>

        <a href="<?= BASE_URL ?>/home" class="mt-4">Click Here To Sign in</a>
        <?php endif; ?>
    </div>