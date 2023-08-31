<main>
      <?php 
      if($_SESSION['user']->role_name=="admin"){
        $id = $_GET['id'];
        $allPictures = getAll("news_pictures");
        $thisNews = getAllWithId("news", "news_id", $id);
        foreach($thisNews as $thisNew){
            $title = $thisNew->news_title;
            $picture_id = $thisNew->picture_id;
        }
        echo '<div class="container"><form class="w-75">
        <div class="form-group mt-5">
        <h2>News update</h2>
        <label for="pictureUrl">Choose picture</label>
        <select class="form-control inputForForm" id="pictureUrl">';
        foreach($allPictures as $picture){
            $selected = ($picture->picture_id==$picture_id)?'selected="selected"':'';
            echo'<option value="'.$picture->picture_id.'" '.$selected.'>'.$picture->url.'</option>';
        }
        echo'</select>
        </div>
        <div class="form-group mt-5">
            <label for="newsTitle">News title</label>
            <textarea class="form-control inputForForm" id="newsTitle" rows="2">'.$title.'</textarea>
        </div>  
        <div class="invalid-feedback" id="invalidTitle">
            You must enter text, starting with capital, ending with dot, not larger than 30 characters.
        </div>
        <input type="hidden" id="newsId" value="'.$id.'"/>
        <input type="button" class="btn insertButton rounded mt-5 mb-5"id="updateNews" value="Update news"/>
      </form>';

        
      }
      else{
        echo '<div class="alert alert-danger text-center my-5 w-50 mx-auto">
                <h1>You are not allowed to enter this page!</h1>
                </div>';
      }
      ?>
    </main>