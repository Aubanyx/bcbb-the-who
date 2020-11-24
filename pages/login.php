<?php include_once "../includes/header.php" ?>
   
<!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pt-5 pb-5">   

<p class="pl-5 pb-3"><a href="#"><i class="fas fa-home"></i> Home</a></p>
      
<div class="container-lg board-util">
<h1 class="pl-5"><i class="far fa-arrow-alt-circle-right"></i> Log in</h1>
<div class="container d-flex justify-content-center">

<div class="card board-util border-0 w-50">
 <div class="card-body">
   <form class="board-util-form p-5">

     <label class="w-100 mt-3 text-secondary" for="username"><h5>Username</h5></label>
       <div class="input-group border">
       <div class="input-group-prepend pl-1">
         <span class="input-group-text bg-transparent border-0" id="inputGroup-sizing-sm"><i class="fas fa-at"></i></span>
       </div>
                 <input type="username" class="input100 border-0 form-control-plaintext p-3"" type="text" placeholder="Username">
                         <span class="focus-input100"></span>

     </div>
       

     <label class="w-100 mt-4 text-secondary" for="email"><h5>Password</h5></label>
             <div class="border rounded validate-input mt-2">
                 <input type="password" class="input100 border-0 form-control-plaintext p-3" type="text" placeholder="******">
                 <span class="focus-input100"></span>
             </div>        
             <p class="float-right"><a href="#">Forgot password?</a></p>

     <div class="form-check mt-4">
       <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
       <label class="form-check-label text-secondary pl-3 pt-1" for="defaultCheck1">
         Remember me
       </label>
     </div>

     <button class="btn text-white font-weight-bold btn-block my-4 border-0 rounded rounded-pill board-util__btn" type="submit">Log in</button>
 
   
 </form>
 </div>
</div>






</div>


</div> 

<!-- end of row -->
 
<!-- end container-lg -->
</div>
<!-- end main container -->

</div>

<script src="/assets/js/script.js"></script>
<?php include_once "../includes/footer.php" ?>

