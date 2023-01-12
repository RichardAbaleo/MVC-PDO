<?php
$title = "Ajout d'un patient avec rendez vous";
$searchBar = FALSE;
?>

<div class="row">
    <div class="col-0 col-sm-3"></div>
    <div class="col-12 col-sm-6">
        <form action="/patient-appointment/create" method="POST">
            <div class="my-3">
                <label for="mail" class="form-label">Adresse email</label>
                <input type="email" class="form-control" name="mail" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="birthdate" required>
            </div>
            <div class="mb-5">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="number" class="form-control" name="phone">
            </div>
            <div class="my-3">
                <label for="dateHour" class="form-label">Date et heure du rendez-vous</label>
                <input type="datetime-local" class="form-control" name="dateHour" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
        </form>
    </div>
</div>