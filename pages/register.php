<?php include_once "../includes/header.php" ?>

<!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pt-5 pb-5">
    <p class="pl-5 pb-3"><a href="http://localhost/bcbb-the-who/index.php#"><i class="fas fa-home"></i> Home</a></p>
    <div class="container-lg board-util">
        <h1 class="pl-5"><i class="far fa-arrow-alt-circle-right"></i> Register</h1>
        <h2 class="pl-5 text-muted">Join the community</h2>
        <div class="container d-flex justify-content-center pt-5">
            <div class="card board-util w-50">
                <div class="card-header text-white gradient">
                    <h4>Sign in</h4>
                </div>
                <div class="card-body">
                    <form class="p-5">
                        <label class="w-100 mt-3 text-secondary" for="first-name"><h5>Tell us your name</h5></label>
                        <div class="border rounded validate-input mt-2" data-validate="Type first name">
                            <input class="input100 border-0 form-control-plaintext p-3" type="text"
                                   placeholder="First name">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="border rounded validate-input mt-2" data-validate="Type last name">
                            <input class="input100 border-0 form-control-plaintext p-3" type="text"
                                   placeholder="Last name">
                            <span class="focus-input100"></span>
                        </div>

                        <hr>

                        <label class="w-100 mt-3 text-secondary" for="username"><h5>Username</h5></label>
                        <div class="input-group border">
                            <div class="input-group-prepend pl-1">
                                <span class="input-group-text bg-transparent border-0" id="inputGroup-sizing-sm">
                                    <i class="fas fa-at"></i></span>
                            </div>
                            <input type="username" class="input100 border-0 form-control-plaintext p-3"" type="text"
                            placeholder="Username">
                            <span class="focus-input100"></span>
                        </div>

                        <label class="w-100 mt-4 text-secondary" for="email"><h5>Enter your email</h5></label>
                        <div class="border rounded validate-input mt-2"
                             data-validate="Valid email is required: ex@abc.xyz">
                            <input id="email" class="input100 border-0 form-control-plaintext p-3"" type="text"
                            name="email" placeholder="Eg. example@email.com">
                            <span class="focus-input100"></span>
                        </div>

                        <label class="w-100 mt-4 text-secondary" for="email"><h5>Password</h5></label>
                        <div class="border rounded validate-input mt-2">
                            <input type="password" class="input100 border-0 form-control-plaintext p-3" type="text"
                                   placeholder="******">
                            <span class="focus-input100"></span>
                        </div>

                        <small id="passwordHelpBlock" class="form-text greytext">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not
                            contain spaces, special characters, or emoji.
                        </small>

                        <label class="w-100 mt-4 text-secondary" for="email"><h5>Confirm password</h5></label>
                        <div class="border rounded validate-input mt-2">
                            <input type="password" class="input100 border-0 form-control-plaintext p-3" type="text"
                                   placeholder="******">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label text-secondary pl-3 pt-1" for="defaultCheck1">
                                I agree with the to the Board <a href="#">Terms of Service</a> and <a href="#">Privacy
                                    Policy</a>.
                            </label>
                        </div>

                        <button class="btn text-white font-weight-bold btn-block my-4 border-0 rounded rounded-pill board-util__btn"
                                type="submit">Sign in
                        </button>
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

<script src="/bcbb-the-who/assets/js/script.js"></script>
<?php include_once "../includes/footer.php" ?>

