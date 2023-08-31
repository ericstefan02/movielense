<main>
      <?php 
      if($_SESSION['user']->role_name=="admin"){
        $userId = $_GET['id'];
        $user = getThisUser($userId);

        $allRoles = getAll("roles");
        echo '<div class="container mt-5"><h2>Insert user</h2></div>';
        echo '<div class = "container">'; 
        echo '<form class="w-75">
        <div class="form-group">
                      <label for="regInputEmail" class="my-2 ico">Email address</label>
                      <input type="email" class="form-control inputForForm" id="regInputEmail" aria-describedby="emailHelp" placeholder="Enter email" value='.$user->email.'>
                      <div class="invalid-feedback" id="invalidEmail">
                        Please enter a valid email.
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="regInputUsername" class="my-2 ico">Username</label>
                        <input type="text" class="form-control inputForForm" id="regInputUsername" aria-describedby="emailHelp" placeholder="Enter username" value='.$user->username.'>
                        <div class="invalid-feedback" id="invalidUsername">
                        Please enter username that is more than 3 characters long.
                      </div>
                      <div class="invalid-feedback" id="takenUsername">
                        Username is taken.
                      </div>
                      </div>
                    <div class="form-group">
                      <label for="regInputPassword" class="my-2 ico">Password</label>
                      <input type="password" class="form-control inputForForm" id="regInputPassword" placeholder="Password" value='.$user->password.'>
                      <div class="invalid-feedback" id="invalidPassword">
                        Please enter a password that has one small, one capital letter and a number.
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="regInputRenter" class="my-2 ico">Re-enter password</label>
                        <input type="password" class="form-control inputForForm" id="regInputRenter" placeholder="Confirm password" value='.$user->password.'>
                        <div class="invalid-feedback" id="invalidRenter">
                        Passwords do not match eachother.
                      </div>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input inputForForm" type="checkbox" value="" id="newPasswordTrue">
                        <label class="form-check-label" for="newPasswordTrue">
                            This is new password
                        </label>
                        </div>
                        <input type="hidden" value="'.$userId.'" id="userId"/>
                      <div class="form-group mt-5">
                        <label for="pictureUrl">Choose role</label>
                        <select class="form-control inputForForm" id="userRole">';
                        foreach($allRoles as $role){
                            echo'<option value="'.$role->role_id.'" '.($role->role_id==$user->role_id?"selected":"").'>'.$role->role_name.'</option>';
                        }
                        echo'</select>
                        </div>
                        <input type="button" class="btn insertButton rounded mt-5 mb-5"id="userUpdate" value="Update user"/>    
                  </form>';

        
      }
      else{
        echo '<div class="alert alert-danger text-center my-5 w-50 mx-auto">
                <h1>You are not allowed to enter this page!</h1>
                </div>';
      }
      ?>
    </main>