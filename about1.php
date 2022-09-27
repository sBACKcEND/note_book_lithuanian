<?php

$user = 'admin';
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == 1)) {
    header("location:notes1.php");
    die();
}

?>

<?php

include("db.php");

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $sql = "SELECT * FROM notes WHERE id=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$_GET['id']]);
    $note = $stm->fetch(PDO::FETCH_ASSOC);

    $sql = "DELETE FROM notes WHERE id=?";
    $pstm = $pdo->prepare($sql);
    $pstm->execute([$_GET['id']]);
}

$sql = "SELECT id, type, note, time FROM notes";
$pstm = $pdo->prepare($sql);
$result = $pdo->query($sql);
$notes = $result->fetchAll(PDO::FETCH_ASSOC);

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
                <a href="about1.php">
                    <h6>Apie programėlę</h6>
                </a>
                <a href="contact1.php">
                    <h6>Kontaktai</h6>
                </a>
                <!-- <span class="text-muted">Toggleable via the navbar brand.</span> -->
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="text-white d-flex justify-content-end align-items-center">
                <span><?= "Sveiki, <b>$user</b>" ?> </span>
                <button type="button" class="btn btn-dark"> <a href="notes.php?logout=1">Atsijungti</a> </button>
            </div>
        </nav>
    </div>

    <div class="container w-50">
        <div class="row">
            <div class="col-md-12">
                <div class="card mx-auto mt-5 text-bg-dark bg-opacity-75">
                    <div class="card-body">
                        <h1 class="text-danger text-center mb-3">Užrašų knygutė</h1>
                        <div class="mb-5 text-center">
                            <p>Užrašų knygutė – tai speciali priemonė, kurioje užrašomos mintys, planai, darbai ir įvairūs sąrašai. Kiekvienas šią priemonę renkasi ir naudoja pagal individualius poreikius.<BR><BR>
                                <b>Kam naudoti?</b><BR>
                                Užrašų knygutė gali būti naudojama ne tik darbui, bet ir dienoraščiui ar universiteto užrašams. Nemažai žmonių renkasi kelias skirtingas užrašų knygas skirtingoms funkcijoms – viena skirta darbui, kita asmeniniams užrašams, mintims ir ateities planams.
                            </p>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="notes1.php" class="btn btn-success">Atgal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>