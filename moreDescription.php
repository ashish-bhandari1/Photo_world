
<?php
include_once('common/header.php');

$mysqli =  new mysqli('localhost','root','','photo_world');
if(!$mysqli){
    die('
    <script>
    alert("Can not connect to database");
    window.location = ("index.php");
    </script>
    ');
}

$id = $_GET['id'];
$query3 = "SELECT * FROM photographer  WHERE id = '$id' ";
$query4 = "SELECT * FROM photographer_gallery  WHERE p_id = '$id' ";

$resul3 = $mysqli->query($query3);
$result4 = $mysqli->query($query4);

if(!$resul3 || !$result4 ){
    die('
    <script>
    alert("Can not connect to table");
    window.location = ("index.php");
    </script>
    ');
}
?>
<body>
         <div class="asdf" style=" margin:1% auto 1%  auto;
            text-align: center;
            font-size: 50px;
            width: 100%;
            letter-spacing:2px;">
            <h3>More Description</h3>
         </div>

        <?php 
         while($row = mysqli_fetch_assoc($resul3)){
      ?>
      <div class="card-wrapper container row">
      <div class="profile-wrapper col-md-4">
            <div class="desc-wrapper">
             <img src = "userimg/<?php echo $row['profile']; ?>" alt="profile">
            </div>
            <div class="descbtn-wrapper">
               <a href="index.php" onclick ="confirm('Are you sure want to cancel?')"><i class="fas fa-arrow-"></i> Back </a>
               <a href="book.php?id=<?php echo $row['id']; ?>" id = "bk">Book Now<i class="fas fa-forward"></i></a>
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
 
   <div class="asdf" style=" margin:1% auto 1%  auto;
            text-align: center;
            font-size: 50px;
            width: 100%;
            letter-spacing:2px;">
            <h3><i>My Previous Works</i></h3>
         </div>
<div class = "container">
   <div class="gallery-wrapper ">
  <?php 
         while($row2 = mysqli_fetch_assoc($result4)){
      ?>
        <div class = "gallery ">
        <img src = "userimg/<?php echo $row2['photo']; ?>" alt="gallery">
        </div>

   <?php } ?>
   </div>
 </div>
    </body>
    <?php include_once('common/footer.php'); ?>
