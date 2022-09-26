


<?php include_once('common/header.php'); 

$mysqli =  new mysqli('localhost','root','','photo_world_admin');
if(!$mysqli){
    die('
    <script> alert("Can not connect to database");   </script>
    ');
}
$query = "SELECT * FROM menu";
$result = $mysqli->query($query);
if(!$result){
    die('
    <script> alert("Can not connect to table");       </script>
    ');
}
?>
<main class="l-main">
<div class="content-wrapper content-wrapper--with-bg">
 <h1 class="page-title">Menu Bar</h1>
 <div class="page-content">
 <div class="card-wrapper">
      <table>
         <tr>
         <th>SN</th>
         <th>Name</th>
         <th>Link</th>
         <th>Active</th>
         <th>Operation</th>
         
         </tr>
      <?php while($row = mysqli_fetch_assoc($result)){ 
         echo '<tr>
         <td> '. $row['id'].' </td>
         <td> '. $row['link_name'].' </td>
         <td> '. $row['link'].' </td>';
        
         if($row['active'] == 0){ 
             echo '<td style="color:red"> No </td>'; 
            }
            else{
                echo '<td style="color:green"> Yes </td>' ;
            }
        echo '
        <td> 
         <a href="forms/menu.php?id='. $row['id']. '" style="padding: 3px 5px; background-color: rgb(35, 41, 116); color: #fff;  "> Edit </a> 
        </td>
        </tr>
        ';
            
      }
         ?>
      </table>
      <hr>
      <div class="form-wrapper">
            <form method="post" action="forms/obj.php">
                <h2> Add Menu</h2>
                <div class="input">
                    <label>Link Name</label>
                    <input type="text" name="name"  required = "required">
                </div>
                <div class="input">
                    <label>Link </label>
                    <input type="text" name="link"  required = "required">
                </div>
          
                <div class="input">
                    <label>Active</label>
                    <select  name="active" >
                    <option value="0" selected="selected">Not Active</option>
                    <option value="1">Active</option>
                    </select>
                    
                </div>
                <div class="input">
                <Button type="submit" name="menu">Add</Button>  
                </div>
            </form>
        </div>

   </div>
 
</div>
</div>
</main>

<?php include_once('common/footer.php'); ?>
