<?php if(isset($_SESSION['username'])): ?>

<div class="main">
    <?=$notification?>
    <?php foreach($users as $user): ?>
    <div class="row  p-4 mx-1 mt-1">
        <div id="mainBubble" style="height: 760px;">
            <svg class="mainBubbleSVG" width="1085.28" height="760"></svg>
        </div>
    </div>
    <form id="post" method="POST" action="<?= BASE_URL ?>/admin/admin_confirm_change/<?= $user->id?>">
        <div class="row  p-4 mx-1 mt-1">
            <div class="card col-2  p-4 mx-2 ">
                User ID:
                <input id="title" name="username" type="text" placeholder="<?=$user->id?>" class="form-control mt-1"
                    disabled>
            </div>
            <div class="card col-2 p-4 mx-2">
                Username:
                <input id="url" name="username" type="text" placeholder="<?=$user->username?>" class="form-control mt-1"
                    required>
            </div>
            <div class="card col-2 p-4 mx-2">
                Role:

                <select class='form-control mt-1' name='role' required>
                    <option disabled=''> Current Role: <?=$user->role?> </option>
                    <option>0 - regular user</option>
                    <option>1 - site admin</option>
                </select>

            </div>
            <div class="card col-3 p-4 mx-2">
                Date Registered:
                <input id="title" name="username" type="text" placeholder="<?=$user->date_registered?>"
                    class="form-control mt-1" disabled>
            </div>
            <div class="card col-2 p-4 mx-2">
                Confirm Change:
                <button id="upload" type="submit" class="btn btn-primary mt-1">Submit</button>
            </div>
    </form>

</div>
<?php endforeach; ?>



</div>

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