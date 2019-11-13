<?php if(isset($_SESSION['username'])): ?>

<div class="main row">

    <div class="card col-md-2 mr-5 p-4 mt-4 text-center">
        <ul class="h5 my-3">
            <p class="h2 justify-content-center mt-5 mb-4"> <Strong> <?= ($user -> username) ?></strong></p>
            <p class="h10 justify-content-center mt-1 mb-1 mr-auto"> <Strong> ID: <?= ($user -> username)?></strong></p>
            <p class="h10 justify-content-center mt-1 mb-5 mr-auto"> <Strong> Email: <?= ($user -> email) ?></strong>
            </p>

            <p class="pt-5"><a href="<?= BASE_URL ?>/profile/following" class=" my-5 sub_nar">Following</a></p>

            <p><a href="#" id="current_tab" class="my-5 sub_nar ">Timeline</a></p>

            <p><a href="<?= BASE_URL ?>/profile/myProfile" class=" my-5 sub_nar ">MyProfile</a></p>

            <?php if(isset($_SESSION['loggedInUserID']) && $_SESSION['loggedInUserRole'] == 1):  ?>
            <a id="btn-signup" class="mt-4 sub_nar" href="<?= BASE_URL ?>/admin">Admin</a>
            <?php endif; ?>
            <p class="pt-5 mt-5"><a id="btn-signup" class="mt-5" href="<?= BASE_URL ?>/logout">Log Out</a></p>
        </ul>
    </div>

    <div class="card col-md-6 p-1 mx-2  mt-4 mr-5" id="middle_container">
        <div><?= $notification ?></div>
        <form id="post" method="POST" action="<?= BASE_URL ?>/profile/submit">
            <div class="post card mb-4 p-4" id="post_win">
                <label for="title" class="h5 ml-2 ">Title</label>
                <input id="title" name="title" type="text" placeholder="Titles goes here" class="form-control">

                <label for="url" class="h5  ml-2 mt-2">URL (required)</label>
                <input id="url" name="url" type="text" placeholder="URL goes here" class="form-control">

                <label for="tags" class="h5  ml-2 mt-2">Tags </label>
                <input id="url" name="tags" type="text" placeholder="Tags goes here" class="form-control">

                <label for="img_url" class="h5 ml-2 mt-2">URL of Your Art Work (required)</label>
                <input id="img_url" name="img_url" type="text" placeholder="URL of Your Art Work" class="form-control">

                <textarea id="description" name="description" placeholder="Description goes here."
                    class="form-control my-4 mt-2"></textarea>
                <button id="upload" type="submit" class="btn btn-primary">Post</button>
            </div>
        </form>

        <?php foreach($stories as $story): ?>
        <?php if(strcmp(($story->creator_id), $_SESSION['loggedInUserID'])== 0):?>
        <div class="post card m-2 p-4">
            <ul class="post_pic">
                <p><a href="#" class="h3 mb-2 pic_title"><?=$story->title?></a> </br> by <?=$story->author?> </p>

                <a href="<?= BASE_URL ?>/detail/<?= $story->id ?>">
                    <img src="<?= $story->img_url ?>" width="80%" alt="<?=$story->title?>" /></a>

                <p class="mt-1"><Strong class="mt-3 h5">Description: </br></Strong><?=$story->description?></p>
                <p class="mt-1"><Strong class="mt-3 h5">Tags: </br></Strong><?=$story->tags?></p>
                <form id="post" method="POST" action="<?= BASE_URL ?>/detail/<?= $story->id ?>/edit">
                    <button class="edit btn btn-primary" type="submit" name="edit_request" value="true">Edit</button>
                    <button class="delete btn btn-primary" type="button" id="delete" name="delete_request" value="true"
                        onclick="delete_('<?= $story->id ?>', '<?= BASE_URL ?>', '<?= $story->creator_id?>')">
                        Delete</button>
                </form>
                <p class="time_stamp text-right"><?=$story->date_created?></p>
            </ul>

        </div>
        <?php endif; ?>
        <?php endforeach; ?>


    </div>
    <div class="card col-md-3 mt-4 ml-auto p-5">
        <h2>Activity Feed</h2>
        <p>
            <?=$content?>
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