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
    <div class="row no-gutters py-3 text-black-50 align-items-center">
                     <div class="col-1 text-center"><i class="fas fa-check forumslist__green"></i></div>
                     <div class="col"><a href="https://bcbb-thewho.herokuapp.com/pages/topicRead.php">Won't Get Fooled Again</a>
                    <p class="text-secondary small">by <a href="#">Sandrine</a></p></div>

                     <div class="d-none d-md-block col-6">
                         <div class="row no-gutters pl-2 align-items-center">
                             <div class="col-3">25</div>
                             <div class="col-3">433</div>
                             <div class="media col-6 align-items-center"> 
                               <p>by <a href="#"">Sandrine</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
                               <span class="d-block">Sat Nov 20, 2020 7:10pm</span></p></div>
                          </div>
                      </div>
   </div>
         <!-- /sujet -->
     <!-- sujet -->
     <div class="row no-gutters py-3 text-black-50 align-items-center">
      <div class="col-1 text-center"><i class="fas fa-check forumslist__green"></i></div>
      <div class="col"><a href="https://bcbb-thewho.herokuapp.com/pages/topicRead.php">Who Are You</a>
     <p class="text-secondary small">by <a href="#">Auban</a></p></div>

      <div class="d-none d-md-block col-6">
          <div class="row no-gutters pl-2 align-items-center">
              <div class="col-3">21</div>
              <div class="col-3">327</div>
              <div class="media col-6 align-items-center"> 
                <p>by <a href="#"">Auban</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
                <span class="d-block">Sat Nov 20, 2020 7:20pm</span></p></div>
           </div>
       </div>
</div>
<!-- /sujet -->
     <!-- sujet -->
     <div class="row no-gutters py-3 text-black-50 align-items-center">
      <div class="col-1 text-center"><i class="fas fa-minus forumslist__grey"></i></div>
      <div class="col"><a href="https://bcbb-thewho.herokuapp.com/pages/topicRead.php">Anyway, Anyhow, Anywhere</a>
     <p class="text-secondary small">by <a href="#">Anne</a></p></div>

      <div class="d-none d-md-block col-6">
          <div class="row no-gutters pl-2 align-items-center">
              <div class="col-3">116</div>
              <div class="col-3">244</div>
              <div class="media col-6 align-items-center"> 
                <p>by <a href="#"">Anne</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
                <span class="d-block">Sat Nov 20, 2020 7:30pm</span></p></div>
           </div>
       </div>
</div>
<!-- /sujet -->
<!-- sujet -->
     <div class="row no-gutters py-3 text-black-50 align-items-center">
      <div class="col-1 text-center"><i class="fas fa-minus forumslist__grey"></i></div>
      <div class="col"><a href="#">Saturday Night's Alright for Fighting</a>
     <p class="text-secondary small">by <a href="#">Bastien</a></p></div>

      <div class="d-none d-md-block col-6">
          <div class="row no-gutters pl-2 align-items-center">
              <div class="col-3">89</div>
              <div class="col-3">188</div>
              <div class="media col-6 align-items-center"> 
                <p>by <a href="#"">Bastien</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
                <span class="d-block">Sat Nov 20, 2020 7:40pm</span></p></div>
           </div>
       </div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
  <div class="col-1 text-center"><i class="fas fa-times forumslist__red"></i></div>
  <div class="col"><a href="#">Baba o'Riley (Locked)</a>
 <p class="text-secondary small">by <a href="#">Sandrine</a></p></div>
 <p class="ml-auto greytext pr-4"><i class="fas fa-lock cog"></i></p>


  <div class="d-none d-md-block col-6">
      <div class="row no-gutters pl-2 align-items-center">
          <div class="col-3">109</div>
          <div class="col-3">203</div>
          <div class="media col-6 align-items-center"> 
            <p>by <a href="#"">Sandrine</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
            <span class="d-block">Sat Nov 20, 2020 7:50pm</span></p></div>
       </div>
   </div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
  <div class="col-1 text-center"><i class="fas fa-times forumslist__grey"></i></div>
  <div class="col"><a href="#">Dr. Jekyll and Mr. Hyde (Locked)</a>
 <p class="text-secondary small">by <a href="#">Auban</a></p></div>
 <p class="ml-auto greytext pr-4"><i class="fas fa-lock cog"></i></p>

  <div class="d-none d-md-block col-6">
      <div class="row no-gutters pl-2 align-items-center">
          <div class="col-3">299</div>
          <div class="col-3">563</div>
          <div class="media col-6 align-items-center"> 
            <p>by <a href="#"">Auban</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
            <span class="d-block">Sat Nov 20, 2020 8:00pm</span></p></div>
       </div>
   </div>
