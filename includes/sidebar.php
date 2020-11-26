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
    <hr class="mb-4">
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
    <div class="card border-0 mt-5">
        <div class="grad mw-100">
            <h4 class="text-white font-weight-normal">Last posts</h4>
        </div>
        <div class="bg-light p-3 last-posts">
            <?php

            foreach($lasttopics as $lasttopic) :

            ?>
            <div class="last-posts__desc">
                <div class="card-text rounded bg-white mt-3 p-3""><h5><?= $lasttopic["topicSubject"]; ?>
                    <span class="float-right font-weight-normal pt-1"><?= $timeago=getTimeAgo(strtotime($lasttopic['topicDateUpdate']));

                        $lasttopic["topicDateUpdate"]; ?></span></h5>
                <?php
                $lastposts=displayPosts($lasttopic["topicId"]);
                foreach($lastposts as $lastpost) :

                ?>
                <p class="desc"><?= $lastpost["postContent"]; ?>
                <?php

        endforeach;
                ?>

            </div>
        </div>
        <?php

        endforeach;

        ?>
    </div>


</div>

<!-- /last posts -->

<!-- last active users -->
<div class="card border-0 mt-5">
    <div class="grad mw-100">
        <h4 class="text-white font-weight-normal">Last active users</h4>
    </div>
    <div class="card-body bg-light last-users">

        <div class="d-flex flex-row">
            <div class="card rounded border-0 w-100 m-1 pd-1">
                <div class="card-body text-center">

                    <img src="./assets/images/icons-users/svg/079-man.svg">

                    <p class="pt-2"><span>#Ben198</span>
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>

            <div class="card rounded border-0 w-100 m-1 pd-1">
                <div class="card-body text-center">
                    <img src="./assets/images/icons-users/svg/072-woman.svg" alt="profile-image">
                    <p class="pt-2"><span>#Lora298</span>
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>

            <div class="card rounded border-0 w-100 m-1 pd-1">
                <div class="card-body text-center">
                    <img src="./assets/images/icons-users/svg/026-woman.svg" alt="profile-image">
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
