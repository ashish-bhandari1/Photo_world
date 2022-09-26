<?php include_once('common/header.php'); ?>

<main class="l-main">
  <div class="content-wrapper content-wrapper--with-bg">
    <h1 class="page-title">Account Setting</h1>
    <div class="page-content">
    <div class="card-wrapper">
   
        <div class="change-wrapper" id="changepw_click">
            <form method = "post" class="password" action= "php/obj.php">
            <h1>Change Password </h1>   
            <div class = "input">
                    <input name = "current_pw" id = "password" required = "required" type = "password" placeholder = "Current Password">
                    <input name = "new_pw" id = "pw" required = "required" type = "password" placeholder = "New Password">
                    <input name = "retype_new_pw"  required = "required" type = "password" placeholder = "Retype New Password">
                    <button type = "submit" name="admin_pw" class = "login">Change Password </button>
                    <div class="button-wrapper">
                    </div>
                </div>
            </form>
        </div>


      </div>
    
  </div>
 
  </div>
</main>

<?php include_once('common/footer.php'); ?>
