function checkWindowWidth() {
  var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

  if (windowWidth < 768) {
  
  try{
  var links = document.getElementsByClassName("watchlistLink");
  for(var i = 0;i<links.length;i++){
    links[i].innerHTML = `<i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add it`
  }}
  catch{

  }
  }
  else{
    try{
      var links = document.getElementsByClassName("watchlistLink");
      for(var i = 0;i<links.length;i++){
        links[i].innerHTML = `<i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist`
      }}
      catch{
    
      }
  }
}

window.addEventListener('resize', checkWindowWidth);

checkWindowWidth();
function checker(regex, id, messageId) {
  if (!regex.test(document.getElementById(id).value)) {
    document.getElementById(messageId).classList.add("d-block");
    return false;
  } else {
    document.getElementById(messageId).classList.remove("d-block");
    return true;
  }
}
function showSearchedMovies(){
  var navHeight = document.getElementById("navbar").offsetHeight;
  document.getElementById("searchedMovieInfo").style.top = navHeight;  
  var movieText = $("#search").val();
  textToFilterBy = movieText.trim().toLowerCase();
  if(textToFilterBy == ""){
    $("#searchedMovieInfo").addClass("d-none")
  }
  else{
    var textData = {
      textFilter:textToFilterBy,
    }
    $.ajax({
      url: "models/get_filtered_movies_data.php",
      method: "POST",
      data: textData,
      success: function(movies) {
        console.log("Data to filter by sent successfully");
        var cnt = "";
        if(!movies){
          cnt = `<p>There are no movies matching your parameters...`;
        }
        else{
          movies.forEach(movie => {
            var url = movie.url
            var name = url.split(".")[0];
            var ext = url.split(".")[1];
            cnt +=`<div class="d-flex justify-content-between"> 
                    <div class="col-2">
                            <a href="index.php?page=movie&id=${movie.movie_id}"><img src="assets/img/movies/${name+"cropped."+ext}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="d-flex mx-auto align-items-center fs-5 fw-bold">
                      <p>${movie.movie_name}</p>
                    </div>
                  </div>`
            
          });
          document.getElementById("searchedMovieInfo").innerHTML = cnt;
          document.getElementById("searchedMovieInfo").classList.remove("d-none")
        }
      },
      error: function(xhr, status, error) {
        console.log("Error sending data to filter by to server: " + error);
      }
    });
  }  
}
$("#search").keyup(showSearchedMovies);
if(window.location.href.includes("main") || window.location.pathname == "/" || !window.location.href.includes("page")){
    $.ajax({
        url: "models/get_news_data.php",
        dataType: "json",
        success: function (news) {
          var sliderIndex = 0;
          changeSlider();
          var intervalId = setInterval(changeSlider, 5000);
          function changeSlider() {
            var sliderDirection = "right";
            var newsItem = news[sliderIndex];
            var newsCover = document.getElementById("newsCover");
            var sliderText = document.getElementById("sliderText");
            newsCover.classList.add("slider-transition");
              sliderText.classList.add("slider-transition");
            newsCover.src = "assets/img/news/" + newsItem.url;
            sliderText.innerText = newsItem.news_title;
            setTimeout(function() {
              newsCover.classList.remove("slider-transition");
              sliderText.classList.remove("slider-transition");
            }, 500);
            if (sliderDirection === "right") {
              sliderIndex++;
              if (sliderIndex >= news.length) {
                sliderIndex = 0;
              }
            } else if (sliderDirection === "left") {
              sliderIndex--;
              if (sliderIndex < 0) {
                sliderIndex = news.length - 1;
              }
            }
          }
          var slideLeft = document.getElementById("slideLeft");
          slideLeft.addEventListener("click", function () {
            clearInterval(intervalId);
            sliderDirection = "left";
            changeSlider();
            intervalId = setInterval(changeSlider, 5000);
          });
      
          var slideRight = document.getElementById("slideRight");
          slideRight.addEventListener("click", function () {
            clearInterval(intervalId);
            sliderDirection = "right";
            changeSlider();
            intervalId = setInterval(changeSlider, 5000);
          });
        },
        error: function(xhr, status, error) {
            console.log("Error retrieving news: " + error);
          }
      });
}
if(window.location.href.includes("register")){
    $.ajax({
        url:"models/get_users_data.php",
        dataType:"json",
        success: function(data){
            localStorage.setItem("users", JSON.stringify(data));
            allUsers = data;
        },
        error: function(xhr, status, error) {
            console.log("Error retrieving users: " + error);
          }
    });
    var allUsers = JSON.parse(localStorage.getItem(("users")));
    localStorage.removeItem("users");
    var emailReg = /^[\w\.]+@[a-zA-Z_]+?(\.[a-zA-Z]{2,3})+$/;
    var passReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    var usernameReg = /^[a-zA-Z]{3}[a-zA-Z0-9_]{0,17}$/;

    $("#submitButton").click(checkRegistrationForm);

    function checkRegistrationForm(){
        var err = 0;

        if(!checker(emailReg, "regInputEmail", "invalidEmail")){
            err++;
        };
        if(!checker(usernameReg, "regInputUsername", "invalidUsername")){
            err++;
        }
        else{
            var taken = 0;
            allUsers.forEach(user => {
                if(user.username.toString()==document.getElementById("regInputUsername").value){
                    document.getElementById("takenUsername").classList.add("d-block");
                    taken++;
                    err++;  
                }
            });
            if(taken == 0){
                document.getElementById("takenUsername").classList.remove("d-block");
            }
        }
        if(!checker(passReg, "regInputPassword", "invalidPassword")){
            err++;
        };
        if(document.getElementById("regInputPassword").value!=document.getElementById("regInputRenter").value){
            document.getElementById("invalidRenter").classList.add("d-block");
            err++;
        }
        else{
            document.getElementById("invalidRenter").classList.remove("d-block");
        }
        if(err==0){
            var newUserData = {
                username: document.getElementById("regInputUsername").value,
                email: document.getElementById("regInputEmail").value,
                password: document.getElementById("regInputPassword").value
              };
              $.ajax({
                url: "models/registrationProcess.php",
                method: "POST",
                data: newUserData,
                success: function(response) {
                  console.log("User register sent successfully");
                  console.log("Response from server: " + response);
                  window.location.href = "index.php?page=login";
                },
                error: function(xhr, status, error) {
                  console.log("Error sending user data to server: " + error);
                }
              });
        }
    }

}
if(window.location.href.includes("page=movie&id")){
  function checkReview(e){
    e.preventDefault();
    var err = 0;
    var movieId = document.getElementById("movieId").value;
    var userId = document.getElementById("userId").value;
    var grade = document.getElementById("gradeOption").value;
    var text = document.getElementById("reviewText").value;
    
    if(text == ""){
      err++;
      document.getElementById("reviewTextFeedback").classList.add("d-block");   
    }
    else{
      document.getElementById("reviewTextFeedback").classList.remove("d-block");   
    }
    if(err==0){
      var reviewData = {
        movie_id:movieId,
        user_id:userId,
        gradeOfMovie:grade,
        textOfReview:text
      }
  
      $.ajax({
        url: "models/reviewProcess.php",
        method: "POST",
        data: reviewData,
        success: function(response) {
          console.log("Review data sent successfully");
          var cnt = "";
          var reviews = response;
          reviews.forEach(review => {
            cnt += `<div class="d-flex flex-column comment mb-2">
                      <div class="d-flex">
                          <i class="fa-solid fa-user fs-4 me-1 icoSecondary"></i>
                          <p class="fw-bolder me-2">${review.username}</p>
                          <p class="me-2">${review.date}</p>
                          <i class="fa-solid fa-star icoSecondary"></i>
                          <p class="fw-bold">${review.grade}/10</p>
                      </div>
                      <p class="fw-bolder">${review.text}</p>
                  </div>`;
          });
          document.querySelector("#allComents").innerHTML = cnt;
          document.querySelector("#reviewForm").innerHTML = `<p class="icoSecondary">Thanks for writing your review!</p>`;
          $("#commentLoginButton").addClass("d-none");
        },
        error: function(xhr, status, error) {
          console.log("Error sending review data to server: " + error);
        }
      });
    }
  }
  $("#commentLoginButton").click(checkReview);
}
if(window.location.href.includes("insertMovie")){
  function checkMoviePicture(e){
    e.preventDefault();
    var err = 0;
    var newPictureUrl = document.getElementById("newPictureUrl").files[0];
    if(newPictureUrl){
      var mimeType = newPictureUrl.type;
      if(!mimeType.startsWith("image/")){
        err++;
        $("#invalidPictureUrl").addClass("d-block");
      }
      else{
        $("#invalidPictureUrl").removeClass("d-block");
      }
    }
    else{
      $("#invalidPictureUrl").addClass("d-block");
      err ++;
    }
    if(err == 0){
      var formData = new FormData();
      formData.append("image", newPictureUrl);
      $.ajax({
        url: "models/insertMoviePictureProcess.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          console.log("Picture data sent successfully");
          console.log("Response from server: " + response);
          window.location.href = 'index.php?page=insertMovie';
        },
        error: function(xhr, status, error) {
          console.log("Error sending picture data to server: " + error);
        }
      })
    }
  }
  $("#moviePictureInsert").click(checkMoviePicture);
  function checkCategoryData(e){
    var categoryName = $("#newCategoryName").val();
    e.preventDefault();
    var categoryReg = /^(?=[A-Z]).{1,40}$/;
    var err=0;
    if(!checker(categoryReg, "newCategoryName", "invalidCategoryName")){
      err++;
    }
    if(err==0){
      var categoryData = {
        name:categoryName
      }
      $.ajax({
        url: "models/insertNewCategoryProcess.php",
        method: "POST",
        data: categoryData,
        success: function(response) {
          console.log("Category data sent successfully");
          console.log("Response from server: " + response);
          window.location.href = 'index.php?page=insertMovie';
        },
        error: function(xhr, status, error) {
          console.log("Error sending category data to server: " + error);
        }
      })
    }
  }
  $("#insertMovieCategory").click(checkCategoryData);
  function checkActorData(e){
    e.preventDefault();
    var err = 0;
    var actorName = $("#newActorName").val();
    var actorLastName = $("#newActorLastName").val();
    var nameAndLastNameReg = /^([A-ZČĆŠŽĐ][a-zčćšžđ]+)\s*([A-ZČĆŠŽĐ][a-zčćšžđ]+(\s)*)*$/;
    if(!checker(nameAndLastNameReg, "newActorName", "invalidActorName")){
      err++;
    }
    if(!checker(nameAndLastNameReg, "newActorLastName", "invalidActorLastName")){
      err++;
    }
    if(err==0){
      var actorData = {
        firstName:actorName,
        lastName:actorLastName
      }
      $.ajax({
        url: "models/insertNewActorProcess.php",
        method: "POST",
        data: actorData,
        success: function(response) {
          console.log("Actor data sent successfully");
          console.log("Response from server: " + response);
          window.location.href = 'index.php?page=insertMovie';
        },
        error: function(xhr, status, error) {
          console.log("Error sending actor data to server: " + error);
        }
      })
    }
  }
  $("#actorInsert").click(checkActorData);
  function checkMovieData(e){
    e.preventDefault();
    var err = 0;
    var pictureId = $("#pictureUrl").val();
    var movieTitle = $("#movieTitle").val();
    var date = $("#movieDate").val();
    var movieDescription = $("#movieDescription").val();
    var checkedCategories = [];
    document.querySelectorAll('input[name="movieCategories[]"]:checked').forEach(function(cc) {
    checkedCategories.push(cc.value);
    });
    var checkedActors = [];
    document.querySelectorAll('input[name="movieActors[]"]:checked').forEach(function(ca) {
    checkedActors.push(ca.value);
    });
    var movieTitleReg = /^[A-Z][A-Za-z0-9 .]{0,38}[A-Za-z0-9]$/;
    if(!checker(movieTitleReg, "movieTitle", "invalidTitle")){
      err ++;
    }
    if(date==""){
      err++;
      $("#invalidDate").addClass("d-block");
    }
    else{
      $("#invalidDate").removeClass("d-block");
    }
    if(movieDescription==""){
      err++;
      $("#invalidDescription").addClass("d-block");
    }
    else{
      $("#invalidDescription").removeClass("d-block");
    }
    if(checkedCategories.length==0){
      err++;
      $("#invalidCategory").addClass("d-block");
    }
    else{
      $("#invalidCategory").removeClass("d-block");
    }
    if(checkedActors.length==0){
      err++;
      $("#invalidActor").addClass("d-block");
    }
    else{
      $("#invalidActor").removeClass("d-block");
    }
    if(err==0){
      var movieData = {
        picture_Id:pictureId,
        movie_title:movieTitle,
        movie_date:date,
        movie_description:movieDescription,
        movie_categories:checkedCategories,
        movie_actors:checkedActors
      }
      $.ajax({
        url: "models/insertMovieProcess.php",
        method: "POST",
        data: movieData,
        success: function(response) {
          console.log("Movie data sent successfully");
          console.log("Response from server: " + response);
          window.location.href = 'index.php?page=moviesEdit';
        },
        error: function(xhr, status, error) {
          console.log("Error sending movie data to server: " + error);
        }
      })
    }
    
  }
  $("#movieInsert").click(checkMovieData);
}
if(window.location.href.includes("updateMovie")){
  function checkUpdateMovieData(e){
    e.preventDefault();
    var id = $("#movieId").val();
    var err = 0;
    var pictureId = $("#pictureUrl").val();
    var movieTitle = $("#movieTitle").val();
    var date = $("#movieDate").val();
    var movieDescription = $("#movieDescription").val();
    var checkedCategories = [];
    document.querySelectorAll('input[name="movieCategories[]"]:checked').forEach(function(cc) {
    checkedCategories.push(cc.value);
    });
    var checkedActors = [];
    document.querySelectorAll('input[name="movieActors[]"]:checked').forEach(function(ca) {
    checkedActors.push(ca.value);
    });
    var movieTitleReg = /^[A-Z][A-Za-z0-9 .]{0,38}[A-Za-z0-9]$/;
    if(!checker(movieTitleReg, "movieTitle", "invalidTitle")){
      err ++;
    }
    if(date==""){
      err++;
      $("#invalidDate").addClass("d-block");
    }
    else{
      $("#invalidDate").removeClass("d-block");
    }
    if(movieDescription==""){
      err++;
      $("#invalidDescription").addClass("d-block");
    }
    else{
      $("#invalidDescription").removeClass("d-block");
    }
    if(checkedCategories.length==0){
      err++;
      $("#invalidCategory").addClass("d-block");
    }
    else{
      $("#invalidCategory").removeClass("d-block");
    }
    if(checkedActors.length==0){
      err++;
      $("#invalidActor").addClass("d-block");
    }
    else{
      $("#invalidActor").removeClass("d-block");
    }
    if(err==0){
      var movieData = {
        picture_Id:pictureId,
        movie_id:id,
        movie_title:movieTitle,
        movie_date:date,
        movie_description:movieDescription,
        movie_categories:checkedCategories,
        movie_actors:checkedActors
      }
      $.ajax({
        url: "models/updateMovieProcess.php",
        method: "POST",
        data: movieData,
        success: function(response) {
          console.log("Movie data sent successfully");
          console.log("Response from server: " + response);
          window.location.href = 'index.php?page=moviesEdit';
        },
        error: function(xhr, status, error) {
          console.log("Error sending movie data to server: " + error);
        }
      })
    }
    
  }
  $("#movieUpdate").click(checkUpdateMovieData);
}
if(window.location.href.includes("insertNews")){
  function checkNewsPicture(e){
    e.preventDefault();
    var err = 0;
    var newPictureUrl = document.getElementById("newPictureUrl").files[0];
    if(newPictureUrl){
      var mimeType = newPictureUrl.type;
      if(!mimeType.startsWith("image/")){
        err++;
        $("#invalidPictureUrl").addClass("d-block");
      }
      else{
        $("#invalidPictureUrl").removeClass("d-block");
      }
    }
    else{
      $("#invalidPictureUrl").addClass("d-block");
      err ++;
    }
    if(err == 0){
      var formData = new FormData();
      formData.append("image", newPictureUrl);
      $.ajax({
        url: "models/insertNewsPictureProcess.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          console.log("Picture data sent successfully");
          console.log("Response from server: " + response);
          window.location.href = 'index.php?page=insertNews';
        },
        error: function(xhr, status, error) {
          console.log("Error sending picture data to server: " + error);
        }
      })
    }
  }
  $("#newsPictureInsert").click(checkNewsPicture);
  function checkNewsData(e){
    e.preventDefault();
    var err = 0;
    var titleReg = /^[A-Z][A-Za-z0-9 ]{0,50}[A-Za-z0-9]\.$/;
    var title = document.getElementById("newsTitle").value;
    var pictureId = document.getElementById("pictureUrl").value;
    if(!checker(titleReg, "newsTitle", "invalidTitle")){
      err++;
    }
    if(err == 0){
      var newsData = {
        picture_id:pictureId,
        news_title:title
      }
      $.ajax({
        url: "models/insertNewsProcess.php",
        method: "POST",
        data: newsData,
        success: function(response) {
          console.log("News data sent successfully");
          console.log("Response from server: " + response);
          window.location.href = 'index.php?page=newsEdit';
        },
        error: function(xhr, status, error) {
          console.log("Error sending news data to server: " + error);
        }
      })
    }
  }
  $("#newsInsert").click(checkNewsData);
}
if(window.location.href.includes("updateNews")){
  function checkUpdatedNewsData(e){
    e.preventDefault();
    var err = 0;
    var titleReg = /^[A-Z][A-Za-z0-9: ]{0,50}[A-Za-z0-9]\.$/;
    var title = document.getElementById("newsTitle").value;
    var pictureId = document.getElementById("pictureUrl").value;
    var newsId = document.getElementById("newsId").value;
    if(!checker(titleReg, "newsTitle", "invalidTitle")){
      err++;
    }
    if(err == 0){
      var newsData = {
        id:newsId,
        picture_id:pictureId,
        news_title:title
      }
      $.ajax({
        url: "models/updateNewsProcess.php",
        method: "POST",
        data: newsData,
        success: function(response) {
          console.log("News data sent successfully");
          console.log("Response from server: " + response);
          window.location.href = 'index.php?page=newsEdit';
        },
        error: function(xhr, status, error) {
          console.log("Error sending news data to server: " + error);
        }
      })
    }
  }
  $("#updateNews").click(checkUpdatedNewsData);
}
if(window.location.href.includes("movies")){
  localStorage.removeItem("checkedCategories");
  localStorage.removeItem("limit");
  localStorage.removeItem("sort");

  function getCheckedCategories(){
    var checked = [];
    $('input[name="categories[]"]').each(function(){
      if($(this).is(':checked')){
        checked.push($(this).val());
      }
    });
    var dataToSend = {
      categories:checked
    }
    localStorage.setItem("checkedCategories", checked);
    localStorage.setItem("limit", 0);
    $.ajax({
      url: "models/get_number_of_movies.php",
      method: "POST",
      data:dataToSend,
      success: function(response){
        var numberOfMovies = response.num;
        var numberOfPages = Math.ceil(numberOfMovies/10);
        var cnt = "";
        for(var i = 0;i<numberOfPages;i++){
          cnt+=`<a href="#" class="text-decoration-none movie-pagination ${(i==0?"active":"")}" data-limit="${i}"><p class="me-2 paginationLink fw-bold">${i+1}</p></a>`
        }
        document.querySelector("#paginationMenu").innerHTML = cnt;
        $(".movie-pagination").click(getLimit);
      },
      error: function(xhr, status, error){
        console.log("Error retriving number of movies: ", + error);
      }
    })
    sendData();
  }
  var categoryCheckBoxes = $('input[name="categories[]"]');
  for(var i = 0;i<categoryCheckBoxes.length;i++){
    categoryCheckBoxes[i].addEventListener("change", getCheckedCategories);
  }
  function getLimit(e){
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
    var limit = $(this).data('limit');
    localStorage.setItem("limit", limit);
    var links = document.getElementsByClassName("movie-pagination");
    for(var i = 0;i<links.length;i++){
      links[i].classList.remove("active");
    }
    $(this).addClass('active');
    sendData();
  }
  $(".movie-pagination").click(getLimit);
  function sortOrderChanged(){
    var sortValue = $("#sort").val();
    localStorage.setItem("sort", sortValue);
    sendData();
  }
  $("#sort").change(sortOrderChanged);
  function sendData(){
    var limit = localStorage.getItem('limit');
    var categories = localStorage.getItem('checkedCategories');
    var sortOdrer = localStorage.getItem("sort");
    if(limit===undefined){
      limit = 0;
    }
    if(categories===undefined){
      categories = [];
    }
    if(sortOdrer===undefined){
      sortOdrer = 1;
    }
    var dataToFIlterBy = {
      limit:limit, 
      categories:categories,
      sortOrder:sortOdrer
    }
    $.ajax({
      url: "models/pagination.php",
      method: "POST",
      data: dataToFIlterBy,
      success: function(allData) {
        console.log("Limit data sent successfully");
        var user = allData.user;
        var allMovies = allData.movies;
        var numberOfMovies = allData.number.num;
        var numberOfPages = Math.ceil(numberOfMovies/10);
        var promises = []; // Array to store promises
        var cnt = "";
  
        // Loop through allMovies using a for...of loop
        for (const movie of allMovies) {
          const name = movie.movie_name;
          const url = movie.url;
          const alt = url.split(".")[0];
          const newUrl = alt+"cropped."+url.split(".")[1];
          const id = movie.movie_id;
          const avgGrade = movie.grade;
          const formatted_grade = parseFloat(avgGrade).toFixed(1);
          let cnt = `<div class="col-lg-2 col-6 p-lg-0 p-1 mb-2 me-md-4 me-0">
                      <a href="index.php?page=movie&id=${id}">
                        <img src="assets/img/movies/${newUrl}" alt="${alt}" class="img-fluid" />
                      </a>
                      <div class="p-2 movieInfo">
                        <i class="fa-solid fa-star ico"></i> ${formatted_grade}
                        <h6 class="fw-bolder">${name}</h6>
                        <p>`;
          let rb = 0;
  
          // Call getMovieCategories asynchronously using a Promise
          const getCategoriesPromise = new Promise((resolve, reject) => {
            getMovieCategories(movie.movie_id, function(movieCategories) {
              movieCategories.forEach(category => {
                rb++;
                cnt += `${category.category_name}`;
                if (rb != movieCategories.length) {
                  cnt += ", ";
                }
              });
              cnt += '</p>'
              cnt += `<div class="d-flex justify-content-between">
                          <div class="col-10">`;
              if (user != "") {
                cnt += `<a href="models/addMovieToWwatchList.php?movieId=${id}&userId=${user}" class="text-decoration-none watchlistLink p-2"><i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist</a>`;
              } else {
                cnt += `<a href="index.php?page=login" class="text-decoration-none watchlistLink p-2"><i class="fa-solid fa-bookmark fs-5 mx-1 icoSecondary"></i> Add to watchlist</a>`;
              }
              cnt += `</div>
                          <div class="mb-1"> 
                            <a href="index.php?page=movie&id=${id}" class="info"><i class="fa-solid fa-circle-info info fs-4 icoSecondary"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>`;
              resolve(cnt);
            });
          });
  
          // Store the Promise in the array
          promises.push(getCategoriesPromise);
        }
        // Wait for all promises to resolve using Promise.all
        Promise.all(promises)
          .then(results => {
            // Combine the results into a single string
            const cnt = results.join("");
            document.getElementById("allMovies").innerHTML = cnt;
          })
          .catch(error => {
            console.log("Error: " + error);
          });
      },
      error: function(xhr, status, error) {
        console.log("Error sending limit data to server: " + error);
      }
    });
  }
  
  function getMovieCategories(id, callback) {
    var data = {
      id: id
    };
    
    $.ajax({
    url: "models/get_movie_categories.php",
    method: "POST",
    data: data,
    success: function(movieCategories) {
    console.log("Id data sent successfully");
    callback(movieCategories);
    },
    error: function(xhr, status, error) {
    console.log("Error sending Id data to server: " + error);
    }
    });
  }
}
if(window.location.href.includes("contact")){
  function checkMailing(e){
    e.preventDefault();
      var err = 0;
      var subjectRegex = /^[A-Za-z0-9\s\.,\?!@#$%^&*()\-+=]{1,100}$/;
      var emailReg = /^[\w\.]+@[a-zA-Z_]+?(\.[a-zA-Z]{2,3})+$/;
      var subjectName = document.getElementById("userMailSubject").value;
      var userEmail = document.getElementById("userMailEmail").value;
      var mailText = document.getElementById("userMailText").value;
      if(!checker(subjectRegex, "userMailSubject", "invalidSubject")){
        err++;
      }
      if(!checker(emailReg, "userMailEmail", "invalidEmail")){
        err++;
      }
      if(mailText==""){
        $("#invalidText").addClass("d-block")
      }
      else{
        $("#invalidText").removeClass("d-block")
      }
      if(err == 0){
        var mailData = {
          userMail:userEmail,
          subjectName:subjectName,
          mailText:mailText
        }
        $.ajax({
          url: "models/sendMailToAdmin.php",
          method: "POST",
          data: mailData,
          success: function(response) {
            console.log("Mail data sent successfully");
            console.log("Response from server: " + response);
            window.location.href = 'index.php';
          },
          error: function(xhr, status, error) {
            console.log("Error sending mail data to server: " + error);
          }
        })
      }
  }
    $("#sendMail").click(checkMailing);
}
if(window.location.href.includes("insertUser")){
  $.ajax({
    url:"models/get_users_data.php",
    dataType:"json",
    success: function(data){
        localStorage.setItem("users", JSON.stringify(data));
        allUsers = data;
    },
    error: function(xhr, status, error) {
        console.log("Error retrieving users: " + error);
      }
});
var allUsers = JSON.parse(localStorage.getItem(("users")));
localStorage.removeItem("users");
var emailReg = /^[\w\.]+@[a-zA-Z_]+?(\.[a-zA-Z]{2,3})+$/;
var passReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
var usernameReg = /^[a-zA-Z]{3}[a-zA-Z0-9_]{0,17}$/;

$("#userInsert").click(checkNewUserData);

function checkNewUserData(){
    var err = 0;

    if(!checker(emailReg, "regInputEmail", "invalidEmail")){
        err++;
    };
    if(!checker(usernameReg, "regInputUsername", "invalidUsername")){
        err++;
    }
    else{
        var taken = 0;
        allUsers.forEach(user => {
            if(user.username.toString()==document.getElementById("regInputUsername").value){
                document.getElementById("takenUsername").classList.add("d-block");
                taken++;
                err++;  
            }
        });
        if(taken == 0){
            document.getElementById("takenUsername").classList.remove("d-block");
        }
    }
    if(!checker(passReg, "regInputPassword", "invalidPassword")){
        err++;
    };
    if(document.getElementById("regInputPassword").value!=document.getElementById("regInputRenter").value){
        document.getElementById("invalidRenter").classList.add("d-block");
        err++;
    }
    else{
        document.getElementById("invalidRenter").classList.remove("d-block");
    }
    if(err==0){
        var newUserData = {
            username: document.getElementById("regInputUsername").value,
            email: document.getElementById("regInputEmail").value,
            password: document.getElementById("regInputPassword").value,
            roleId: document.getElementById("userRole").value
          };
          $.ajax({
            url: "models/registrationProcess.php",
            method: "POST",
            data: newUserData,
            success: function(response) {
              console.log("User register sent successfully");
              console.log("Response from server: " + response);
              window.location.href = "index.php?page=usersEdit";
            },
            error: function(xhr, status, error) {
              console.log("Error sending user data to server: " + error);
            }
          });
    }
}
}
if(window.location.href.includes("updateUser")){
  var currentUserUsername = $("#regInputUsername").val();
  $.ajax({
    url:"models/get_users_data.php",
    dataType:"json",
    success: function(data){
        localStorage.setItem("users", JSON.stringify(data));
        allUsers = data;
    },
    error: function(xhr, status, error) {
        console.log("Error retrieving users: " + error);
      }
});
var allUsers = JSON.parse(localStorage.getItem(("users")));
localStorage.removeItem("users");
var emailReg = /^[\w\.]+@[a-zA-Z_]+?(\.[a-zA-Z]{2,3})+$/;
var passReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
var usernameReg = /^[a-zA-Z]{3}[a-zA-Z0-9_]{0,17}$/;
var newPass =  $("#newPasswordTrue");
var userId = $("#userId").val();
var checkedPassword;

$("#userUpdate").click(checkUpdatedUserData);

function checkUpdatedUserData(){

    var err = 0;
    if(newPass.is(":checked")){
      
      checkedPassword = true;
    }
    else{
      checkedPassword = false;
    }


    if(!checker(emailReg, "regInputEmail", "invalidEmail")){
        err++;
    };
    if(!checker(usernameReg, "regInputUsername", "invalidUsername")){
        err++;
    }
    else{
        var taken = 0;
        allUsers.forEach(user => {
            if(user.username.toString()==document.getElementById("regInputUsername").value && document.getElementById("regInputUsername").value!=currentUserUsername){
                document.getElementById("takenUsername").classList.add("d-block");
                taken++;
                err++;  
            }
        });
        if(taken == 0){
            document.getElementById("takenUsername").classList.remove("d-block");
        }
    }
    if(checkedPassword){
      if(!checker(passReg, "regInputPassword", "invalidPassword")){
        err++;
    };
    }
    if(document.getElementById("regInputPassword").value!=document.getElementById("regInputRenter").value){
        document.getElementById("invalidRenter").classList.add("d-block");
        err++;
    }
    else{
        document.getElementById("invalidRenter").classList.remove("d-block");
    }
    if(err==0){
        var updatedUserData = {
            username: document.getElementById("regInputUsername").value,
            email: document.getElementById("regInputEmail").value,
            password: document.getElementById("regInputPassword").value,
            roleId: document.getElementById("userRole").value,
            userId: userId,
            newPassword: checkedPassword
          };
          $.ajax({
            url: "models/updateUserProcess.php",
            method: "POST",
            data: updatedUserData,
            success: function(response) {
              console.log("User register sent successfully");
              console.log("Response from server: " + response);
              window.location.href = "index.php?page=usersEdit";
            },
            error: function(xhr, status, error) {
              console.log("Error sending user data to server: " + error);
            }
          });
    }
}
}