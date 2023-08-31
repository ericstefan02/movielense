  <main>
       <div class="container d-flex justify-content-center mt-4 mb-2 text-center"> <h1 class="fw-bold ico">MovieLense - Home of all movies</h1></div>  
       <?php 
        $allCategories = getAll("category");
        echo '<div class="container d-flex justify-content-center mb-2 flex-wrap align-items-center">';
        foreach($allCategories as $category){
          echo ' <div class="form-check">
                    <input class="form-check-input inputForForm ms-1" name="categories[]" type="checkbox" value="'.$category->category_id.'"/>
                    &nbsp;
                    <label class="form-check-label">
                      '.$category->category_name.'
                    </label>
                  </div>';
        }
        echo '<div>
        <select class="form-select inputForForm ms-md-5 ms-0" id="sort">
          <option value="1">Name A-Z</option>
          <option value="2">Newer</option>
          <option value="3">Older</option>
          <option value="4">Best rating</option>
          <option value="5">Worst rating</option>
        </select>
        </div>';
        echo '</div>';
       ?>
        <div class="d-flex justify-content-between flex-wrap container align-items-center" id="allMovies">
            <?php 
            $allMovies = getAllDataOfMovies();
            foreach($allMovies as $movie){
                $name = $movie->movie_name;
                $url = $movie->url;
                $alt = explode(".", $url)[0];
                $id = $movie->movie_id;
                $avgGrade = $movie->grade;
                $formatted_grade = number_format((float) $avgGrade, 1, '.', '');
                $categories = getMovieCategories($id);
                echo' <div class="col-lg-2 col-6 p-lg-0 p-1 mb-2 me-md-4 me-0">
                        <a href="index.php?page=movie&id='.$id.'">
                        <img src="assets/img/movies/'.createSmallerPictureName($url).'" alt="'.$alt.'" class="img-fluid" />
                        </a>
                        <div class="p-2 movieInfo">
                        <i class="fa-solid fa-star ico"></i> '.$formatted_grade.'
                        <h6 class="fw-bolder">'.$name.'</h6>
                        <p>';
                        $rb = 0;
                        foreach($categories as $category){
                            $rb++;
                            echo $category->category_name;
                            if($rb!=count($categories)){
                                echo ", ";
                            }
                        }
                        echo'</p>
                        <div class="d-flex justify-content-between">
                            <div class="col-10">';
                            if(isset($_SESSION['user'])){
                              echo'<a href="models/addMovieToWwatchList.php?movieId='.$id.'&userId='.$_SESSION['user']->user_id.'" class="text-decoration-none watchlistLink p-2"><i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist</a>';
                            }
                            else{
                              echo'<a href="login.php" class="text-decoration-none watchlistLink p-2"><i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist</a>';
                            }
                            echo'</div>
                            <div class="mb-1"> 
                            <a href="index.php?page=movie&id='.$id.'" class="info"><i class="fa-solid fa-circle-info info fs-4 icoSecondary"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>';
            }
            ?>  
        </div>
      </div>
      <div class="container d-flex justify-content-center align-items-center" id="paginationMenu">
        <?php 
          $numberOfPages = getNumberOfPages();
          for($i = 0; $i<$numberOfPages; $i++){
            echo '<a href="#" class="text-decoration-none movie-pagination '.($i==0?"active":"").'" data-limit="'.$i.'"><p class="me-2 paginationLink fw-bold">'.($i+1).'</p></a>';
          }
        ?>
      </div>
    </main>