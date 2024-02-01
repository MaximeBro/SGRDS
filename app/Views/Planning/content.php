<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>

<section style="background-color: #eee; padding-top: 16px; min-height: 70vh;">
    <div class="container">
        <div class="row">
            <?php echo form_open('/accueil/filter'); ?>

            <div class="col s12 m12 l6 offset-l2">
                <div class="input-field">
                    <?php
                        $data = array('id' => 'selectedRessource', 'name' => 'selectedRessource');
                        $options[''] = 'Selectionner une ressource';
                        foreach($ressources as $ressource):
                            $options[$ressource['idressource']] = $ressource['nomressource'];
                        endforeach;

                        echo form_dropdown($data, $options, '');
                    ?>
                    <label>Type DS</label>
                </div>
            </div>

            <div class="col s12 m12 l4">
                <div class="input-field">
                    <?php
                        $data = array('id' => 'selectedSemestre', 'name' => 'selectedSemestre');
                        $options = array(
                                '' => 'Sélectionner un semestre',
                                'S1' => 'S1',
                                'S2' => 'S2',
                                'S3' => 'S3',
                                'S4' => 'S4',
                                'S5' => 'S5',
                                'S6' => 'S6',
                            );


                        echo form_dropdown($data, $options, '');
                    ?>
                </div>
                <?php $data = array('class' => 'btn', 'name' => 'submit', 'style' => 'margin: 16px 0; background-color: rgb(187,71,30);');
                    echo form_submit($data, 'Filtrer'); ?>
            </div>
        </div>

        <?php echo form_close(); ?>
        <div class="row" style="padding: 24px 0;">
            <div class="col-12">
                <table class="table table-striped highlight">
                    <thead>
                        <tr>
                            <th>État</th>
                            <th>Date</th>
                            <th>Semestre</th>
                            <th>Ressource</th>
                            <th>Étudiants</th>
                            <th>Commentaire</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($rattrapages as $rattrapage): ?>
                        <tr>
                            <td><?= $rattrapage['typerattrapage'] ?></td>
                            <td><?= $rattrapage['daterattrapage'] ?></td>
                            <td><?= $rattrapage['semestre'] ?></td>
                            <td>
                                <?php if (isset($linked_resources) && isset($linked_resources[$rattrapage['idressource']])): ?>
                                    <?= $linked_resources[$rattrapage['idressource']]['nomressource'] ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (isset($linked_students) && isset($linked_students[$rattrapage['idrattrapage']])): ?>
                                    <?php foreach($linked_students as $student): ?>
                                        <?= var_dump($student) ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= $rattrapage['commentairerattrapage'] ?>
                            </td>
                            <td>
                                <?php
                                if($session->get('role') === 'directeur')
                                {
                                    echo('<button type="button" class="btn-floating" href="/accueil/edit/'.$rattrapage['idrattrapage'].'" style="margin-left: 16px; background-color: rgb(187,71,30);"><i class="fas fa-pen" aria-hidden="true"></i></button>');
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
