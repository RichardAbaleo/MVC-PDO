<?php
$title = "Liste des patients";
$searchBar = FALSE;
?>

<div class="row mt-5">
    <div class="col-0 col-lg-3"></div>
    <div class="col-12 col-lg-6">

        <ol class="list-group">
            <?php foreach ($appointments as $appointment) : ?>
                <li class="list-group-item justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <p><b>Date et heure du rendez vous:</b> <?= $appointment->getDateHour() ?></p>
                        <p><b>Nom du patient:</b> <?= $appointment->getPatientName($appointment->getIdPatients()) ?></p>
                        <form action="/appointments/delete" method="POST">
                            <a type="button" class="btn btn-primary mb-2" href="/appointments/details?id=<?= $appointment->getId() ?>">Détails</a>
                            <input type="hidden" name="id" value="<?= $appointment->getId() ?>">
                            <button type="submit" class="btn btn-danger mb-2">Supprimer</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>