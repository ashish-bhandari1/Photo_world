

   <footer>
      <div class="footer">
         <div class="row ">
            <div class="col-md-3">
               <ul>
                  <p>Service</p>
                  <li><a href="#"><i class="fas fa-hands-helping"></i>help</a></li>
                  <li><a href="#"><i class="fas fa-envelope-square"></i>mail</a></li>
                  <li><a href="#"><i class="fas fa-phone"></i>+977 982191919</a></li>
               </ul>
            </div>
            <div class="col-md-3">
               <ul>
                  <p>The company</p>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About us</a></li>
                  <li><a href="policy.php">How It Works</a></li>
               </ul>
            </div>
            <div class="col-md-3">
               <ul>
                  <p>Quick Link</p>
                  <li><a href="policy.php">Privacy Policy</a></li>
                  <li><a href="login/login.php">Login</a></li>
                  <li><a href="login/register.php">Register</a></li>
             </ul>
            </div>
            <div class="col-md-3">
               <ul>
                  <p>Follow Us</p>
                  <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i>twitter</a></li>
                  <li><a href="#"><i class="fab fa-pinterest-p"></i>printerest</a></li>
               </ul>
            </div>
         </div>
         <p style="text-align: center;">&copy; 2020 PhotoWorld.com
</p>
      </div>
   </footer>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
   <script type="text/javascript"  src="js/script.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
   <script>
      // Sticky Header
      $(window).scroll(function() {
      
      if ($(window).scrollTop() == false) {
          $('.main_h').addClass('sticky');
      } else {
          $('.main_h').removeClass('sticky');
      }
      });
      
      // Mobile Navigation
      $('.mobile-toggle').click(function() {
      if ($('.main_h').hasClass('open-nav')) {
          $('.main_h').removeClass('open-nav');
      } else {
          $('.main_h').addClass('open-nav');
      }
      });
      
      $('.main_h li a').click(function() {
      if ($('.main_h').hasClass('open-nav')) {
          $('.navigation').removeClass('open-nav');
          $('.main_h').removeClass('open-nav');
      }
      });
      
      // navigation scroll lijepo radi materem
      $('nav a').click(function(event) {
      var id = $(this).attr("href");
      var offset = 70;
      var target = $(id).offset().top - offset;
      $('html, body').animate({
          scrollTop: target
      }, 500);
      event.preventDefault();
      });
          
   </script>
</html>