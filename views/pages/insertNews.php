<main>
      <?php 
      if($_SESSION['user']->role_name=="admin"){

        $allPictures = getAll("news_pictures");
        echo '<div class="container mt-5"><h2>News picture insert</h2></div>';
        echo '<div class = "container">';
        echo '<form class ="w-75" enctype="multipart/form-data">
        <div class="form-group mt-5">
        <label for="newPictureUrl">Url text</label>
        <input type ="file" class="form-control inputForForm" id="newPictureUrl"/>
            </div>  
            <div class="invalid-feedback" id="invalidPictureUrl">
                You must enter valid picture url.
            </div>
            <input type="button" class="btn insertButton rounded mt-5 mb-5"id="newsPictureInsert" value="Insert new picture"/>
        </form>';  
        echo '<form class="w-75">
        <div class="form-group mt-5">
        <h2>News insert</h2>
        <label for="pictureUrl">Choose picture</label>
        <select class="form-control inputForForm" id="pictureUrl">';
        foreach($allPictures as $picture){
            echo'<option value="'.$picture->picture_id.'">'.$picture->url.'</option>';
        }
        echo'</select>
        </div>
        <div class="form-group mt-5">
            <label for="newsTitle">News title</label>
            <textarea class="form-control inputForForm" id="newsTitle" rows="2"></textarea>
        </div>  
        <div class="invalid-feedback" id="invalidTitle">
            You must enter text, starting with capital, ending with dot, not larger than 30 characters.
        </div>
        <input type="button" class="btn insertButton rounded mt-5 mb-5"id="newsInsert" value="Insert news"/>
      </form>';

        
      }
      else{
        echo '<div class="alert alert-danger text-center my-5 w-50 mx-auto">
                <h1>You are not allowed to enter this page!</h1>
                </div>';
      }
      ?>
    </main>