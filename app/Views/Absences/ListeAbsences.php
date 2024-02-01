<?php
    $session = \Config\Services::session();
?>

<script>
    $(document).ready(function(){
        $('.tooltipped').tooltip();
    });
</script>
<section style="background-color: #eee; padding-top: 16px; min-height: 100vh;">
    <div class="row center-align">
        <h1>Liste des absences</h1>
    </div>
    <div class="row" style="padding: 16px 50px;">
        <div class="col s12">
            <table>
                <thead>
                    <tr>
                        <th>Semestre</th>
                        <th>Date</th>
                        <th>Ressource</th>
                        <th>Étudiants</th>
                        <?php
                        if($session->get('role') === 'enseignant')
                        {
                            echo('<th>Actions</th>');
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($absences as $absence): ?>
                    <tr>
                        <td><?= $absence['semestre'] ?></td>
                        <td><?= $absence['daterattrapage'] ?></td>
                        <td><?= $ressources[$absence['idabsence']]['nomressource'] ?></td>
                        <td>
                            <?php if (isset($linked_etudiants) && isset($linked_etudiants[$absence['idabsence']])): ?>
                                <?php foreach($linked_etudiants[$absence['idabsence']] as $etudiant): ?>
                                    <?= $etudiants[$etudiant['idetudiant']]['nometudiant'] ?>
                                    <?= $etudiants[$etudiant['idetudiant']]['prenometudiant'] ?>,<br>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <?php
                        if($session->get('role') === 'enseignant')
                        {
                            echo('<td><a class="btn-floating tooltipped" data-position="bottom" data-tooltip="Saisir rattrapage" href="/rattrapage/saisie/'.$absence['semestre'].'/'.$absence['idressource'].'/'.$linked_etudiants[$absence['idabsence']].'"><i class="fas fa-plus" aria-hidden="true"></i></a></td>');
                        }
                        ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>