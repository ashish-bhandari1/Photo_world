<?php include_once('common/header.php'); ?>

<div class="row" id="banner123">
         <div class="hero">
            <h1><span>Hire</span><br>Your <br>Best Photographer</h1>
         </div>
      </div>
      <div class="body container">
         <div class="hero-text">
            <h1>Our Photographer</h1>
         </div>
         <div class="asdf" style=" margin:0% auto 3%  auto;
            text-align: center;
            font-size: 50px;
            width: 100%;
            letter-spacing:2px;">
            <h4>Pick Your Best Photographer</h4>
         </div>
         <?php 
            while($row = mysqli_fetch_assoc($result)){
            ?>
         <div class="card-wrapper row">
            <div class="profile-wrapper col-md-4">
               <div class="img-wrapper ">
               <img src = "userimg/<?php echo $row['profile']; ?>" alt="profile">
               </div>
               <div class="button-wrapper">
                  <a href="book.php?id=<?php echo $row['id']; ?>" id = "bk">Hire me<i class="fas fa-forward"></i></a>
                  <a href="moreDescription.php?id=<?php echo $row['id']; ?>" >More description <i class="fas fa-arrow-right"></i></a>
               </div>
            </div>
            <div class="bio-wrapper col-md-7">
               <P style="  text-transform: capitalize; "> <span>Name:</span> <?php echo $row['name']; ?></P>
               <p><span>Email:</span><?php echo $row['email']; ?></p>
               <p><span>Contact:</span><?php echo $row['phone']; ?></p>
               <P class="bio"><i> <?php echo $row['bio']; ?> </i></P>
            </div>
         </div>
         <?php } ?>
      </div>
   </body>

   <?php include_once('common/footer.php'); ?>
