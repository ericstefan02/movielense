<main>
      <?php 
      if($_SESSION['user']->role_name=="admin"){

        echo '<div class="container mt-4 d-flex"> 
                <a href="index.php?page=insertUser" class="text-decoration-none p-3 fw-bold text-uppercase insertButton me-3">Insert new user <i class="fa-solid fa-plus"></i></a>
            </div>';

        echo' <div class="container mt-4">
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>';

        $users = getUsersWithRole();

        foreach($users as $user){
            echo'<tr>
                    <td class="fw-bold">'.$user->user_id.'</td>
                    <td class="fw-bold">'.$user->email.'</td>
                    <td class="fw-bold">'.$user->username.'</td>
                    <td class="fw-bold">'.substr($user->password, 0, 10).'...</td>
                    <td class="fw-bold">'.$user->role_name.'</td>
                    <td class="fw-bold fs-5"><a href="index.php?page=updateUser&id='.$user->user_id.'" class="text-decoration-none icoSecondary">Edit <i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="fw-bold fs-5"><a href = "models/deleteUser.php?id='.$user->user_id.'" class="text-decoration-none icoSecondary">Delete <i class="fa-solid fa-circle-xmark"></i></a></td>   
                </tr>';
        }
        echo'</tbody>
        </table>
     </div>';
      }
      else{
        echo '<div class="alert alert-danger text-center my-5 w-50 mx-auto">
                <h1>You are not allowed to enter this page!</h1>
                </div>';
      }
      ?>
    </main>