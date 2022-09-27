<?php

$user = 'admin';
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == 1)) {
    header("location:notes.php");
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

$sql = "SELECT id, type, note, time FROM notes ORDER by time";
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

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <a href="new.php" class="btn btn-primary mt-5">Sukurti įrašą</a>
                <div class="card mt-3">
                    <div class="card-header bg-dark text-white">
                        <h4>Mano užrašai</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notes as $note) { ?>
                                    <tr>
                                        <td><?= $note['type'] ?></td>
                                        <td><?= $note['note'] ?></td>
                                        <td><?= $note['time'] ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $note['id'] ?>" class="m-1 btn btn-success float-end">🖊️</a>
                                            <a href="notes1.php?action=delete&id=<?= $note['id'] ?>" class="m-1 btn btn-danger float-end">X</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>