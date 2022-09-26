


<?php include_once('common/header.php'); 

$mysqli =  new mysqli('localhost','root','','photo_world');
if(!$mysqli){
    die('
    <script> alert("Can not connect to database");   </script>
    ');
}
$query = "SELECT * FROM photographer";
$result = $mysqli->query($query);
if(!$result){
    die('
    <script> alert("Can not connect to table");       </script>
    ');
}
?>
<main class="l-main">
<div class="content-wrapper content-wrapper--with-bg">
 <h1 class="page-title">Photographers</h1>
 <div class="page-content">
 <div class="card-wrapper">
      <table>
         <tr>
         <th>SN</th>
         <th>Name</th>
         <th>Address</th>
         <th>Zip code</th>
         <th>Phone</th>
         <th>Email</th>
         <th>Verified</th>
         <th>Operation</th>
         </tr>
      <?php while($row = mysqli_fetch_assoc($result)){ 
         echo '<tr>
         <td> '. $row['id'].' </td>
         <td> '. $row['name'].' </td>
         <td> '. $row['country'].','.$row['city'].' </td>
         <td> '. $row['zipcode'].' </td>
         <td> '. $row['phone'].' </td>
         <td> '. $row['email'].' </td>';
         if($row['verify'] == 0){ 
             echo '<td style="color:red"> No </td>'; 
            }
            else{
                echo '<td style="color:green"> Yes </td>' ;
            }
        echo '
        <td> <form method="POST" action = "php/obj.php" style="box-shadow:none; padding:0; background-color:none;"><input type="number" name="id" value = "'. $row['id'].'" style="display:none;"> <button name="p_verify" type="submit">Verify / Hide</button>  </form> </td>
        </tr>
        ';
            
      }
         ?>
      </table>
   </div>
 
</div>
</div>
</main>

<?php include_once('common/footer.php'); ?>
