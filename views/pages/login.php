<body id="loginBody">
     <main>
        <div class="container col-lg-4 col-md-6 col-sm-10 p-5 rounded" id="formDiv">
            <h3 class="fw-bold ico">Log in</h3>
            <form action="models/loginProcess.php" method="post">
                <form>
                    <div class="form-group">
                      <label for="loginEmail" class="my-2 ico">Username</label>
                      <input type="text" class="form-control inputForForm" id="loginUsername" name="loginUsername" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="loginEmail" class="my-2 ico">Password</label>
                      <input type="password" class="form-control inputForForm" id="loginPassword" name="loginPassword" placeholder="Password">
                    </div>
                    <div class="invalid-feedback">
                        There is no account matching your parameters.
                    </div>
                    <button type="submit" class="btn mt-4 w-100 fw-bold" id="submitButton" name="submitButton">Log in</button>
                  </form>
            </form>
            <div class="d-flex mt-4">
                <p class="me-2">New to MovieLense?</p>
                <a href="index.php?page=register"><p id="signUpNow">Sign up now</p></a>
            </div>
        </div>
  </body>
