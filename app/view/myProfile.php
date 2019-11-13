<?php if(isset($_SESSION['username'])): ?>

<div class="main row">


<div class="card col-md-2 mr-5 p-4 mt-4 text-center">
        <ul class="h5 my-3">
        <p class="h2 justify-content-center mt-5 mb-4"> <Strong> <?= ($user -> username) ?></strong></p>
        <p class="h10 justify-content-center mt-1 mb-1 mr-auto"> <Strong> ID: <?= ($user -> username)?></strong></p>
        <p class="h10 justify-content-center mt-1 mb-5 mr-auto"> <Strong> Email: <?= ($user -> email) ?></strong></p>


        <p class = "pt-5"><a href="<?= BASE_URL ?>/profile/following" class = " my-5 sub_nar " >Following</a></p>
        
        <p><a href="<?= BASE_URL ?>/profile/timeline"  class = "my-5 sub_nar " >Timeline</a></p>

        <p><a href="<?= BASE_URL ?>/profile/following" class = " my-5 sub_nar " id="current_tab">MyProfile</a></p>
        
        <?php if(isset($_SESSION['loggedInUserID']) && $_SESSION['loggedInUserRole'] == 1):  ?>
        <a id="btn-signup" class = "mt-4 sub_nar" href="<?= BASE_URL ?>/admin">Admin</a>
        <?php endif; ?>
        <p class = "pt-5 mt-5"><a id="btn-signup" class = "mt-5" href="<?= BASE_URL ?>/logout">Log Out</a></p>
        </ul>
    </div>

    <div class="card col-md-6 p-1 mx-2  mt-4 mr-5" id="middle_container">
        <?= $notification ?>
        <form id="post" method="POST" action="<?= BASE_URL ?>/profile/confirm_profile_change/<?= ($user -> id)?>">
            <div class="post card mb-4 p-4" id="post_win">
                <label for="title" class="h5 ml-2 ">Username</label>
                <input id="title" name="username" type="text" placeholder="<?= ($user -> username)?>" class="form-control" disabled>
                <label for="url" class="h5  ml-2 mt-2">Password</label>
                <input id="url" name="password" type="text" placeholder="<?= ($user -> password)?>" class="form-control" required>

                <label for="title" class="h5 ml-2 ">ID</label>
                <input id="title" name="id" type="text" placeholder="<?= ($user -> id)?>" class="form-control" disabled>
                
                <label for="url" class="h5  ml-2 mt-2">Firstname</label>
                <input id="url" name="firstname" type="text" placeholder="<?= ($user -> firstname)?>" class="form-control" required>


                <label for="url" class="h5  ml-2 mt-2">Lastname</label>
                <input id="url" name="lastname" type="text" placeholder="<?= ($user -> lastname)?>" class="form-control" required>

                <label for="url" class="h5  ml-2 mt-2">Email</label>
                <input id="url" name="email" type="text" placeholder="<?= ($user -> email)?>" class="form-control" required>
                
                <label for="url" class="h5  ml-2 mt-2">Class Standing</label>
                <select class = 'form-control' name='class_standing' required>
                    <option disabled = ''> Current Standing: <?= $class_standing?> </option>
                    <option>Freshman</option>
                    <option>Sophomore</option>
                    <option>Junior</option>
                    <option>Senior</option>
                </select>

                <label for="url" class="h5  ml-2 mt-2">Account Type</label>
                <input id="url" name="url" type="text" placeholder="<?= $acounttype?>" class="form-control" disabled>
                
                <button id="upload" type="submit" class="btn btn-primary mt-3">Post</button>
            </div>
        </form>




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


