<body id="loginBody">
     <main>
     <div class="container col-lg-4 col-md-6 col-sm-10 p-5 rounded" id="formDiv">
            <h3 class="fw-bold ico">Create account</h3>
            <form action="">
                <form>
                    <div class="form-group">
                      <label for="regInputEmail" class="my-2 ico">Email address</label>
                      <input type="email" class="form-control inputForForm" id="regInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                      <div class="invalid-feedback" id="invalidEmail">
                        Please enter a valid email.
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="regInputUsername" class="my-2 ico">Username</label>
                        <input type="text" class="form-control inputForForm" id="regInputUsername" aria-describedby="emailHelp" placeholder="Enter username">
                        <div class="invalid-feedback" id="invalidUsername">
                        Please enter username that is more than 3 characters long.
                      </div>
                      <div class="invalid-feedback" id="takenUsername">
                        Username is taken.
                      </div>
                      </div>
                    <div class="form-group">
                      <label for="regInputPassword" class="my-2 ico">Password</label>
                      <input type="password" class="form-control inputForForm" id="regInputPassword" placeholder="Password">
                      <div class="invalid-feedback" id="invalidPassword">
                        Please enter a password that has one small, one capital letter and a number.
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="regInputRenter" class="my-2 ico">Re-enter password</label>
                        <input type="password" class="form-control inputForForm" id="regInputRenter" placeholder="Confirm password">
                        <div class="invalid-feedback" id="invalidRenter">
                        Passwords do not match eachother.
                      </div>
                      </div>
                    <input type="button" class="btn mt-4 w-100 fw-bold" id="submitButton" value="Register"/>
                  </form>
            </form>
            <div class="d-flex mt-4">
                <p class="me-2">Already have an account?</p>
                <a href="index.php?page=login"><p id="signUpNow">Log in here</p></a>
            </div>
        </div>
    </main>
  </body>
