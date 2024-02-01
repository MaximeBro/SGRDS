<h1 style="text-align:center;">Saisie des absents</h1>

<div class="wrapper" style="padding-top: 32px;padding-left: 64px;padding-right: 64px;">
    <?php echo form_open('saisieabsents/traitement'); ?>
        <div class="row">
            <div class="input-field col s4">
                <?php $data = array(
                    'type' => 'date',
                    'value' => set_value('inputDate'),
                    'required' => true,
                    'name' => 'inputDate');
                ?>
                <?php echo form_input($data); ?>
                <?php validation_show_error('inputDate') ?>
            </div>

            <div class="full-width" style="padding-left:32px;padding-right:32px">
                <div class="input-field col s4">
                    <?php $data = array(
                        'value' => set_value('ressource'),
                        'required' => true,
                        'name' => 'ressource'
                        );

                        $options = array('' => 'Choisir la ressource concernée');

                        foreach ($ressources as $ressource) {
                            $options[$ressource['idressource']] = $ressource['nomressource'];
                        }

                        echo form_dropdown('ressource', $options, set_value('ressource'));
                    ?>
                    <?php validation_show_error('ressource') ?>
                    <label>Ressource concernée</label>
                </div>
            </div>

            <div class="full-width">
                <div class="input-field col s4" style="padding-right:0px;">
                    <?php
                        $data = array(
                            'id' => 'selectSemestre',
                            'name' => 'selectSemestre',
                            'placeholder' => 'Choisir le semestre',
                        );

                        echo form_dropdown($data, array(
                            'S1' => 'S1',
                            'S2' => 'S2',
                            'S3' => 'S3',
                            'S4' => 'S4',
                            'S5' => 'S5',
                            'S6' => 'S6',
                        ));
                        validation_show_error('selectSemestre');
                    ?>
                    <label>Semestre</label>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 32px;">
            <div class="input-field col s12">
                <?php $data = array(
                    'value' => set_value('etudiants'),
                    'required' => true,
                    'name' => 'etudiants',
                    'multiple' => true
                    );

                    $options = array('' => 'Choisir les étudiants');

                    foreach ($etudiants as $etudiant) {
                        $options[$etudiant['idetudiant']] = $etudiant['nometudiant']. ' ' . $etudiant['prenometudiant'];
                    }

                    echo form_dropdown('etudiants', $options, set_value('etudiants'));
                ?>
                <label>Elève(s) absent(s)</label>
                <?php validation_show_error('etudiants') ?>
            </div>
        </div>

        <div class="row center-align" style="padding-top: 32px;">
            <div class="input-file col s12">
                <a class="waves-effect waves-light btn"><div><input type="submit" value="Confirmer"/></div></a>
            </div>
        </div>
    <?php echo form_close(); ?>
</div>