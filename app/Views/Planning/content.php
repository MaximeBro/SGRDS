<script>
    $(document).ready(function() {
        $('select').formSelect();
    });

    $(document).ready(function() {
        $('.tooltipped').tooltip();
    });
</script>

<section style="background-color: #eee; padding-bottom: 50px; padding-top: 16px; min-height: 100vh;">
    <div class="container">
        <div class="row center-align">
            <h1>Liste des rattrapages</h1>
        </div>
        <div class="row">
            <?php echo form_open('/accueil/filter'); ?>

            <div class="col s12 m12 l6">
                <div class="input-field">
                    <select multiple name="selectedStudents">
                        <option disabled selected>Sélectionner des étudiants</option>
                        <?php foreach($available_students as $available_student): ?>
                            <?= '<option value="'.$available_student['idetudiant'].'">'.$available_student['nometudiant'].' '.$available_student['prenometudiant'].'</option>' ?>
                        <?php endforeach; ?>
                    </select>
                    <label>Étudiants</label>
                </div>
            </div>

            <div class="col s12 m12 l6">
                <div class="input-field">
                    <select name="selectedRessource">
                        <option disabled selected>Sélectionner une ressource</option>
                        <?php foreach($ressources as $ressource): ?>
                            <?= '<option value="'.$ressource['idressource'].'">'.$ressource['nomressource'].'</option>' ?>
                        <?php endforeach; ?>
                    </select>
                    <label>Ressource</label>
                </div>
            </div>

            <div class="col s12 m8 l4">
                <div class="input-field">
                    <select name="selectedSemestre">
                        <option disabled selected>Sélectionner un semestre</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="S4">S4</option>
                        <option value="S5">S5</option>
                        <option value="S6">S6</option>
                    </select>
                    <label>Semestre</label>
                </div>
            </div>

            <div class="col s12 m4 l4 center-align">
                <?php $data = array('class' => 'btn', 'name' => 'submit', 'style' => 'margin: 16px 0; background-color: rgb(187,71,30);');
                echo form_submit($data, 'Filtrer'); ?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="row" style="padding: 16px 50px; padding-bottom: 100px; overflow-x: auto;">
        <div class="col-12" style="overflow-x: auto;">
            <table class="table table-striped highlight">
                <thead>
                <tr>
                    <th class="center-align">État</th>
                    <th>Date</th>
                    <th class="center-align">Semestre</th>
                    <th class="center-align">Ressource</th>
                    <th>Étudiants (justifiés)</th>
                    <th>Commentaire</th>
                    <th class="center-align">Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($rattrapages as $rattrapage): ?>
                    <tr>
                        <td><?= $rattrapage['typerattrapage'] ?></td>
                        <td><?= $rattrapage['daterattrapage'] ?></td>
                        <td class="center-align"><?= $rattrapage['semestre'] ?></td>
                        <td>
                            <?php if (isset($linked_resources) && isset($linked_resources[$rattrapage['idressource']])): ?>
                                <?= $linked_resources[$rattrapage['idressource']]['nomressource'] ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (isset($linked_students) && isset($linked_students[$rattrapage['idrattrapage']])): ?>
                                <?php foreach($linked_students[$rattrapage['idrattrapage']] as $student): ?>
                                    <?= $students[$student['idetudiant']]['nometudiant'] ?>
                                    <?= $students[$student['idetudiant']]['prenometudiant'] ?>,<br>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?= $rattrapage['commentairerattrapage'] ?>
                        </td>
                        <td>
                            <div style="display: flex; flex-direction: row;">
                                <?php
                                if($session->get('role') === 'directeur')
                                {
                                    echo('<a class="btn-floating tooltipped" data-position="bottom" data-tooltip="Éditer" href="/accueil/edit/'.$rattrapage['idrattrapage'].'" style="margin-left: 16px;"><i class="fas fa-pen" aria-hidden="true"></i></a>');
                                }
                                ?>
                                <?php
                                if($session->get('role') === 'directeur')
                                {
                                    echo('<a class="btn-floating tooltipped" data-position="bottom" data-tooltip="Supprimer" href="/accueil/delete/'.$rattrapage['idrattrapage'].'" style="margin-left: 16px;"><i class="fas fa-trash" aria-hidden="true"></i></a>');
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
