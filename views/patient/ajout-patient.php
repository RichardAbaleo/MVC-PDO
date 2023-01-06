<?php
$title = "Ajout d'un patient";
?>

<div class="row">
    <div class="col-0 col-sm-3"></div>
    <div class="col-12 col-sm-6">
        <form action="/patients/create" method="POST">
            <div class="my-3">
                <label for="mail" class="form-label">Adresse email</label>
                <input type="email" class="form-control" name="mail">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="birthdate">
            </div>
            <div class="mb-5">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="number" class="form-control" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>