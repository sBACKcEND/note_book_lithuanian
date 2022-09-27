<?php

include("db.php");

$user = 'admin';
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $sql = "UPDATE notes SET type=?, note=?, time=? WHERE id=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$_POST['type'], $_POST['note'], $_POST['time'], $_POST['id']]);
    header("location:notes1.php");
    die();
}

$note = [];
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM notes WHERE id=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$_GET['id']]);
    $note = $stm->fetch(PDO::FETCH_ASSOC);
} else {
    header("location:notes1.php");
    die();
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
                <h4 class="text-white">Collapsed content</h4>
                <span class="text-muted">Toggleable via the navbar brand.</span>
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
            <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?= $note['id'] ?>">
                            <div class="mb-3">
                                <label for="" class="form-label">Tipas</label>
                                <select name="type" class="form-control" value="<?= $note['type'] ?>">
                                <option value="" disabled selected>Pasirinkite tipą...</option>
                                    <option value="susitikimas">Susitikimas</option>
                                    <option value="paskaita">Paskaita</option>
                                    <option value="dienoraštis">Dienoraštis</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Pastabos</label>
                                <input name="note" type="text" class="form-control" value="<?= $note['note'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Data ir laikas</label>
                                <input name="time" type="text" class="form-control" placeholder="0000-00-00 00:00:00" value="<?= $note['time'] ?>">
                            </div>
                            <button class="btn btn-success">Atnaujinti</button>
                            <a href="notes1.php" class="btn btn-info float-end">Atgal</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>