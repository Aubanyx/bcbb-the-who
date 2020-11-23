
<?php include_once "../includes/header.php" ?>
   
<!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pt-5 pb-5">   

<p class="pl-5 pb-3"><a href="http://localhost:8888/"><i class="fas fa-home"></i> Home</a></p>
      
<div class="container-lg">
<h1 class="pl-5"><i class="far fa-arrow-alt-circle-right"></i> Profile</h1>
<h2 class="pl-5 text-muted">Edit and personalize your profile </h2>
<div class="container d-flex justify-content-center">

<div class="card border-0 w-100">
 <div class="card-body board-util">
  <form class="p-5  action="/newaccount" method=post
  oninput='up2.setCustomValidity(up2.value != up.value ? "Passwords do not match." : "")'>   <div class="d-flex bg-light rounded align-items-center justify-content-center py-3 profilesettings"> <img src="https://www.flaticon.com/svg/static/icons/svg/3011/3011513.svg" class="img" alt="">
        <div class="pl-sm-4 pl-2 img-fluid text-secondary"> <p class="display-4 pb-2 text-dark">Sandrine Lê</p> 
        <p class="h4">@sandrine_who <span class="badge badge-light">member</span></p>
        <p>sandrinele@gmail.com</p>
        </div>
    </div>
<div class="profilepic bg-light justify-content-center d-flex pb-5 border-bottom text-secondary">
  <div class="w-25">
    <h5>Profile picture</h5>
          <p class="text-secondary small">Accepted file type .png. Less than 1MB</p> 
          <input type="file" class="form-control-file pt-2 w-50" id="exampleFormControlFile1">
          
        </div>
          <button class="btn text-white font-weight-bold my-4 border-0 rounded rounded-pill board-util__btn" type="submit">Upload</button>
  </div>

<!-- personal infos + contact infos -->
<div class="d-flex flex-row">
<div class="personalinfos p-5 flex-fill border-right">
    <label class="w-100 mt-3 text-secondary" for="first-name"><h5>Your name</h5></label>

    <div class="border rounded validate-input mt-2" data-validate="Type first name">
      <input class="input100 border-0 form-control-plaintext p-3" type="text" placeholder="Sandrine">
      <span class="focus-input100"></span>
    </div>

    <div class="border rounded validate-input mt-2" data-validate="Type last name">
      <input class="input100 border-0 form-control-plaintext p-3" type="text" placeholder="Lê">
      <span class="focus-input100"></span>
    </div>

    

     <label class="w-100 mt-4 text-secondary" for="username"><h5>Username</h5></label>
       <div class="input-group border">
       <div class="input-group-prepend pl-1">
         <span class="input-group-text bg-transparent border-0" id="inputGroup-sizing-sm"><i class="fas fa-at"></i></span>
       </div>
                 <input type="username" class="input100 border-0 form-control-plaintext p-3"" type="text" placeholder="sandrine_who">
                         <span class="focus-input100"></span>

     </div>


     <label class="w-100 mt-3 text-secondary" for="email"><h5>Email</h5></label>
      <div class="border rounded validate-input mt-2" data-validate = "Valid email is required: ex@abc.xyz">
        <input id="email" class="input100 border-0 form-control-plaintext p-3" type="text" name="email" placeholder="sandrinele@gmail.com">
        <span class="focus-input100"></span>
      </div> 
       

<!-- change password -->
     <div id="accordion" role="tablist">
      <div class="card border-0 mt-5">
        <div class="card-header p-0 bg-white" role="tab" id="headingOne">
            <button type="button" class="btn m-0 p-0 bg-transparent text-left font-weight-bold text-secondary btn-block accordion-btn" data-toggle="collapse" data-target="#blankwidget"><h5>Change password?</h5> </button>
    

        </div>
        <div id="blankwidget" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-body bg-light">
            <div class="mt-1">

              <label class="w-100 text-secondary" for="password"><h5>Current password</h5></label>
              <div class="border rounded validate-input mt-2">
                  <input type="password" class="input100 border-0 form-control-plaintext p-3" type="text" placeholder="******">
                  <span class="focus-input100"></span>
                </div>   
                  

                <label class="w-100 pt-3 text-secondary" for="password1"><h5>New password</h5></label>
                <div class="border rounded validate-input mt-2">
                    <input type="password" class="input100 border-0 form-control-plaintext p-3" placeholder="******" id="password1" required name="up">
                    <span class="focus-input100"></span>
                  </div>   
                  
                  <label class="w-100 pt-3 text-secondary" for="password2"><h5>Confirm new password</h5></label>
                  <div class="border rounded validate-input mt-2">
                      <input type="password" class="input100 border-0 form-control-plaintext p-3" placeholder="******" id="password2" name="up2">
                      <span class="focus-input100"></span>
                    </div>  
               
            </div>
            </div>
        </div>
      </div>
     
    </div>
<!-- / change password -->
    

    </div>

    <div class="contactinfos flex-fill p-5">
      


      <label class="w-100 mt-4 text-secondary" for="email"><h5>Date of Birth</h5></label>
      <div class="border rounded validate-input input-with-post-icon datepicker">
        <input id="birthday"  class="input100 border-0 form-control-plaintext p-3" type="date" placeholder="Select date" >
        <span class="focus-input100"></span>
      </div>

      <label class="w-100 mt-3 text-secondary" for="location"><h5>Location</h5></label>

<div class="border rounded validate-input mt-2" data-validate="Type your location">
  <input class="input100 border-0 form-control-plaintext p-3" type="text" placeholder="">
  <span class="focus-input100"></span>
</div>

<label class="w-100 mt-3 text-secondary" for="location"><h5>Mood</h5></label>

<div class="border rounded validate-input mt-2" data-validate="Type your location">
  <input class="input100 border-0 form-control-plaintext p-3" type="text" placeholder="">
  <span class="focus-input100"></span>
</div>


      <label class="w-100 mt-3 text-secondary" for="email"><h5>Signature</h5></label>
      <div class="border rounded validate-input mt-2" data-validate = "Valid email is required: ex@abc.xyz">
        <textarea class="input100 border-0 form-control-plaintext p-3" id="exampleFormControlTextarea1"></textarea> 
               <span class="focus-input100"></span>
      </div> 

    </div>


    
  </div>



   <!-- / personal infos + contact infos -->
   <div class="text-center pt-3">
     <button class="btn w-25 text-white font-weight-bold my-4 border-0 rounded rounded-pill board-util__btn m-auto" type="submit">Save Changes</button>
</div>

 </form>
 </div>
</div>


    </div>
  </div>


</div>



</div>


</div> 

<!-- end of row -->
 
<!-- end container-lg -->
</div>
<!-- end main container -->

</div>

<script src="./assets/js/script.js"></script>
<?php include_once "../includes/footer.php" ?>

