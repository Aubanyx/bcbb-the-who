<?php include_once "../includes/header.php" ?>
   
   <!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">          
<nav aria-label="breadcrumb">
<ol class="breadcrumb bg-transparent pt-5">
<li class="breadcrumb-item"><a href="http://localhost/bcbb-the-who/index.php#"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Board Index</li>
</ol>
</nav>








<div class="container-lg">

<div class="row">  

<div class="col-sm-9 px-0 mx-0 themed-grid-col">
<h3>Topic Read (hot)</h3>
<div class="forumRules px-4 py-3 rounded border-left border-11">
<p>Forum rules</p>
</div>



<div class="board-util d-flex pt-3">
 <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="submit">New topic <i class="fas fa-pencil-alt"></i></button>
<!-- searchbar -->
    <div class="bg-light rounded rounded-pill border w-25 ml-3">
      <div class="input-group">
        <input type="search" placeholder="Search this forum..." aria-describedby="button-addon1" class="form-control  bg-light rounded rounded-pill border-0">
        <div class="input-group-append">          
          <button id="button-addon1" type="submit" class="btn btn-link text-primary border-right"><i class="fa fa-search magnifying-glass"></i></button>
          <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fas fa-cog cog"></i></button>

        </div>
      </div>
    </div>  
 <p class="ml-auto font-weight-normal greytext pt-2"> 12 topics · Page <strong>1</strong> of <strong>1</strong></p>

  <!-- /searchbar -->
  </div> 

</div>









<div class="my-4 col-sm-9 bg-light">


<div class="themed-grid-col">
  <div class="card w-100 d-inline-flex p-3 card__users my-3">
    <div class="d-inline-flex p-3">
      <div class="SandrineParent">
        <div class="flex-column mx-3 w-25 d-flex">
          <img src="../assets/images/icons-users/svg/072-woman.svg" alt="profile-image" class="Sandrine">
          <p class="h5 text-danger">PlanetStyles</p>
          <p class="h6 text-secondary mb-3">Site Admin</p>
          <p class="h6"><span class="font-weight-bold">Posts :</span><span class="text-secondary"> 43</span></p>
          <p class="h6"><span class="font-weight-bold">Location :</span><span class="text-secondary"> UK</span></p>
        </div>
      </div>

      <div class="flex-column w-75">
        <p class="my-4 h6 text-secondary"><i class="far fa-clock"></i> Sun Oct 09, 2016 6:03 pm</p>
        <p class="py-3 h6">This is a topic that as the 'read' icons.</p>
        <p class="border-top py-3">This is a signature.</p>
      </div>

    </div>
  </div>
</div>


<div class="themed-grid-col">
  <div class="card w-100 d-inline-flex p-3 card__users my-3">
    <div class="d-inline-flex p-3">
      <div class="flex-column mx-3 w-25 d-flex justify-content-center">
        <img src="../assets/images/icons-users/svg/072-woman.svg" alt="profile-image" class="w-25 text-center">
        <p class="h5 text-danger">PlanetStyles</p>
        <p class="h6 text-secondary mb-3">Site Admin</p>
        <p class="h6"><span class="font-weight-bold">Posts :</span><span class="text-secondary"> 43</span></p>
        <p class="h6"><span class="font-weight-bold">Location :</span><span class="text-secondary"> UK</span></p>
      </div>

      <div class="flex-column w-75">
        <p class="my-4 h6 text-secondary"><i class="far fa-clock"></i> Sun Oct 09, 2016 6:03 pm</p>
        <p class="py-3 h6">This is a topic that as the 'read' icons.</p>
        <p class="border-top py-3">This is a signature.</p>
      </div>

    </div>
  </div>
</div>


</div>


































<!-- start of right side -->


<div class="col-xl-3 themed-grid-col">
  <!-- searchbar -->
  <div class="bg-light rounded rounded-pill border mt-5">
      <div class="input-group">
        <input type="search" placeholder="Search..." aria-describedby="button-addon1" class="form-control  bg-light rounded rounded-pill border-0">
        <div class="input-group-append">
          <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search magnifying-glass"></i></button>
        </div>
      </div>
    </div>
  <!-- /searchbar -->
  <hr>
  <!-- login - register card -->
