<?php
$title = "Ajout d'un rendez-vous";
$searchBar = FALSE;
?>

<div class="row mt-5">
    <div class="col-0 col-sm-3"></div>
    <div class="col-12 col-sm-6">
        <form action="/appointments/create" method="POST">
            <div class="my-3">
                <label for="dateHour" class="form-label">Date et heure du rendez-vous</label>
                <input type="datetime-local" class="form-control" name="dateHour" required>
            </div>
            <div class="mb-3">
                <label for="idPatients" class="form-label">Nom et prénom du patient</label>
                <select class="form-control" name="idPatients" required>
                    <option value="" disabled selected>--Choisir un patient--</option>
                    <?php foreach ($patients as $patient) : ?>
                        <option value="<?= $patient->getId() ?>"><?= $patient->getLastname() ?> <?= $patient->getFirstname() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
        </form>
    </div>
</div>