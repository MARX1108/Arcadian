
<div class="main row">


<div class="card col-md-2 mr-5 p-4 mt-4 text-center">
        <ul class="h5 my-3">
        <p class="h2 justify-content-center mt-5 mb-4"> <Strong> <?= ($user -> username) ?></strong></p>
        <p class="h10 justify-content-center mt-1 mb-1 mr-auto"> <Strong> Username: <?= ($user -> username)?></strong></p>
        <p class="h10 justify-content-center mt-1 mb-5 mr-auto"> <Strong> Email: <?= ($user -> email) ?></strong></p>        
        </ul>
    </div>

    <div class="card col-md-6 p-1 mx-2  mt-4 mr-5" id="middle_container">
        <form id="post" method="POST" action="<?= BASE_URL ?>/profile/confirm_profile_change/<?= ($user -> id)?>">
            <div class="post card mb-4 p-4" id="post_win">
                <label for="title" class="h5 ml-2 ">Username</label>
                <input id="title" name="username" type="text" placeholder="<?= ($user -> username)?>" class="form-control" disabled>
            
                <label for="title" class="h5 ml-2 ">ID</label>
                <input id="title" name="id" type="text" placeholder="<?= ($user -> id)?>" class="form-control" disabled>
                
                <label for="url" class="h5  ml-2 mt-2">Firstname</label>
                <input id="url" name="firstname" type="text" placeholder="<?= ($user -> firstname)?>" class="form-control" disabled>


                <label for="url" class="h5  ml-2 mt-2">Lastname</label>
                <input id="url" name="lastname" type="text" placeholder="<?= ($user -> lastname)?>" class="form-control" disabled>

                <label for="url" class="h5  ml-2 mt-2">Email</label>
                <input id="url" name="email" type="text" placeholder="<?= ($user -> email)?>" class="form-control" disabled>
                
                <label for="url" class="h5  ml-2 mt-2">Class Standing</label>
                <select class = 'form-control' name='class_standing' disabled>
                    <option disabled = ''> Current Standing: <?= $class_standing?> </option>
                    <option>Freshman</option>
                    <option>Sophomore</option>
                    <option>Junior</option>
                    <option>Senior</option>
                </select>

                <label for="url" class="h5  ml-2 mt-2">Account Type</label>
                <input id="url" name="url" type="text" placeholder="<?= $acounttype?>" class="form-control" disabled>
    
            </div>
        </form>


        <?php foreach($stories as $story): ?>
            
        <?php if(strcmp(($story->creator_id), $user->id) == 0):?>
        <div class="post card m-2 p-4">
            <ul class="post_pic">
                <p><a href="#" class="h3 mb-2 pic_title"><?=$story->title?></a> </br> by <?=$story->author?> </p>

                <a href="<?= BASE_URL ?>/detail/<?= $story->id ?>">
                    <img src="<?= $story->img_url ?>" width="80%" alt="<?=$story->title?>" /></a>

                <p class="mt-1"><Strong class="mt-3 h5">Description: </br></Strong><?=$story->description?></p>
                <p class="mt-1"><Strong class="mt-3 h5">Tags: </br></Strong><?=$story->tags?></p>
            
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
