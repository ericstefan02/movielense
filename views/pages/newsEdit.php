<main>
      <?php 
      if($_SESSION['user']->role_name=="admin"){

        echo '<div class="container mt-4 d-flex"> 
                <a href="index.php?page=insertNews" class="text-decoration-none p-3 fw-bold text-uppercase insertButton me-3">Insert more news <i class="fa-solid fa-plus"></i></a>
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

        $news = getAllNews();

        foreach($news as $new){
            echo'<tr>
                    <td class="fw-bold">'.$new->news_id.'</td>
                    <td><div class="col-md-5 col-10"><img src="assets/img/news/'.$new->url.'" alt="'.explode(".", $new->url)[0].'" class="img-fluid"></div></td>
                    <td class="fs-4">'.$new->news_title.'</td>
                    <td class="fs-5"><a href="index.php?page=updateNews&id='.$new->news_id.'" class="text-decoration-none icoSecondary">Edit <i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="fs-5"><a href = "models/deleteNews.php?id='.$new->news_id.'" class="text-decoration-none icoSecondary">Delete <i class="fa-solid fa-circle-xmark"></i></a> </td>
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