</div>
<!-- /sujet -->
<!-- sujet -->
     <div class="row no-gutters py-3 text-black-50 align-items-center">
      <div class="col-1 text-center"><i class="fas fa-minus forumslist__grey"></i></div>
      <div class="col"><a href="#">Summertime Blues</a>
     <p class="text-secondary small">by <a href="#">Anne</a></p></div>

      <div class="d-none d-md-block col-6">
          <div class="row no-gutters pl-2 align-items-center">
              <div class="col-3">256</div>
              <div class="col-3">540</div>
              <div class="media col-6 align-items-center"> 
                <p>by <a href="#"">Anne</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
                <span class="d-block">Sat Nov 20, 2020 8:10pm</span></p></div>
           </div>
       </div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
  <div class="col-1 text-center"><i class="fas fa-check forumslist__green"></i></div>
  <div class="col"><a href="#">Won't Get Fooled Again</a>
 <p class="text-secondary small">by <a href="#">Sandrine</a></p></div>

  <div class="d-none d-md-block col-6">
      <div class="row no-gutters pl-2 align-items-center">
          <div class="col-3">25</div>
          <div class="col-3">433</div>
          <div class="media col-6 align-items-center"> 
            <p>by <a href="#"">Sandrine</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
            <span class="d-block">Sat Nov 20, 2020 7:10pm</span></p></div>
       </div>
   </div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
<div class="col-1 text-center"><i class="fas fa-check forumslist__green"></i></div>
<div class="col"><a href="#">Who Are You</a>
<p class="text-secondary small">by <a href="#">Auban</a></p></div>

<div class="d-none d-md-block col-6">
<div class="row no-gutters pl-2 align-items-center">
<div class="col-3">21</div>
<div class="col-3">327</div>
<div class="media col-6 align-items-center"> 
<p>by <a href="#"">Auban</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
<span class="d-block">Sat Nov 20, 2020 7:20pm</span></p></div>
</div>
</div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
<div class="col-1 text-center"><i class="fas fa-minus forumslist__grey"></i></div>
<div class="col"><a href="#">Anyway, Anyhow, Anywhere</a>
<p class="text-secondary small">by <a href="#">Anne</a></p></div>

<div class="d-none d-md-block col-6">
<div class="row no-gutters pl-2 align-items-center">
<div class="col-3">116</div>
<div class="col-3">244</div>
<div class="media col-6 align-items-center"> 
<p>by <a href="#"">Anne</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
<span class="d-block">Sat Nov 20, 2020 7:30pm</span></p></div>
</div>
</div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
<div class="col-1 text-center"><i class="fas fa-minus forumslist__grey"></i></div>
<div class="col"><a href="#">Saturday Night's Alright for Fighting</a>
<p class="text-secondary small">by <a href="#">Bastien</a></p></div>

<div class="d-none d-md-block col-6">
<div class="row no-gutters pl-2 align-items-center">
<div class="col-3">89</div>
<div class="col-3">188</div>
<div class="media col-6 align-items-center"> 
<p>by <a href="#"">Bastien</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
<span class="d-block">Sat Nov 20, 2020 7:40pm</span></p></div>
</div>
</div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
<div class="col-1 text-center"><i class="fas fa-times forumslist__red"></i></div>
<div class="col"><a href="#">Baba o'Riley (Locked)</a>
<p class="text-secondary small">by <a href="#">Sandrine</a></p></div>
<p class="ml-auto greytext pr-4"><i class="fas fa-lock cog"></i></p>


<div class="d-none d-md-block col-6">
<div class="row no-gutters pl-2 align-items-center">
<div class="col-3">109</div>
<div class="col-3">203</div>
<div class="media col-6 align-items-center"> 
<p>by <a href="#"">Sandrine</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
<span class="d-block">Sat Nov 20, 2020 7:50pm</span></p></div>
</div>
</div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
<div class="col-1 text-center"><i class="fas fa-times forumslist__grey"></i></div>
<div class="col"><a href="#">Dr. Jekyll and Mr. Hyde (Locked)</a>
<p class="text-secondary small">by <a href="#">Auban</a></p></div>
<p class="ml-auto greytext pr-4"><i class="fas fa-lock cog"></i></p>

<div class="d-none d-md-block col-6">
<div class="row no-gutters pl-2 align-items-center">
<div class="col-3">299</div>
<div class="col-3">563</div>
<div class="media col-6 align-items-center"> 
<p>by <a href="#"">Auban</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
<span class="d-block">Sat Nov 20, 2020 8:00pm</span></p></div>
</div>
</div>
</div>
<!-- /sujet -->
<!-- sujet -->
<div class="row no-gutters py-3 text-black-50 align-items-center">
<div class="col-1 text-center"><i class="fas fa-minus forumslist__grey"></i></div>
<div class="col"><a href="#">Summertime Blues</a>
<p class="text-secondary small">by <a href="#">Anne</a></p></div>

<div class="d-none d-md-block col-6">
<div class="row no-gutters pl-2 align-items-center">
<div class="col-3">256</div>
<div class="col-3">540</div>
<div class="media col-6 align-items-center"> 
<p>by <a href="#"">Anne</a> <a href="#"><i class="fas fa-external-link-alt"></i></a>
<span class="d-block">Sat Nov 20, 2020 8:10pm</span></p></div>
</div>
</div>
</div>
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
    <?php include_once "../includes/sidebar.php" ?>
        <!-- end container-lg -->
    </div>
    <!-- end main container -->

</div>
</div></div></div></div></div>
<?php include_once "../includes/footer.php" ?>

