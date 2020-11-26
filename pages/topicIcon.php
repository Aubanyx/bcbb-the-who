<?php
session_start();
require_once "../library/functions.php";
$dbh = connect();
$page = "topicIcon";
include_once "../includes/header.php";
$topics = topics();
?>


<!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">          
<nav aria-label="breadcrumb">
<ol class="breadcrumb bg-transparent pt-5">
<li class="breadcrumb-item"><a href="https://bcbb-thewho.herokuapp.com/"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item"><a href="/">Board Index</a></li>
<li class="breadcrumb-item"><a href="/parent">Category One</a></li>
<li class="breadcrumb-item active" aria-current="page">Forum One</li>
</ol>
</nav>

<div class="container-lg">

<div class="row">  

<div class="col-xl-9 themed-grid-col">

<h4 class="font-weight-light text-black-50 pb-3">Forum One Topics</h4>
<div class="alert alert-danger border-0 rounded" role="alert">
Make sure to read the <a href="#!" class="alert-link">the forum rules</a> before posting.
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

  <!-- announcements -->
  <div class="card mt-5 border-0">
      <div class="grad text-white row no-gutters align-items-center w-100">
        <div class="col"><h4 class="font-weight-light">Announcements</h4></div> 
        <div class="d-none d-md-block col-6 text-muted">
                             <div class="row no-gutters align-items-center text-white">
                                 <div class="col-3"><i class="fas fa-comments"></i></div>
                                 <div class="col-3"><i class="fas fa-eye"></i></div>
                                 <div class="col-6"><i class="fas fa-clock"></i></div>
                             </div>
                         </div>
      </div>
      <div class="card-body bg-light">
        <div class="forumslist shadow-sm bg-white mt-1 p-3">
        <div class="row no-gutters text-black-50 align-items-center">
                         <div class="col-1 text-center"><i class="fas fa-bullhorn forumslist__grey"></i></div>
                         <div class="col"><a href="https://bcbb-thewho.herokuapp.com/pages/topicRead.php">This is an announcement!</a>
                        <p class="text-secondary small">by <a href="#">Bastien</a> » in <a href="#">Unread Forum</a></p></div>
                         <p class="ml-auto greytext pr-4"><i class="fas fa-bullhorn cog"></i></p>

                         <div class="d-none d-md-block col-6">
                             <div class="row no-gutters pl-2 align-items-center">
                                 <div class="col-3">14</div>
                                 <div class="col-3">120</div>
                                 <div class="media col-6 align-items-center"> 
                                   <p>by <a href="#"">Bastien</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
                                   <span class="d-block">Sat Nov 20, 2020 7:00pm</span></p></div>
                              </div>
                          </div>
                         </div>
        </div>
       
</div>
</div>

<!-- /announcements -->

<!-- topics -->

<div class="card mt-5 border-0">
  <div class="grad text-white row no-gutters align-items-center w-100">
    <div class="col"><h4 class="font-weight-light">Topics</h4></div> <div class="d-none d-md-block col-6 text-muted">
                         <div class="row no-gutters align-items-center text-white">
                             <div class="col-3"><i class="fas fa-comments"></i></div>
                             <div class="col-3"><i class="fas fa-eye"></i></div>
                             <div class="col-6"><i class="fas fa-clock"></i></div>
                         </div>
                     </div>
  </div>
  <div class="card-body bg-light">
    <div class="forumslist shadow-sm bg-white mt-1 p-3">


<!-- sujet -->

<?php
  foreach($topics as $topic) :
  $userName = topicsName($topic['topicBy']);
?>

     <div class="row no-gutters py-3 text-black-50 align-items-center">
      <div class="col-1 text-center"><i class="fas fa-check forumslist__green"></i></div>
      <div class="col"><a href="https://bcbb-thewho.herokuapp.com/pages/topicRead.php"> <?=$topic['topicSubject'];?></a>

     <p class="text-secondary small">by <a href="#"><?=$userName;?></a></p></div>

      <div class="d-none d-md-block col-6">
          <div class="row no-gutters pl-2 align-items-center">
              <div class="col-3">21</div>
              <div class="col-3">327</div>
              <div class="media col-6 align-items-center"> 
                <p>by <a href="#">Auban</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
                <span class="d-block">Sat Nov 20, 2020 7:20pm</span></p></div>
           </div>
       </div>
</div>

<?php
  endforeach;
?>
<!-- /sujet -->

</div>   
</div>
</div>

<!-- /topics -->


<div class="board-util d-flex pt-3">
  <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="submit">New topic <i class="fas fa-pencil-alt"></i></button>
 <!-- searchbar -->
 <div class="dropdown">
  <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle"
          type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sort-amount-down-alt text-black-50"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <a class="dropdown-item" href="#!">Most recent to oldest</a>
    <a class="dropdown-item" href="#!">Oldest to most recent</a>
    <a class="dropdown-item" href="#!">Publication date</a>
    <a class="dropdown-item" href="#!">Most popular</a>
    <a class="dropdown-item" href="#!">Author</a>
  </div>
</div>
  <p class="ml-auto font-weight-normal greytext pt-2"> 12 topics · Page <strong>1</strong> of <strong>1</strong></p>
 
   <!-- /searchbar -->
   </div>

   <div class="board-util d-flex pt-3">
 <a href="http://localhost:8888/">Return to Board Index</a>
     
 <div class="dropdown ml-auto">
  <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle text-black-50"
          type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Jump to
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <a class="dropdown-item" href="#!">Anne</a>
    <a class="dropdown-item" href="#!">Bastien</a>
    <a class="dropdown-item" href="#!">Auban</a>
    <a class="dropdown-item" href="#!">Sandrine</a>
    <a class="dropdown-item" href="#!">Forum</a>
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

                <img src="https://www.flaticon.com/svg/static/icons/svg/3011/3011277.svg">

                   <p class="pt-2"><span>#Ben198</span>
                       <br>
                       Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                       </p>
               </div>
           </div>
          
           <div class="card rounded border-0 w-100 m-1 pd-1">
               <div class="card-body text-center">
                   <img src="https://www.flaticon.com/svg/static/icons/svg/3011/3011288.svg" alt="profile-image">
                   <p class="pt-2"><span>#Lora298</span>
                   <br>
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                   </p>
               </div>
           </div>

           <div class="card rounded border-0 w-100 m-1 pd-1">
               <div class="card-body text-center">
                   <img src="https://www.flaticon.com/svg/static/icons/svg/3011/3011289.svg" alt="profile-image">
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

<!-- blank widget -->

<div id="accordion" role="tablist">
  <div class="card border-0 mt-5">
    <div class="grad" role="tab" id="headingOne">
      <h5 class="mb-0">
        <button type="button" class="btn m-0 p-0 bg-transparent text-left font-weight-bold text-white btn-block accordion-btn" data-toggle="collapse" data-target="#blankwidget"><h4 class="font-weight-normal">Blank widget</h4> </button>

      </h5>
    </div>
    <div id="blankwidget" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-body bg-light">
        <div class="forumslist shadow-sm bg-white mt-1 p-3">
<p><a href="https://www.youtube.com/watch?v=x2KRpRMSu4g&list=PLB2359E68D19BA3C0">The Who Playlist</a></p>

        </div>
        </div>
        <!-- end container-lg -->
    </div>
    <!-- end main container -->

</div>
</div>
</div>
</div>
</div>
</div>

<script src="./assets/js/script.js"></script>
<?php include_once "../includes/footer.php" ?>

