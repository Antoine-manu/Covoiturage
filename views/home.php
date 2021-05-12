<?php 
?>
<form method="post">
    <div>
                <label class="h4" for="email">Nom</label>
                <input type="text" id="email" name="email" class="form-control"<?= isset($errors['lastname'])? 'is-invalid' : '';?>">
                <p class="<?= isset($errors['lastname'])? 'text-danger form-text mt-0' : '';?>">
                <?= isset($errors['lastname'])? $errors['lastname'] : '';?>
                </p>
    </div>
    <div>
                <label class="h4" for="email">Nom</label>
                <input type="text" id="email" name="password" class="form-control"<?= isset($errors['lastname'])? 'is-invalid' : '';?>">
                <p class="<?= isset($errors['lastname'])? 'text-danger form-text mt-0' : '';?>">
                <?= isset($errors['lastname'])? $errors['lastname'] : '';?>
                </p>
    </div>
    <div>
    <input type="submit">
    </div>
</form>


<?php
if(isset($_SESSION['user_id'])) {
    echo 'Bonjour'.$_SESSION['first_name'];
}
var_dump($_SESSION);