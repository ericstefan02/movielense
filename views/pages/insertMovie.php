     <main>
      <?php 
      if($_SESSION['user']->role_name=="admin"){

        $allMovies = getAll("movie");
        $allPictures = getAll("movies_pictures");
        $allActors = getAll("actor");
        $allCategories = getAll("category");
        echo '<div class="container mt-5"><h2>Movie picture insert</h2></div>';
        echo '<div class = "container">';
        echo '<form class ="w-75" enctype="multipart/form-data">
        <div class="form-group mt-5">
        <label for="newPictureUrl">Url text</label>
        <input type ="file" class="form-control inputForForm" id="newPictureUrl"/>
            </div>  
            <div class="invalid-feedback" id="invalidPictureUrl">
                You must enter valid picture url.
            </div>
            <input type="button" class="btn insertButton rounded mt-5 mb-5"id="moviePictureInsert" value="Insert new picture"/>
        </form>
        </div>'
        ;
        echo '<div class="container mt-5"><h2>New category insert</h2></div>';
        echo '<div class = "container">';
        echo '<form class ="w-75">
        <div class="form-group mt-5">
        <label for="newCategoryName">Category name</label>
        <input type ="text" class="form-control inputForForm" id="newCategoryName"/>
            </div>  
            <div class="invalid-feedback" id="invalidCategoryName">
                You must enter valid category name, starting with capital not longer than 40 chars.
            </div>
            <input type="button" class="btn insertButton rounded mt-5 mb-5"id="insertMovieCategory" value="Insert new category"/>
        </form>
        </div>';
        echo '<div class="container mt-5"><h2>Insert new actor</h2></div>';
        echo '<div class = "container">';
        echo '<form class ="w-75">
                <div class="form-group mt-5">
                <label for="newActorName">Actor name</label>
                <input type ="text" class="form-control inputForForm" id="newActorName"/>
                </div>  
                <div class="invalid-feedback" id="invalidActorName">
                    You must enter valid first name.
                </div>
                <div class = "form-group mt-5">
                <label for="newActorLastName">Actor last name</label>
                    <input type ="text" class="form-control inputForForm" id="newActorLastName"/>
                </div>  
            <div class="invalid-feedback" id="invalidActorLastName">
                You must enter valid last name.
            </div>
            <input type="button" class="btn insertButton rounded mt-5 mb-5"id="actorInsert" value="Insert new actor"/>
        </form>';       
        echo '
        <h2>Movie insert</h2>
        <form class="w-75">
        <div class="form-group mt-5">
        <label for="pictureUrl">Choose picture</label>
        <select class="form-control inputForForm" id="pictureUrl">';
        foreach($allPictures as $picture){
            echo'<option value="'.$picture->picture_id.'">'.$picture->url.'</option>';
        }
        echo '</div>';
        echo'</select>
        </div>
        <div class="form-group mt-5">
            <label for="movieTitle">Movie title</label>
            <input type="text" class="form-control inputForForm" id="movieTitle"/>
        </div>
        <div class="invalid-feedback" id="invalidTitle">
            You must enter text including only letters, numbers and spaces, not logner than 40 characters.
        </div>    
        <div class="form-group mt-5 w-75">
            <label for="movieDate">Date of release</label>
            <input type="date" class="form-control inputForForm" id="movieDate"/>
        </div>
        <div class="invalid-feedback" id="invalidDate">
                You must pick a date.
            </div>  
        <div class="form-group mt-5">
            <label for="movieDescription">Movie description</label>
            <textarea class="form-control inputForForm" id="movieDescription" rows="3"></textarea>
        </div>
        <div class="invalid-feedback" id="invalidDescription">
                You must write some description.
            </div>
        <h4 class="mt-3">Choose categories</h4>
        <div class="d-flex">';
        foreach($allCategories as $category){
            echo '<input class="form-check-input inputForForm me-1" type="checkbox" name="movieCategories[]" value="'.$category->category_id.'">
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
        foreach($allActors as $actor){
            echo '<div class="w-25">
                    <input class="form-check-input inputForForm me-1" type="checkbox" name="movieActors[]" value="'.$actor->actor_id.'">
                    <label class="form-check-label me-3">
                    '.$actor->actor_name.' '.$actor->actor_lastname.'
                    </label></div>';
        }
        echo'
        </div>
        <div class="invalid-feedback" id="invalidActor">
                You must choose atleast one actor.
            </div>  
        <input type="button" class="btn insertButton rounded mt-5 mb-5"id="movieInsert" value="Insert movie"/>
      </form>';

        
      }
      else{
        echo '<div class="alert alert-danger text-center my-5 w-50 mx-auto">
                <h1>You are not allowed to enter this page!</h1>
                </div>';
      }
      ?>
    </main>