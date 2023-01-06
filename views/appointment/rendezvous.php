<?php
$title = "Détails rdv";
$searchBar = FALSE;
?>

<div class="row mt-5">
    <div class="col-0 col-sm-3"></div>
    <div class="col-12 col-sm-6">
        <form action="/appointments/update" method="POST">
            <div class="my-3">
                <label for="dateHour" class="form-label">Date et heure du rendez-vous</label>
                <input type="datetime-local" class="form-control" name="dateHour" value="<?= $appointment->getDateHour() ?>">
            </div>
            <div class="mb-5">
                <label for="idPatients" class="form-label">Nom et prénom du patient</label>
                <select class="form-control" name="idPatients" required>
                    <option value="<?= $appointment->getIdPatients() ?>" selected><?= $appointment->getPatientName($appointment->getIdPatients()) ?></option>
                    <?php foreach ($patients as $patient) : ?>
                        <?php if ($patient->getId() != $appointment->getIdPatients()) { ?>
                            <option value="<?= $patient->getId() ?>"><?= $patient->getLastname() ?> <?= $patient->getFirstname() ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="id" value="<?= $appointment->getId() ?>">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>