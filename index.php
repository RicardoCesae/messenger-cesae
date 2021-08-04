<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensageiro do cesae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>



<body class="container-fluid">


    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row g-3" id="form">
                            <div class="col-md-12">
                                <label for="form-username" class="form-label">User name</label>
                                <input type="text" class="form-control" id="form-username" name="form-username">
                            </div>
                            <div class="col-md-12">
                                <label for="form-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="form-password" name="form-password">
                            </div>
                            <div class="col-md-12" id="extraPassCheck"></div>
                            <div class="col-md-12">
                                <label style="color: red;" class="form-label">
                                    <?php
                                    session_start();
                                    if (isset($_SESSION['login']) && $_SESSION['login'] == "username") {
                                        echo "User name  wrong. Try again";
                                        $_SESSION['login'] = -1;
                                    } else if (isset($_SESSION['login']) && $_SESSION['login'] == "password") {
                                        echo "Password  wrong. Try again";
                                        $_SESSION['login'] = -1;
                                    }
                                    ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" id="signInBt" value="Register">
                        <input type="submit" formaction="login.php" class="btn btn-primary" value="Log in" id="loginBT">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="signInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sign in</h5>
                </div>
                <form method="post" action="register.php" id="signInform">
                    <div class="modal-body">
                        <div class="row g-3" id="form">
                            <div class="col-md-12">
                                <label for="form-username" class="form-label">User name</label>
                                <input type="text" class="form-control" id="form-username" name="form-username">
                            </div>
                            <div class="col-md-12">
                                <label for="form-password1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="form-password1" name="form-password1">
                            </div>
                            <div class="col-md-12">
                                <label for="form-password2" class="form-label">Confirm password</label>
                                <input type="password" class="form-control" id="form-password2" name="form-password2">
                            </div>
                            <div class="col-md-12" id="extraPassCheck"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" value="Go to login" id="backLoginBt">
                        <input type="button" class="btn btn-primary" value="I confirm" id="confirmSignInBT">     
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="scriptIndex.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>