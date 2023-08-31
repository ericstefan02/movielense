<main>
      <div class="d-flex flex-wrap container align-items-center mt-2 mb-4"> 
        <div class="col-lg-8 col-12">
          <div class="d-flex align-items-center justify-content-center me-lg-3 me-md-0">
            <a href="#" class="fs-2" id="slideLeft"
              ><i class="fa-solid fa-chevron-left ico"></i
            ></a>
            <div id="mainMovie" class="col-12 mt-2">
              <img src="" class="img-fluid" alt="picOfMainNews" id="newsCover"/>
            </div>
            <a href="#" class="fs-2" id="slideRight"
              ><i class="fa-solid fa-chevron-right ico"></i
            ></a>
          </div>
          <h2 id="sliderText" class="fw-bolder ms-2"></h2>
        </div>
        <div class="col-lg-4 col-12">
          <h4 class="mt-lg-0 mt-md-5 mt-3 fw-bold icoSecondary">Newest in Hollywood</h4>
          <?php 
                $newestMovies = getNewestMovies();
                foreach($newestMovies as $newestMovie){
                    $id = $newestMovie->movie_id;
                    $name = $newestMovie->movie_name;
                    $date = date('Y-m-d', strtotime($newestMovie->date));
                    $url = $newestMovie->url;
                    $alt = explode(".", $url)[0];
                    echo ' <div class="d-flex movieInfoHolder mb-2">
                                <div class="col-3">
                                <img src="assets/img/movies/'.createSmallerPictureName($url).'" class="img-fluid" alt="'.$alt.'" />
                                </div>
                                <div class="movieInfoNew col-9 d-flex flex-column justify-content-center">
                                <div class="mx-3">
                                    <h5 class="fw-bolder icoSecondary">'.$name.'</h5>
                                <p class="fw-bold">'.$date.'</p>
                                <a href="index.php?page=movie&id='.$id.'" class="text-decoration-none seeMoreLink p-2"
                                    >See more</a>
                                </div>
                                </div>
                            </div>';
                }
          ?>
        </div>
      </div>
      <div class="container">
        <h3 class="fw-bold sectionHeader mt-2">Our top pick for today <span><i class="fa-solid fa-crosshairs ico"></i></span></h3>
        <div class="d-flex justify-content-between flex-wrap align-items-center">
            <?php 
            $bestMovies = getBestMovies();
            foreach($bestMovies as $bestMovie){
                $name = $bestMovie->movie_name;
                $url = $bestMovie->url;
                $alt = explode(".", $url)[0];
                $id = $bestMovie->movie_id;
                $avgGrade = $bestMovie->grade;
                $formatted_grade = number_format((float) $avgGrade, 1, '.', '');
                $categories = getMovieCategories($id);
                echo' <div class="col-lg-2 col-6 my-2 p-lg-0 p-1 movieDiv">
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
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="col-10">';
                            if(isset($_SESSION['user'])){
                              echo'<a href="models/addMovieToWwatchList.php?movieId='.$id.'&userId='.$_SESSION['user']->user_id.'" class="text-decoration-none watchlistLink p-2"><i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist</a>';
                            }
                            else{
                              echo'<a href="index.php?page=login" class="text-decoration-none watchlistLink p-2"><i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist</a>';
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
      <div class="container mt-3 mb-5">
        <h3 class="fw-bold my-3 sectionHeader">Your watchlist <span><i class="fa-solid fa-bookmark ico"></i></span></h3>
        <?php 
        if(isset($_SESSION['user'])){
          $number = 0;
          $watchlistQuery = getUserWatchlist($_SESSION['user']->user_id);
          foreach($watchlistQuery as $watchlistitem){
            $number++;
          }
          if($number==0){
            echo'<div class="container d-flex justify-content-center align-items-center flex-column mt-3 text-center">
                  <p class="icoSecondary fs-2 fw-bold bg-black p-3 rounded-3">Your watchlist is currently empty... <i class="fas fa-eye-slash"></i></p>
                </div>';
          }
          else{
            echo '<div class="d-flex justify-content-start flex-wrap align-items-center">';
            $watchlistQuery2 = getUserWatchlist($_SESSION['user']->user_id);
            foreach($watchlistQuery2 as $watchlist){
                $name = $watchlist->movie_name;
                $url = $watchlist->url;
                $alt = explode(".", $url)[0];
                $id = $watchlist->movie_id;
                echo' <div class="col-lg-2 col-8 p-lg-0 p-1 my-2 mx-2 movieDiv">
                        <a href="index.php?page=movie&id='.$id.'">
                        <img src="assets/img/movies/'.createSmallerPictureName($url).'" alt="'.$alt.'" class="img-fluid" />
                        </a>
                        <div class="p-2 movieInfo d-flex justify-content-between align-items-center">
                          <h6 class="fw-bolder ico">'.$name.'</h6>
                          <a href="models/deleteMovieFromWatchlist.php?movieId='.$watchlist->movie_id.'&userId='.$watchlist->user_id.'" class="text-decoration-none ico"><i class="fa-solid fa-circle-xmark fs-5"></i></a>
                        </div>
                    </div>';
            }
          }
          echo '</div>';
        }
        else{
          echo ' <div class="container d-flex justify-content-center align-items-center flex-column mt-3 text-center">
                  <i class="fa-solid fa-bookmark ico fs-1"></i>
                  <h5>Log in to access your watchlist</h5>
                  <p class="icoSecondary">Save shows and movies so you can always have an idea of what you want to watch.</p>
                  <a id="logIn" class="text-decoration-none p-1 rounded fw-bolder" href="index.php?page=login"><i class="fa-solid fa-right-to-bracket"></i> Log in</a>
                </div>';
        }
        ?>
      </div>
      <div class="container mb-5">
        <h3 class="fw-bold sectionHeader">Most watched movies <span><i class="fa-solid fa-eye ico"></i></span></h3>
        <div class="d-flex justify-content-between flex-wrap align-items-center">
          <?php 
          $mostWatchedMovies = getMostWatchedMovies();
          foreach($mostWatchedMovies as $mostWatchedMovie){
            $name = $mostWatchedMovie->movie_name;
                $url = $mostWatchedMovie->url;
                $alt = explode(".", $url)[0];
                $id = $mostWatchedMovie->movie_id;
                $avgGrade = $mostWatchedMovie->grade;
                $formatted_grade = number_format((float) $avgGrade, 1, '.', '');
                $categories = getMovieCategories($id);
                echo' <div class="col-lg-2 col-6 p-lg-0 p-1 my-2 movieDiv">
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
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="col-10">';
                            if(isset($_SESSION['user'])){
                              echo'<a href="models/addMovieToWwatchList.php?movieId='.$id.'&userId='.$_SESSION['user']->user_id.'" class="text-decoration-none watchlistLink p-2"><i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist</a>';
                            }
                            else{
                              echo'<a href="index.php?page=login" class="text-decoration-none watchlistLink p-2"><i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist</a>';
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
    </main>