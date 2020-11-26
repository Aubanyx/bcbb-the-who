<?php
session_start();
require_once "../library/functions.php";
$dbh = connect();
$lasttopics = displayLastT();
$page = "Home";

include_once "../includes/header.php";
?>

    <!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">          
<nav aria-label="breadcrumb">
<ol class="breadcrumb bg-transparent pt-5">
<li class="breadcrumb-item"><a href="https://bcbb-thewho.herokuapp.com/"><i class="fas fa-home"></i> Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Board Index</li>
</ol>
</nav>








<div class="container-lg">

<div class="row">  

<div class="col-xl-9 themed-grid-col">
<h3>Topic Read (hot)</h3>
<div class="alert alert-danger" role="alert">
Forum rules
</div>


<div class="board-util d-flex pt-3">
 <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="submit">Post reply <i class="fas fa-reply"></i></button>
<!-- searchbar -->
<div class="dropdown">
  <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle"
          type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fas fa-wrench text-black-50"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <a class="dropdown-item" href="#!">Delete topic</a>
    <a class="dropdown-item" href="#!">Lock topic</a>
    <a class="dropdown-item" href="#!">Reply</a>
  </div>
</div>

    <div class="bg-light rounded rounded-pill border w-25 ml-3">
      <div class="input-group">
        <input type="search" placeholder="Search this topic..." aria-describedby="button-addon1" class="form-control  bg-light rounded rounded-pill border-0">
        <div class="input-group-append">          
          <button id="button-addon1" type="submit" class="btn btn-link text-primary border-right"><i class="fa fa-search magnifying-glass"></i></button>
          <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fas fa-cog cog"></i></button>

        </div>
      </div>
    </div>  
 <p class="ml-auto font-weight-normal greytext pt-2"> 3 replies · Page <strong>1</strong> of <strong>1</strong></p>

  <!-- /searchbar -->
  </div> 


<div class="themed-grid-col mt-4 p-3 rounded bg-light">
  <!-- post-reply -->
    <div class="row rounded bg-white p-4 m-0 mb-3">
   
        <div class="col-2 flex-column d-flex text-center">
          <img src="../assets/images/icons-users/svg/072-woman.svg" alt="profile-image" class="pb-3" style="height:75px;">
          <p class="h5 text-danger">PlanetStyles  <span class="h6 d-block text-secondary mb-3">Site Admin</span></p>
      
          <p class="h6"><span class="font-weight-bold">Posts :</span><span class="text-secondary"> 43</span></p>
          <p class="h6"><span class="font-weight-bold">Location :</span><span class="text-secondary"> UK</span></p>
        </div>


      <div class="col-10 flex-column">
        <div class="time-quote">
        <p class="my-4 h6 text-secondary"><i class="far fa-clock"></i> Sun Oct 09, 2016 6:03 pm
        <button type="button" class="btn bg-light rounded ml-3 rounded-pill border float-right" id="quote"><i class="fas fa-quote-left text-secondary"></i></button>
        </p>
        </div>
        <p class="py-3 h6">This is a topic that as the 'read' icons.</p>
        <p class="border-top py-3">This is a signature.</p>
      </div>

    </div>
<!-- / post-reply -->

  <!-- post-reply -->
  <div class="row rounded bg-white p-4 m-0 mb-3">
   
   <div class="col-2 flex-column d-flex text-center">
     <img src="../assets/images/icons-users/svg/072-woman.svg" alt="profile-image" class="pb-3" style="height:75px;">
     <p class="h5 text-danger">PlanetStyles  <span class="h6 d-block text-secondary mb-3">Site Admin</span></p>
 
     <p class="h6"><span class="font-weight-bold">Posts :</span><span class="text-secondary"> 43</span></p>
     <p class="h6"><span class="font-weight-bold">Location :</span><span class="text-secondary"> UK</span></p>
   </div>


 <div class="col-10 flex-column">
   <div class="time-quote">
   <p class="my-4 h6 text-secondary"><i class="far fa-clock"></i> Sun Oct 09, 2016 6:03 pm
   <button type="button" class="btn bg-light rounded ml-3 rounded-pill border float-right" id="quote"><i class="fas fa-quote-left text-secondary"></i></button>
   </p>
   </div>
   <p class="py-3 h6">This is a topic that as the 'read' icons.</p>
   <p class="border-top py-3">This is a signature.</p>
 </div>

</div>
<!-- / post-reply -->

    

</div>


<div class="board-util d-flex pt-3">
 <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="submit">Post reply <i class="fas fa-reply"></i></button>
<!-- searchbar -->
<div class="dropdown">
  <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle"
          type="button" id="dropdownMenu1" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fas fa-wrench text-black-50"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <a class="dropdown-item" href="#!">Delete topic</a>
    <a class="dropdown-item" href="#!">Lock topic</a>
    <a class="dropdown-item" href="#!">Reply</a>
  </div>
</div>

 <p class="ml-auto font-weight-normal greytext pt-2"> 3 replies · Page <strong>1</strong> of <strong>1</strong></p>

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
    <a class="dropdown-item" href="#!">Previous topic</a>
    <a class="dropdown-item" href="#!">Next topic</a>
    <a class="dropdown-item" href="#!">Previous forum</a>
    <a class="dropdown-item" href="#!">Next forum</a>
    <a class="dropdown-item" href="#!">Forum</a>
  </div>
</div>   
</div>

</div>

<!-- start of right side -->

    <?php include_once "../includes/sidebar.php" ?>


<!-- end of row -->
</div>       
<!-- end container-lg -->
</div>
<!-- end main container -->

</div>

<script src="./assets/js/script.js"></script>
<?php include_once "../includes/footer.php" ?>