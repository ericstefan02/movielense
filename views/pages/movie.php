<?php 
    $id = $_GET['id'];
    $movieData = getMovie($id);
    $similarMovies = getSimilarMovies($id);
    $categories = getMovieCategories($id);
    $actors = getMovieActors($id);
    $reviews = getMovieReviews($id);
    ?>
    <main>
        <div class="container d-flex justify-content-between mt-4 flex-wrap">
            <div class="col-lg-8 col-12 d-flex flex-wrap">
                <div class="col-lg-5 col-10 mx-auto">
                    <img src="assets/img/movies/<?=$movieData->url?>" class="img-fluid" alt="picture of main movie">
                </div>
                <div class="col-lg-7 col-12 p-4">
                    <h2 class="fw-bold ico"><?=$movieData->movie_name?></h2>
                    <p><?=$movieData->movie_description?></p>
                    <p class="fw-bold fs-2"><?=$formatted_grade = number_format((float) $movieData->grade, 1, '.', '')?> <i class="fa-solid fa-star icoSecondary"></i></p>
                    <p class="fw-bolder icoSecondary fs-5">Genres:</p>
                    <div class="d-flex">
                        <?php 
                        foreach($categories as $category){
                            echo '<p class="movieTerm fw-bolder me-2">'.$category->category_name.'</p>';
                        }
                        ?>
                    </div>
                    <p class="fw-bolder icoSecondary fs-5">Main actors:</p>
                    <div class="d-flex">
                        <?php 
                            foreach($actors as $actor){
                                echo '<p class="movieTerm fw-bolder me-2">'.$actor->actor_name.' '.$actor->actor_lastname.'</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center justify-content-center">
                <p class="fw-bolder fs-5">You might also like</p>
                <div class="col-10 d-flex justify-content-around mb-5 mt-3">
                    <?php
                    $bound = 2;
                    $rb = 0;
                    foreach($similarMovies as $similarMovie){
                        $rb++;
                        if($rb<=$bound){
                            echo'  <div class="col-4 similarMovie">
                                    <a href="index.php?page=movie&id='.$similarMovie->movie_id.'"><img src="assets/img/movies/'.$similarMovie->url.'" class="img-fluid" alt="movie similar to the main one"></a>
                                    </div>';
                        }
                    }
                    ?>
                </div>
                <div class="col-10 d-flex justify-content-around">
                    <?php 
                    $rb = 0;
                    foreach($similarMovies as $similarMovie){
                        $rb++;
                        if($rb>$bound){
                            echo'  <div class="col-4 similarMovie">
                                    <a href="index.php?page=movie&id='.$similarMovie->movie_id.'"><img src="assets/img/movies/'.createSmallerPictureName($similarMovie->url).'" class="img-fluid" alt="movie similar to the main one"></a>
                                    </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <h3 class="text-uppercase mb-4 mt-3">Comments and reviews</h3>
            <div class="col-12 mb-3" id="allComents">
                <?php 
                foreach($reviews as $review){
                    echo' <div class="d-flex flex-column comment mb-2">
                            <div class="d-flex">
                                <i class="fa-solid fa-user fs-4 me-1 icoSecondary"></i>
                                <p class="fw-bolder me-2">'.$review->username.'</p>
                                <p class="me-2">'.$review->date.'</p>
                                <i class="fa-solid fa-star icoSecondary"></i>
                                <p class="fw-bold">'.$review->grade.'/10</p>
                            </div>
                            <p class="fw-bolder">'.$review->text.'</p>
                        </div>';
                }
                ?>
            </div>
            <div>
                <?php 
                    if(isset($_SESSION['user'])){
                        $user = $_SESSION['user'];
                        if($user->role_name=="admin"){
                            echo'<a href="index.php?page=login" class="text-decoration-none fw-bolder"><p id="commentLogin">Admin can not write a review, log in as user instead</p></a>';
                        }
                        else{
                            $numberOfReviews = 0;
                            $reviewsOfUser = checkIfUserHasAlreadyReviewdMovie($user->user_id, $id);
                            foreach($reviewsOfUser as $reviewOfUser){
                                $numberOfReviews++;
                            }
                            if($numberOfReviews == 0){
                                echo'<div id="reviewForm">
                                <h3>Write your review</h3>
                                <form>
                                <div class="form-group">
                                    <label for="gradeOption" class="icoSecondary">Choose grade </label>
                                    <select class="form-select w-25 inputForForm" id="gradeOption" name="gradeOption">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                    <option value="5">Five</option>
                                    <option value="6">Six</option>
                                    <option value="7">Seven</option>
                                    <option value="8">Eight</option>
                                    <option value="9">Nine</option>
                                    <option value="10">Ten</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control inputForForm" id="movieId" value="'.$id.'"/>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control inputForForm" id="userId" value="'.$user->user_id.'"/>
                                </div>
                                <div class="form-group">
                                    <label for="reviewText" class="icoSecondary">Text</label>
                                    <textarea class="form-control inputForForm" id="reviewText" rows="3"></textarea>
                                </div>
                                <div class="invalid-feedback" id="reviewTextFeedback">
                                    You must write some text.
                                </div>
                                </form>
                        </div>
                    </div>';
                        echo'<a href="" class="text-decoration-none fw-bolder"><p id="commentLoginButton" class="mt-3 fs-5">Send your review</p></a>';
                            }
                            else{
                                echo'<p class="icoSecondary">Sorry, but you have already written review for this movie.</p>';
                            }
                        }
                    }
                    else{
                        echo '<a href="index.php?page=login" class="text-decoration-none fw-bolder"><p id="commentLogin">Log in to leave a comment</p></a>';
                    }
                ?>
        </div>
    </main>