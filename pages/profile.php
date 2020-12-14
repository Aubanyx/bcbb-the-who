<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
require_once "../library/functions.php";
$dbh = connect();
if (!empty($_POST)) {
    $erreurs = changeInfosProfile($_POST);
}
//if (!empty($_POST)) {
//    $upload = upload();
//}
$infos = infos();
$page = "Profile";
include_once "../includes/header.php";
?>
<!-- forum body -->
<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pt-5 pb-5">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent pt-1 pb-5">
            <li class="breadcrumb-item"><a href="/index.php"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
        <h1 class="pl-5"><i class="far fa-arrow-alt-circle-right"></i> Profile</h1>
        <h2 class="pl-5 text-muted">Edit and personalize your profile </h2>
        <?php
        if (isset($erreurs)) :
            if ($erreurs) :
                foreach($erreurs as $erreur) :
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-danger"><?= $erreur ?></div>
                        </div>
                    </div>
                <?php
                endforeach;
            else :
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                            Vos changements ont bien été pris en compte !
                        </div>
                    </div>
                </div>
            <?php
            endif;
        endif;
        ?>
    <div class="container d-flex justify-content-center">
            <div class="card border-0 w-100">
                <div class="card-body board-util">
                    <form class="p-1" action="" method="post" enctype="multipart/form-data">
                        <div class="d-flex bg-light rounded align-items-center justify-content-center py-3 profilesettings">
                        
                        <img src="
                        <?php

                        if (!empty($infos["userImage"])) {
                                echo "data:image/jpeg;base64," . $infos['userImage'];
                        }
                        else {
                            echo "https://www.gravatar.com/avatar/".md5(strtolower(trim($infos['userEmail'])))."?"."&s=80";
                        }
                        ?>
                        ">
                            
                            <div class="pl-sm-4 pl-2 img-fluid text-secondary"><p
                                        class="display-4 pb-2 text-dark"><?= $infos["userFname"] . " " . $infos["userLname"] ?></p>
                                <p class="h4"><?= $infos["userNname"] ?><span class="badge badge-light">
                                        <?php
                                        if ($infos["userLevel"] == 2) {
                                            echo "Admin";
                                        } else if ($infos["userLevel"] == 1) {
                                            echo "Modo";
                                        } else {
                                            echo "Member";
                                        }
                                        ?>
                                    </span></p>
                                <p><?= $infos["userEmail"] ?></p>
                            </div>
                        </div>
                        <div class="profilepic bg-light justify-content-center d-flex pb-5 border-bottom text-secondary">
                            <div class="w-25">
                                <h5>Profile picture</h5>
                                <p class="text-secondary small">Accepted file type .png. Less than 1MB</p>
                                <input type="file" class="form-control-file pt-2 w-50" id="exampleFormControlFile1" name="file">
                            </div>
                            <button class="btn text-white font-weight-bold my-4 border-0 rounded rounded-pill board-util__btn"
                                    type="submit" name="upload">Upload
                            </button>
                        </div>

                        <!-- personal infos + contact infos -->
                        <div class="d-flex flex-sm-row flex-column">
                            <div class="personalinfos p-5 flex-fill border-right">
                                <label class="w-100 mt-3 text-secondary" for="first-name"><h5>Your name</h5></label>

                                <div class="border rounded validate-input mt-2" data-validate="Type first name">
                                    <input class="input100 border-0 form-control-plaintext p-3" type="text" name="fName"
                                           placeholder="<?= $infos["userFname"] ?>"
                                           value="<?php if (isset($_POST["fName"])) echo $_POST["fName"] ?>">
                                    <span class="focus-input100"></span>
                                </div>

                                <div class="border rounded validate-input mt-2" data-validate="Type last name">
                                    <input class="input100 border-0 form-control-plaintext p-3" type="text" name="lName"
                                           placeholder="<?= $infos["userLname"] ?>"
                                           value="<?php if (isset($_POST["lName"])) echo $_POST["lName"] ?>">
                                    <span class="focus-input100"></span>
                                </div>

                                <label class="w-100 mt-4 text-secondary" for="username"><h5>Username</h5></label>
                                <div class="input-group border">
                                    <div class="input-group-prepend pl-1">
                                    <span class="input-group-text bg-transparent border-0" id="inputGroup-sizing-sm">
                                        <i class="fas fa-at"></i></span>
                                    </div>
                                    <input id="username" class="input100 border-0 form-control-plaintext p-3"
                                           type="text" name="username"
                                           placeholder="<?= $infos["userNname"] ?>"
                                           value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>">
                                    <span class="focus-input100"></span>
                                </div>

                                <label class="w-100 mt-3 text-secondary" for="email"><h5>Email</h5></label>
                                <div class="border rounded validate-input mt-2"
                                     data-validate="Valid email is required: ex@abc.xyz">
                                    <input id="email" class="input100 border-0 form-control-plaintext p-3" type="text"
                                           name="email" placeholder="<?= $infos["userEmail"] ?>"
                                           value="<?php if (isset($_POST["email"])) echo $_POST["email"] ?>">
                                    <span class="focus-input100"></span>
                                </div>

                                <!-- change password -->
                                <div id="accordion" role="tablist">
                                    <div class="card border-0 mt-5">
                                        <div class="card-header p-0 bg-white" role="tab" id="headingOne">
                                            <button type="button"
                                                    class="btn m-0 p-0 bg-transparent text-left font-weight-bold text-secondary btn-block accordion-btn"
                                                    data-toggle="collapse" data-target="#blankwidget"><h5>Change
                                                    password?</h5></button>
                                        </div>
                                        <div id="blankwidget" class="collapse" data-parent="#accordion" role="tabpanel"
                                             aria-labelledby="headingOne">
                                            <div class="card-body bg-light">
                                                <div class="mt-1">

                                                    <label class="w-100 text-secondary" for="password"><h5>Current
                                                            password</h5></label>
                                                    <div class="border rounded validate-input mt-2">
                                                        <input type="password"
                                                               class="input100 border-0 form-control-plaintext p-3"
                                                               type="text" placeholder="******" name="currentPass"
                                                               value="<?php if (isset($_POST["currentPass"])) echo $_POST["currentPass"] ?>">
                                                        <span class="focus-input100"></span>
                                                    </div>

                                                    <label class="w-100 pt-3 text-secondary" for="password1"><h5>New
                                                            password</h5></label>
                                                    <div class="border rounded validate-input mt-2">
                                                        <input type="password"
                                                               class="input100 border-0 form-control-plaintext p-3"
                                                               placeholder="******" id="password1" name="newPass"
                                                               value="<?php if (isset($_POST["newPass"])) echo $_POST["newPass"] ?>">
                                                        <span class="focus-input100"></span>
                                                    </div>

                                                    <label class="w-100 pt-3 text-secondary" for="password2"><h5>Confirm
                                                            new
                                                            password</h5></label>
                                                    <div class="border rounded validate-input mt-2">
                                                        <input type="password"
                                                               class="input100 border-0 form-control-plaintext p-3"
                                                               placeholder="******" id="password2" name="newPassConf"
                                                               value="<?php if (isset($_POST["newPassConf"])) echo $_POST["newPassConf"] ?>">
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
                                <label class="w-100 mt-4 text-secondary" for="birthday"><h5>Date of Birth</h5></label>
                                <div class="border rounded validate-input input-with-post-icon datepicker">
                                    <input id="birthday" class="input100 border-0 form-control-plaintext p-3"
                                           type="date" name="birthday"
                                           value="<?= $infos["userBirthday"]?>">
                                    <span class="focus-input100"></span>
                                </div>

                                <label class="w-100 mt-3 text-secondary" for="location"><h5>Location</h5></label>

                                <div class="border rounded validate-input mt-2" data-validate="Type your location">
                                    <input class="input100 border-0 form-control-plaintext p-3" type="text"
                                           placeholder="<?= $infos["userLocation"] ?>" name="location"
                                           value="<?php if (isset($_POST["location"])) echo $_POST["location"] ?>">
                                    <span class="focus-input100"></span>
                                </div>

                                <label class="w-100 mt-3 text-secondary" for="mood"><h5>Mood</h5></label>

                                <div class="border rounded validate-input mt-2" data-validate="Type your location">
                                    <input class="input100 border-0 form-control-plaintext p-3" type="text"
                                           placeholder="<?= $infos["userMood"] ?>" name="mood"
                                           value="<?php if (isset($_POST["mood"])) echo $_POST["mood"] ?>">
                                    <span class="focus-input100"></span>
                                </div>

                                <label class="w-100 mt-3 text-secondary" for="sign"><h5>Signature</h5></label>
                                <div class="border rounded validate-input mt-2"
                                     data-validate="Valid email is required: ex@abc.xyz">
                                <textarea class="input100 border-0 form-control-plaintext p-3" placeholder="<?= $infos["userSign"] ?>" name="sign"
                                          id="exampleFormControlTextarea1"><?php if (isset($_POST["sign"])) echo $_POST["sign"] ?></textarea>
                                    <span class="focus-input100"></span>
                                </div>
                            </div>
                        </div>
                        <!-- / personal infos + contact infos -->
                        <div class="text-center pt-3">
                            <button class="btn w-25 text-white font-weight-bold my-4 border-0 rounded rounded-pill board-util__btn m-auto"
                                    type="submit" name="submitProfile">Save Changes
                            </button>
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
<?php include_once "../includes/footer.php" ?>
