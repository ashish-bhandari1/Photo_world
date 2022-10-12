
<?php include_once('common/header.php'); 

   $mysqli =  new mysqli('localhost','root','','photo_world');
   if(!$mysqli){
       die('
       <script> alert("Can not connect to database");   </script>
       ');
   }
   $query = "SELECT * FROM customer";
   $result = $mysqli->query($query);
   if(!$result){
       die('
       <script> alert("Can not connect to table");       </script>
       ');
   }
   ?>
<main class="l-main">
  <div class="content-wrapper content-wrapper--with-bg">
    <h1 class="page-title">Total Users Registered</h1>
    <div class="page-content">
    <div class="card-wrapper">
         <table>
            <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            </tr>
         <?php while($row = mysqli_fetch_assoc($result)){ 
            echo '<tr>
            <td> '. $row['name'].' </td>
            <td> '. $row['country'].','.$row['city'].' </td>
            <td> '. $row['phone'].' </td>
            <td> '. $row['email'].' </td>
            </tr>';
         }
            ?>
         </table>
      </div>
    
  </div>
  </div>
</main>

<?php include_once('common/footer.php'); ?>
