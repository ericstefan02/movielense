 <main>
      <?php 
      if($_SESSION['user']->role_name=="admin"){

        $id = $_GET['id'];
        $thisMovie = getAllWithId("movie", "movie_id", $id);
        $thisMovieCategories = getThisMovieCategories($id);
        $thisMovieActors = getThisMovieActors($id);
        foreach($thisMovie as $movie){
            $title = $movie->movie_name;
            $description = $movie->movie_description;
            $date = $movie->date;
            $formatedDate = explode(" ",$movie->date)[0];
            $pictureId= $movie->picture_id;
        }
        $allPictures = getAll("movies_pictures");
        $allActors = getAll("actor");
        $allCategories = getAll("category");
        echo'<div class="container mt-5">
        <h2>Movie update</h2>
        <form class="w-75">
        <div class="form-group mt-5">
        <label for="pictureUrl">Choose picture</label>
        <select class="form-control inputForForm" id="pictureUrl">';
        foreach($allPictures as $picture){
            $selected = $picture->picture_id==$pictureId?'selected="selected"':'';
            echo'<option value="'.$picture->picture_id.'" '.$selected.'>'.$picture->url.'</option>';
        }
            echo'</select>
        </div>
        <div class="form-group mt-5">
            <label for="movieTitle">Movie title</label>
            <input type="text" class="form-control inputForForm" id="movieTitle" value="'.$title.'"/>
        </div>
        <div class="invalid-feedback" id="invalidTitle">
            You must enter text including only letters, numbers and spaces, not logner than 40 characters.
        </div>    
        <div class="form-group mt-5 w-75">
            <label for="movieDate">Date of release</label>
            <input type="date" class="form-control inputForForm" id="movieDate" value="'.$formatedDate.'"/>
        </div>
        <div class="invalid-feedback" id="invalidDate">
                You must pick a date.
            </div>  
        <div class="form-group mt-5">
            <label for="movieDescription">Movie description</label>
            <textarea class="form-control inputForForm" id="movieDescription" rows="3">'.$description.'</textarea>
        </div>
        <div class="invalid-feedback" id="invalidDescription">
                You must write some description.
            </div>
        <h4 class="mt-3">Choose categories</h4>
        <div class="d-flex">';
        $thisMovieCategoriesArray = $thisMovieCategories->fetchAll(PDO::FETCH_ASSOC);

        foreach ($allCategories as $category) {
            $isChecked = in_array($category->category_id, array_column($thisMovieCategoriesArray, 'category_id'));
            $checkedAttribute = $isChecked ? 'checked' : '';
    
            echo '<input class="form-check-input inputForForm me-1" type="checkbox" name="movieCategories[]" value="'.$category->category_id.'" '.$checkedAttribute.'>
                    <label class="form-check-label me-3">
                    '.$category->category_name.'
                    </label>';
}

        echo'
        </div>
        <div class="invalid-feedback" id="invalidCategory">
                You must chose atleast one category.
            </div>
        <h4 class="mt-3">Choose actors</h4>
        <div class="d-flex flex-wrap">';
        $thisMovieActorsArray = $thisMovieActors->fetchAll(PDO::FETCH_ASSOC);

        foreach ($allActors as $actor) {
            $isChecked = in_array($actor->actor_id, array_column($thisMovieActorsArray, 'actor_id'));
            $checkedAttribute = $isChecked ? 'checked' : '';
    
            echo '<input class="form-check-input inputForForm me-1" type="checkbox" name="movieActors[]" value="'.$actor->actor_id.'" '.$checkedAttribute.'>
                    <label class="form-check-label me-3">
                    '.$actor->actor_name.' '.$actor->actor_lastname.'
                    </label>';
        }
        echo'
        </div>
        <div class="invalid-feedback" id="invalidActor">
                You must choose atleast one actor.
            </div>  
        <input type ="hidden" value="'.$id.'" id="movieId"/>
        <input type="button" class="btn insertButton rounded mt-5 mb-5"id="movieUpdate" value="Update movie"/>
      </form>';
    }
      else{
        echo '<div class="alert alert-danger text-center my-5 w-50 mx-auto">
                <h1>You are not allowed to enter this page!</h1>
                </div>';
      }
      ?>
    </main>