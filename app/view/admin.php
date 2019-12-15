<?php if(isset($_SESSION['username'])): ?>

<div class="main">
    <div class = "container card" id="mainBubble" >
        <!-- <svg class="mainBubbleSVG"></svg> -->
    </div>
    <div class = "container card" id = "quickAction">
        <div class="row  p-2 mx-1 mt-1">
            <div class="col-1  p-4 mx0">
                ID
                <input id="id" name="id" type="text" placeholder="<?=$user->id?>" class="form-control mt-1"
                    disabled>
            </div>
            <div class=" col-2 p-4 mx-1">
                Username:
                <input id="username" name="username" type="text" placeholder="<?=$user->username?>" class="form-control mt-1"
                    required>
            </div>
            <div class=" col-2 p-4 mx-1">
                First Name:
                <input id="firstname" name="username" type="text" placeholder="<?=$user->username?>" class="form-control mt-1"
                    required>
            </div>

            <div class=" col-2 p-4 mx-1">
                Last Name:
                <input id="lastname" name="username" type="text" placeholder="<?=$user->username?>" class="form-control mt-1"
                    required>
            </div>

            <div class=" col-2 p-4 mx-1">
                Role:
                <select class='form-control mt-1' id = 'role_select' name='role' required>
                    <option disabled></option>
                    <option id = "regular_user" >0 - regular user</option>
                    <option id = "site_user">1 - site admin</option>
                </select>
            </div>

            <div class=" col-2 p-4 mx-2">
                Date Registered:
                <input id="date" name="username" type="text" placeholder="<?=$user->date_registered?>"
                    class="form-control mt-1" disabled>
            </div>
            <div class=" col-10 p-4 mx-4 ">
                Quick Action
                <button id="save" class="btn btn-primary mt-1 mx-4">Save Current Changes</button>
                <button id="delete" class="btn btn-primary mt-1 mx-4">Delete Current User</button>
                <button id="create"  class="btn btn-primary mt-1 mx-4">Create a New User</button>
            </div>
            </div>
        <!-- <svg class="mainBubbleSVG"></svg> -->
    </div>
    
    <?=$notification?>
    <?php foreach($users as $user): ?>
    
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
                <input name="username" type="text" placeholder="<?=$user->date_registered?>"
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