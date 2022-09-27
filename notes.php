<?php
setcookie("labas", "sharunas", time() + 60);
session_start();
if (isset($_POST['user']) && isset($_POST['password'])) {
    if ($_POST['user'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['login'] = 1;
        $_SESSION['user'] = $_POST['user'];
        setcookie('user', $_POST['user'], time() + 3600);
        header("location:notes1.php");
        die();
    }
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if (md5($password) == 'd41d8cd98f00b204e9800998ecf8427e') {
    } else {
        echo '<script>alert("Neteisingas prisijungimo vardas arba slaptažodis")</script>';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    // unset($_SESSION);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <a href="about.php">
                    <h6>Apie programėlę</h6>
                </a>
                <a href="contact.php">
                    <h6>Kontaktai</h6>
                </a>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>

    <div class="container w-50">
        <div class="row">
            <div class="col-md-12">
                <div class="card mx-auto mt-5 text-bg-dark bg-opacity-75">
                    <div class="card-body">
                        <h1 class="text-danger text-center mb-3">Užrašų knygutė</h1>
                        <form action="" method="post">
                            <div class="mb-5 text-center">
                                <h4>Užrašų knygutė gali būti naudojama ne tik darbui,<BR>
                                    bet ir dienoraščiui<BR> ar universiteto užrašams!</h4>
                            </div>
                            <div class="mb-3 text-center">
                                <input class="mb-1" type="text" name="user" placeholder="vartotojo vardas" required> <br>
                                <input class="mb-1" type="password" name="password" placeholder="slaptažodis" required> <br>
                                <button type="submit" class="btn btn-success">Prisijungti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>