<div id="accordionGroup">
<button type="button" class="btn bg-transparent font-weight-bold text-black-50 btn-block mb-2 text-left accordion-btn" data-toggle="collapse" data-target="#demo">Login · Register </button>
<div id="demo" class="collapse show" data-parent="#accordionGroup">
<div class="card-body">
                           <form>
                          <div class="form-group">
                              <label class="greytext">Username</label>
                              <input name="" class="form-control bg-light rounded rounded-pill" type="username">
                          </div> <!-- form-group// -->
                          <div class="form-group">
                              <label class="greytext">Password</label>
                              <input class="form-control bg-light rounded rounded-pill" type="password">
                          </div> <!-- form-group// --> 
                          <div class="form-group"> 
                          <div class="checkbox">
                            <label class="greytext"> <input type="checkbox"> Save password </label>
                          </div> <!-- checkbox .// -->
                          </div> <!-- form-group// -->  
                          <div class="form-group">
                              <button type="submit" class="btn text-white btn-login btn-block rounded rounded-pill"> Login  </button>
                          </div> <!-- form-group// -->                                                           
                      </form>


              </div>
</div>
</div>
<p class="p-1"><a href="#">I forgot my password</a></p>

  <!-- /login - register card -->

  <!-- last posts -->
  <div class="card mt-5 border-0 height-5">
      <div class="grad">
        <h4 class="text-white font-weight-normal">Last posts</h4>
      </div>
      <div class="card-body bg-light last-posts">
          <div class="last-posts__desc">
        <div class="card-text rounded bg-white mt-3 p-3"><h5>Post - category 3 <span class="float-right font-weight-normal"> 2 hours ago</span></h5> 
            <p>With supporting text below as a natural lead-in to additional content.
            <p class="font-italic pt-1">Tags: test, work, eat, repeat </p>
            </p></div>
          </div>
      

      
          <div class="last-posts__desc">
        <div class="card-text rounded bg-white mt-3 p-3"><h5>Post - category 3 <span class="float-right font-weight-normal"> 2 hours ago</span></h5> 
            <p>With supporting text below as a natural lead-in to additional content.
            <p class="font-italic pt-1">Tags: test, work, eat, repeat </p>
            </p></div>
          </div>
      

      
          <div class="last-posts__desc">
        <div class="card-text rounded bg-white mt-3 p-3"><h5>Post - category 3 <span class="float-right font-weight-normal"> 2 hours ago</span></h5> 
            <p>With supporting text below as a natural lead-in to additional content.
            <p class="font-italic pt-1">Tags: test, work, eat, repeat </p>
            </p></div>
          </div>
      

      
          <div class="last-posts__desc">
        <div class="card-text rounded bg-white mt-3 p-3"><h5>Post - category 3 <span class="float-right font-weight-normal"> 2 hours ago</span></h5> 
            <p>With supporting text below as a natural lead-in to additional content.
            <p class="font-italic pt-1">Tags: test, work, eat, repeat </p>
            </p></div>
          </div>
      </div>


    </div>
    
  <!-- /last posts -->
  
  <!-- last active users -->
  <div class="card mt-5 border-0">
        <div class="grad">
        <h4 class="text-white font-weight-normal">Last active users</h4>
       </div>
      <div class="card-body bg-light last-users">
          
          <div class="d-flex flex-row">
              <div class="card rounded border-0 w-100 m-1 pd-1">
                  <div class="card-body text-center">

                   <img src="../assets/images/icons-users/svg/079-man.svg">

                      <p class="pt-2"><span>#Ben198</span>
                          <br>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                          </p>
                  </div>
              </div>
             
              <div class="card rounded border-0 w-100 m-1 pd-1">
                  <div class="card-body text-center">
                      <img src="../assets/images/icons-users/svg/072-woman.svg" alt="profile-image">
                      <p class="pt-2"><span>#Lora298</span>
                      <br>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      </p>
                  </div>
              </div>

              <div class="card rounded border-0 w-100 m-1 pd-1">
                  <div class="card-body text-center">
                      <img src="../assets/images/icons-users/svg/026-woman.svg" alt="profile-image">
                      <p class="pt-2"><span>#Mary933</span>
                          <br>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                          </p>
                  </div>
              </div>

            </div>


      </div>
   </div>   
  <!-- /last active users -->


</div> 

<!-- end of row -->
</div>       
<!-- end container-lg -->
</div>
<!-- end main container -->

</div>

<script src="./assets/js/script.js"></script>
<?php include_once "../includes/footer.php" ?>