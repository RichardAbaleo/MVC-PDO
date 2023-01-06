<?php
$title = "Profil";
$searchBar = FALSE;
?>

<div class="row mt-3">
    <div class="col-0 col-lg-3"></div>
    <div class="col-12 col-lg-6">
        <form action="/patients/update" method="POST">
            <div class="my-3">
                <label for="mail" class="form-label">Adresse email</label>
                <input type="email" class="form-control" name="mail" value="<?= $patient->getMail() ?>">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname" value="<?= $patient->getLastname() ?>">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstname" value="<?= $patient->getFirstname() ?>">
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="birthdate" value="<?= $patient->getBirthdate() ?>">
            </div>
            <div class="mb-5">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="number" class="form-control" name="phone" value="<?= $patient->getPhone() ?>">
            </div>
            <input type="hidden" name="id" value="<?= $patient->getId() ?>">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>

<div class="row mt-4">
    <div class="col-0 col-lg-3"></div>
    <div class="col-12 col-lg-6">
        <ol class="list-group">
            <?php foreach ($appointments as $appointment) : ?>


                <li class="list-group-item justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <p><b>Date et heure du rendez vous:</b> <?= $appointment->getDateHour() ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>