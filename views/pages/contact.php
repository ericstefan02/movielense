     <main>
        <div class="container">
            <div class="container d-flex justify-content-center mt-5 mb-3 text-center"><h2 class="fw-bold"><i class="fa-solid fa-gear ico"></i> Run into some problems or have some suggestions? Write to us! <i class="fa-solid fa-lightbulb ico"></i></h2></div>
        <form>
        <div class="form-group">
            <label for="userMailEmail" class="icoSecondary">Email address</label>
            <input type="email" class="form-control inputForForm" id="userMailEmail" placeholder="Enter your email...">
        </div>
        <div class="invalid-feedback" id="invalidEmail">
          Please enter a valid email.
        </div>
        <div class="form-group">
            <label for="userMailSubject" class="icoSecondary">Subject name</label>
            <input type="text" class="form-control inputForForm" id="userMailSubject" placeholder="Enter subject name...">
        </div>
        <div class="invalid-feedback" id="invalidSubject">
          Please enter a valid subject name.
        </div>
        <div class="form-group">
            <label for="userMailText" class="icoSecondary">Mail text</label>
            <textarea class="form-control inputForForm" id="userMailText" rows="3"></textarea>
        </div>
        <div class="invalid-feedback" id="invalidText">
          Please enter some text.
        </div>
        <input type="button" class="btn insertButton rounded mt-3 mb-5"id="sendMail" value="Send mail"/>
        </form>
        </div>
    </main>