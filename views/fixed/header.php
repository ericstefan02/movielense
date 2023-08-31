
<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
      <div class="container">
        <div id="logoDiv">
          <a class="navbar-brand" href="index.php">
            <img
              src="assets/img/MovieLense-1.png"
              class="img-fluid"
              alt="website logo"
            />
          </a>
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php 
            $headerLinks = getHeaderLinks();
            foreach($headerLinks as $headerLink){
              if(isset($_SESSION['user'])){
               if($headerLink->item_url!="index.php?page=login" && $headerLink->item_url!="index.php?page=register"){
                  echo'  <li class="nav-item mx-2 fw-bolder">
                            <a class="nav-link" href="'.$headerLink->item_url.'"><i class="'.$headerLink->item_ico.'"></i> '.$headerLink->item_text.'</a>
                          </li>';
               }
              }
              else{
                echo'  <li class="nav-item mx-2 fw-bolder">
                      <a class="nav-link" href="'.$headerLink->item_url.'"><i class="'.$headerLink->item_ico.'"></i> '.$headerLink->item_text.'</a>
                    </li>';
              if($headerLink->item_url=="index.php?page=login"){
                echo' <li class="nav-item mx-2">
                        <i class="fa-solid fa-grip-lines-vertical icoSecondary" id="vertical"></i>
                      </li>';
              }
              }
            }
            if(isset($_SESSION['user'])){
              if($_SESSION['user']->role_name=="admin"){
                echo '<li class="nav-item mx-2 fw-bolder">
                        <a class="nav-link" href="index.php?page=panel"><i class="fa-solid fa-pen-to-square ico"></i> Admin panel</a>
                      </li>';
                      
              }
              echo '<li class="nav-item mx-2 fw-bolder">
                      <a class="nav-link" href="models/logout.php"><i class="fa-solid fa-right-from-bracket ico"></i> Log out</a>
                    </li>';
            }
            ?>
          </ul>
          <div class="navbar-text d-flex justify-content-center align-items-center">
            <form class="d-flex">
              <div class="input-group">
                <input
                  class="form-control inputForForm"
                  id="search"
                  type="search"
                  placeholder="Search for movies..."
                  aria-label="Search"
                />
                <span class="input-group-text">
                  <a><i class="fa-solid fa-search search-icon ico"></i></a>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
</nav>
<div class="mx-auto col-lg-4 col-md-7 col-10 d-none" id="searchedMovieInfo">
  <div class="d-flex justify-content-between"> 
    <div class="col-2">
            <img src="assets/img/movies/batmanbegins.jpg" class="img-fluid" alt="">
    </div>
    <div class="d-flex mx-auto align-items-center fs-5 fw-bold">
      <p>This is movie title ( year )</p>
    </div>
  </div>
</div>