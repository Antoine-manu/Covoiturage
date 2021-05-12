<?php require_once ROOT.'/views/inc/header.php';
?>

<div class="wrapper container-sm">
    <h2 class="text-center">S'inscrire</h2>
    <form method="post">
        <div>
            <label class="h4" for="first_name">Prénom</label>
            <input type="text" id="first_name" name="first_name" class="form-control"<?= isset($errors['firstname'])? 'is-invalid' : '';?>">
            <p class="<?= isset($errors['firstname'])? 'text-danger form-text mt-0' : '';?>">
            <?= isset($errors['firstname'])? $errors['firstname'] : '';?>
            </p>
        </div>
        <div>
            <label class="h4" for="last_name">Nom</label>
            <input type="text" id="last_name" name="last_name" class="form-control"<?= isset($errors['lastname'])? 'is-invalid' : '';?>">
            <p class="<?= isset($errors['lastname'])? 'text-danger form-text mt-0' : '';?>">
            <?= isset($errors['lastname'])? $errors['lastname'] : '';?>
            </p>
        </div>
        <div>
            <label class="h4" for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control"<?= isset($errors['email'])? 'is-invalid' : '';?>">
            <p class="<?= isset($errors['email'])? 'text-danger form-text mt-0' : '';?>">
            <?= isset($errors['email'])? $errors['email'] : '';?>
            </p>
        </div>
        <div>
            <label class="h4" for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone" class="form-control"<?= isset($errors['phone'])? 'is-invalid' : '';?>">
            <p class="<?= isset($errors['phone'])? 'text-danger form-text mt-0' : '';?>">
            <?= isset($errors['phone'])? $errors['phone'] : '';?>
            </p>
        </div>
        <div>
            <label class="h4" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control"<?= isset($errors['password'])? 'is-invalid' : '';?>">
            <p class="<?= isset($errors['password'])? 'text-danger form-text mt-0' : '';?>">
            <?= isset($errors['password'])? $errors['password'] : '';?>
            </p>
        </div>
        <button type="submit" class="btn-success">Submit</button>
    </form>
</div>

<?php require_once ROOT.'/views/inc/footer.php';