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
<li class="breadcrumb-item"><a href="http://localhost/bcbb-the-who/index.php#"><i class="fas fa-home"></i> Home</a></li>
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
 
 ec ec ec !!!   

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