<main>
      <?php 
      if($_SESSION['user']->role_name=="admin"){

        echo '<div class="container mt-4 d-flex"> 
                <a href="index.php?page=insertMovie" class="text-decoration-none p-3 fw-bold text-uppercase insertButton me-3">Insert new movie <i class="fa-solid fa-plus"></i></a>
            </div>';

        echo' <div class="container mt-4">
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>';

        $movies = getAllMovies();

        foreach($movies as $movie){
            echo'<tr>
                    <td class="fw-bold">'.$movie->movie_id.'</td>
                    <td><div class="col-md-4 col-8"><img src="assets/img/movies/'.createSmallerPictureName($movie->url).'" alt="'.explode(".", $movie->url)[0].'" class="img-fluid"></div></td>
                    <td class="fs-4">'.$movie->movie_name.'</td>
                    <td class="fs-5"><a href="index.php?page=updateMovie&id='.$movie->movie_id.'" class="text-decoration-none icoSecondary">Edit <i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="fs-5"><a href = "models/deleteMovie.php?id='.$movie->movie_id.'" class="text-decoration-none icoSecondary">Delete <i class="fa-solid fa-circle-xmark"></i></a> </td>
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