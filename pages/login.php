<?php
session_start();
if(isset($_SESSION["user"])) {
    header("Location: profile.php");
}
require_once "../library/functions.php";
$dbh = connect();
if (!empty($_POST)) {
    $erreur = connexion();
}
$page = "Login";
include_once "../includes/header.php";
?>

<!-- forum body -->
<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pt-5 pb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent pt-1 pb-5">
            <li class="breadcrumb-item"><a href="/index.php"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
        <div class="container d-flex justify-content-center">
            <div class="card board-util border-0">
                <div class="card-body">
                    <form class="board-util-form p-5" method="post" action="">
                        <?php
                        if (isset($erreur)) :
                            if ($erreur) :
                                ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger"><?= $erreur ?></div>
                                    </div>
                                </div>
                            <?php
                            endif;
                        endif;
                        ?>
                        <label class="w-100 mt-3 text-secondary" for="username"><h5>Username</h5></label>
                        <div class="input-group border">
                            <div class="input-group-prepend pl-1">
                                <span class="input-group-text bg-transparent border-0" id="inputGroup-sizing-sm"><i
                                            class="fas fa-at"></i></span>
                            </div>
                            <input type="username" class="input100 border-0 form-control-plaintext p-3" type="text"
                                   placeholder="Username" name="username"
                                   value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>">
                            <span class="focus-input100"></span>
                        </div>

                        <label class="w-100 mt-4 text-secondary" for="password"><h5>Password</h5></label>
                        <div class="border rounded validate-input mt-2">
                            <input type="password" class="input100 border-0 form-control-plaintext p-3" type="text"
                                   placeholder="******" name="password"
                                   value="<?php if (isset($_POST["password"])) echo $_POST["password"] ?>">
                            <span class="focus-input100"></span>
                        </div>
                        <p class="float-right"><a href="#">Forgot password?</a></p>

                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label text-secondary pl-3 pt-1" for="defaultCheck1">
                                Remember me
                            </label>
                        </div>

                        <button class="btn text-white font-weight-bold btn-block my-4 border-0 rounded rounded-pill board-util__btn"
                                type="submit">Log in
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

<script src="/assets/js/script.js"></script>
<?php include_once "../includes/footer.php" ?>

