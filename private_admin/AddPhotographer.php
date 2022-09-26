


<?php include_once('common/header.php'); ?>
<main class="l-main">
<div class="content-wrapper content-wrapper--with-bg">
 <h1 class="page-title">Add new Photographer</h1>
 <div class="page-content">
 <div class="card-wrapper">
 <div class="form-wrapper">
            <form method="post" action="forms/obj.php">
                <div class="input">
                    <label>Name</label>
                    <input type="text" name="name"  required = "required">
                </div>
                <div class="input">
                    <label>Phone</label>
                    <input type="number" name="phone"  required = "required">
                </div>
                <div class="input">
                    <label>Email</label>
                    <input type="email" name="email"   required = "required">
                </div>
                <div class="input">
                    <label>City</label>
                    <input type="text" name="city"  >
                </div>
                <div class="input">
                    <label>Country</label>
                    <input type="text" name="country" >
                </div>
                <div class="input">
                    <label>ZIP code</label>
                    <input type="text" name="zip">
                </div>
          
                
                <div class="input">
                    <label>Verify</label>
                    <select  name="verify" >
                    <option value="0" selected="selected">Not Verified</option>
                    <option value="1">Vefifed</option>
                    </select>
                    
                </div>
                <div class="input">
                <Button type="submit" name="photographer">Add</Button>  
                </div>
            </form>
        </div>
   </div>
 
</div>
</div>
</main>

<?php include_once('common/footer.php'); ?>
