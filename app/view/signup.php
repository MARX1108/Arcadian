<div class = "main">
<div class="card col-md-6 p-1 mx-2  mt-4 mr-5 mx-auto" id="middle_container">
        <?= $notification ?>
        <form id="post" method="POST" action="<?= BASE_URL ?>/confirm_registration">
            <div class="post card mb-4 p-4" id="post_win">
                <label for="title" class="h5 ml-2 ">Username</label>
                <input id="title" name="username" type="text" placeholder="choose a username" class="form-control" required>
                <label for="url" class="h5  ml-2 mt-2">Password</label>
                <input id="url" name="password" type="text" placeholder="choose a password" class="form-control" required>
                
                <label for="url" class="h5  ml-2 mt-2">Password Again</label>
                <input id="url" name="password2" type="text" placeholder="type in your password again" class="form-control" required>
                
                <label for="url" class="h5  ml-2 mt-2">Firstname</label>
                <input id="url" name="firstname" type="text" placeholder="Your First Name" class="form-control" required>

                <label for="url" class="h5  ml-2 mt-2">Lastname</label>
                <input id="url" name="lastname" type="text" placeholder="Your Last Name" class="form-control" required>

                <label for="url" class="h5  ml-2 mt-2">Email</label>
                <input id="url" name="email" type="text" placeholder="Your Email" class="form-control" required>
                
                <label for="url" class="h5  ml-2 mt-2">Class Standing</label>
                <select class = 'form-control' name='class_standing' required>
                    <option disabled = ''> Current Standing:  </option>
                    <option>Freshman</option>
                    <option>Sophomore</option>
                    <option>Junior</option>
                    <option>Senior</option>
                </select>

                <label for="url" class="h5  ml-2 mt-2">Account Type</label>
                <input id="url" name="url" type="text" placeholder="Regular Account" class="form-control" disabled>
                
                <button id="upload" type="submit" class="btn btn-primary mt-3">Post</button>
            </div>
        </form>

</div>
</div>