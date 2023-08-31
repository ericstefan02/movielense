<footer id="footer">
      <div class="container d-flex justify-content-center">
        <p class="fw-bolder fs-5 text-uppercase mt-3">Follow us on social media</p>
      </div>
      <div class="container d-flex justify-content-center" id="socialMedia">
        <a href="#" class="p-1">
          <i class="fa-brands fa-instagram mx-2 fs-2 ico"></i>
        </a>
        <a href="#" class="p-1">
          <i class="fa-brands fa-twitter mx-2 fs-2 ico"></i>
        </a>
        <a href="#" class="p-1">
          <i class="fa-brands fa-facebook mx-2 fs-2 ico"></i>
        </a>
        <a href="#" class="p-1">
          <i class="fa-brands fa-youtube mx-2 fs-2 ico"></i>
        </a>
        <a href="#" class="p-1">
          <i class="fa-brands fa-tiktok mx-2 fs-2 ico"></i>
        </a>
      </div>
      <div
        class="container d-flex justify-content-center my-3 align-items-center flex-wrap"
        id="links"
      >
        <p class="fw-bolder mx-3 fs-5">Useful links</p>
        <p id="arrow"><i class="fa-solid fa-arrow-right ico"></i></p>
        <?php 
            $footerLinks = getFooterLinks();
            foreach($footerLinks as $footerLink){
                if(isset($_SESSION['user'])){
                  if($footerLink->item_url!="register.php"){
                    echo '<p><a href="'.$footerLink->item_url.'" class="mx-2 p-1">'.$footerLink->item_text.'</a></p>';
                  }
                }
                else{
                  echo '<p><a href="'.$footerLink->item_url.'" class="mx-2 p-1">'.$footerLink->item_text.'</a></p>';
                }
            }
        ?>
      </div>

      <div class="container d-flex justify-content-center" id="copyrightDiv">
        <p class="fw-bolder fs-5 mt-3">Copyright <span class="ico">&copy</span> 2023 - Stefan Erić</p>
      </div>
</footer>