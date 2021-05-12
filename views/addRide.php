<?php
require_once __DIR__ . '/libraries/database.php';
require 'functions.php';
$pdo = db_connect();
$href = "assets/css/addPath.css";

$error = false;
// Le formulaire a été soumis
if (!empty($_POST)) {

    // vérifie que le nom est bien renseigné
    if (empty($_POST['path'])) {
        $error = true;
    }

    if (!$error) {
        
        $starting_at = htmlentities($_POST['starting_at']);
        $going_to = htmlentities($_POST['going_to']);
        $dates = htmlentities($_POST['date']);
        $luggages = htmlentities($_POST['luggage']);
        $prices = htmlentities($_POST['price']);
        $seats = htmlentities($_POST['seats']);

        if (adduser($pdo, $starting_at , $luggages, $prices, $seats, $going_to, $dates)) {
            $success = true;
        }
    }
}

require_once 'inc/header.php';

?>



<main class="text-center">
    <div class="container pt-5">
        <?php if (isset($success)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>Trajet ajouté !</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif;?>
        <div class="row justify-content-center">
            <div class="col-md-5 bg-none p-3">
                <form class="form-horizontal text-light" action="" method="post">
                    <div class="mb-3">
                        <label class="mb-3" for="starting_at">Trajet (Départ)</label>
                        <input name="starting_at" class="form-control" id="starting_at" type="text">
                        <p class="mb-0 text-danger"><?=$error ? 'Le champ est requis' : ''?></p>
                    </div>

                    <div class="mb-3">
                        <label class="mb-3" for="going_to">Trajet (Arrivée)</label>
                        <input name="going_to" class="form-control" id="going_to" type="text">
                        <p class="mb-0 text-danger"><?=$error ? 'Le champ est requis' : ''?></p>
                    </div>

                    <div class="mb-3">
                        <label class="mb-3" for="birth_date">Date du trajet</label>
                        <input name="date" class="form-control" id="date" type="date">
                        <p class="mb-0 text-danger"><?=$error ? 'Le champ est requis' : ''?></p>
                    </div>

                    <div class="mb-3">
                        <label class="mb-3" for="selectbasic">Nombre de place</label>
                        <select name="seats" id="seats">
                            <option value="">Choisissez un nombre de place</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <p class="mb-0 text-danger"><?=$error ? 'Le champ est requis' : ''?></p>
                    </div>

                    <div class="mb-3">
                        <label class="mb-3" for="going_to">Prix</label>
                        <input name="price" class="form-control" id="price" type="text">
                        <p class="mb-0 text-danger"><?=$error ? 'Le champ est requis' : ''?></p>
                    </div>

                    <div class="mb-3">
                        <label class="mb-3" for="going_to">Bagages</label>
                        <input name="luggage" class="form-control" id="luggage" type="text">
                        <p class="mb-0 text-danger"><?=$error ? 'Le champ est requis' : ''?></p>
                    </div>

                    <input class="button" type="submit" value="Enregister">
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once 'inc/header.php';?>
</body>

</html>