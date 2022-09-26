
<?php
include_once('common/header.php');

if(!isset($_SESSION["Cid"])){
   echo '
   <script>
   alert("Please login first to Book");
   window.location = ("login/login.php");
   </script>
   '; 
}

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
$userid = $_SESSION["Cid"];
$query = "SELECT * FROM photographer  WHERE id = '$id' ";

$result = $mysqli->query($query);

if(!$result){
    die('
    <script>
    alert("Can not connect to table");
    window.location = ("index.php");
    </script>
    ');
}
?>
<body>

<div class="bookcard-wrapper container">
      <?php 
         while($row = mysqli_fetch_assoc($result)){
      ?>
      <div class="book-wrapper">
            <div class="desc-wrapper">
             <img src = "userimg/<?php echo $row['profile']; ?>" alt="profile">
            </div>
            <div class="descbtn-wrapper">
               <a href="index.php" onclick ="confirm('Are you sure want to cancel?')"><i class="fas fa-arrow-left"></i> Back </a>
            </div>
      </div>
      <div class="bio-wrapper">
        <div class = "info">
            <p>Note : Photographer is already booked for following date:</p>
            <div class = "date">
            <?php 
            $available = $mysqli->query("SELECT * FROM BOOKING WHERE p_id = '$id'");
            while($row2 = mysqli_fetch_assoc($available)){
                echo '<p>'.$row2['from_date'] .'  <i style = "color:red">to</i>  '.$row2['to_date'].'</p>';
            }
            ?>
            </div>
        </div>
         <form method = "post" action = "login/obj.php" >
         <div class = "input">
            <label>Book From Date:</label>
            <input type = "date" id="date1"onchange = "date()"   name = "fromDate" required = "required">
            </div>
            <input type = "text" name = "id" style = "display:none" value = "<?php echo $id ?>">
            <input type = "text" name = "user"  style = "display:none" value = "<?php echo $userid ?>">

            <div class = "input">
            <label>Book To Date:</label>
            <input type = "date" id="date2" onchange = "date()"  name = "toDate" required = "required">
            </div>
            <div class = "input">
            <label>No.of Days:</label>
            <input style = "border: none;  box-shadow: none;" type = "text" name = "days" id = "day" onkeyup = "validate()" required = "required">
            </div>
            <div class = "input">
            <label style = "font-weight:bold">Total: <span id = "total">0</span> RS</label>
            <label style = "color:red"  id = "msg"> </label>
            </div>
            <button Type = "submit" id = "bookbtn" name = "book">Book</button>
         </form>
         <button id="payment-button" onclick = "payment()">Pay with Khalti</button>

      </div>
      <?php } ?>

</div>
   
</body>
<script src="https://khalti.com/static/khalti-checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <!-- Place this where you need payment button -->
    <!-- Place this where you need payment button -->
    <!-- Paste this code anywhere in you body tag -->
    <script>
    function  validate(){
        var msg =  document.getElementById('msg');
        var btn = document.getElementById('bookbtn');
        var input = document.getElementById("total");
        var day = document.getElementById("day").value;
        if(day < 1){
            input.textContent  = day * 2200 ;
            msg.innerHTML = "<br> Book at least 1 day";
            btn.disabled = true;
            btn.style.cursor = 'not-allowed';  
            btn.style.backgroundColor = 'rgba(255, 0, 0, 0.432)';
        }
        else{
            input.textContent  = day * 2200 ;
            msg.innerHTML = "";
            btn.disabled = false;
            btn.style.cursor = 'pointer';
            btn.style.backgroundColor = 'rgb(144, 105, 235)'; 
        }

    }
    function payment(){
        var pay = document.getElementById("total").textContent;
        var money = pay+'00';
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_dc74e0fd57cb46cd93832aee0a390234",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);


        if( pay == "0"){
            alert("Book at least 1 day");
        }
        else{
            checkout.show({amount: money});   
        }
    }
  
    function date(){
    
	// To set two dates to two variables 
    var date1 = new Date(document.getElementById("date1").value);
    var date2 = new Date(document.getElementById("date2").value);
    var day = document.getElementById("day");
    var msg =  document.getElementById('msg');
    var btn = document.getElementById('bookbtn');
    var input = document.getElementById("total");

    // To calculate the time difference of two dates 
    var Difference_In_Time = date2.getTime() - date1.getTime(); 

    // To calculate the no. of days between two dates 
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
        if(Difference_In_Days < 1){
            input.textContent  = 0 ;
            msg.innerHTML = "<br> Book at least 1 day";
            btn.disabled = true;
            btn.style.cursor = 'not-allowed';  
            btn.style.backgroundColor = 'rgba(255, 0, 0, 0.432)';
            day.value = Difference_In_Days;
        }
        else{
            input.textContent  = Difference_In_Days * 2200 ;
            msg.innerHTML = "";
            btn.disabled = false;
            btn.style.cursor = 'pointer';
            btn.style.backgroundColor = 'rgb(144, 105, 235)'; 
            day.value = Difference_In_Days;
        }


}
    </script>
  
    <?php include_once('common/footer.php'); ?>
