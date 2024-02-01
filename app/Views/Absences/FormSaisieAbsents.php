<div class="container-fluid" style="background-color: #eee; min-height: 100vh; padding: 16px 50px 50px 50px;">
    <h1 style="text-align:center;">Saisie des absents</h1>

    <div style="margin-top: 32px;">
        <?php echo form_open('saisieabsents/traitement'); ?>
        <div class="row">
            <div class="input-field col s4">
                <?php $data = array(
                    'type' => 'date',
                    'value' => set_value('inputDate'),
                    'required' => true,
                    'name' => 'inputDate'
                );
                ?>
                <?php echo form_input($data); ?>
                <?php validation_show_error('inputDate') ?>
            </div>

            <div class="input-field col s4">
                <?php
                $data = array(
                    'id' => 'selectRessource',
                    'name' => 'selectRessource',
                    'placeholder' => 'Choisir la ressource',
                );

                $optionsRessources = array();

                foreach ($ressources as $ressource) {
                    $optionsRessources[$ressource['idressource']] = $ressource['nomressource'];
                }

                echo form_dropdown($data, $optionsRessources, set_value('selectRessource'));
                validation_show_error('selectRessource');
                ?>
                <label>Choisir la ressource</label>
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
        <div class="input-field col s4">
            <?php
            $data = array(
                'id' => 'selectEtudiants',
                'name' => 'selectEtudiants',
                'placeholder' => 'Choisir les étudiants',
            );

            $optionsEtudiants = array();

            foreach ($etudiants as $etudiant) {
                $optionsEtudiants[$etudiant['idetudiant']] = $etudiant['nometudiant'] . ' ' . $etudiant['prenometudiant'];
            }

            echo form_multiselect('selectEtudiants[]', $optionsEtudiants, [], $data);
            validation_show_error('selectEtudiants[]');
            ?>
            <label>Etudiants concernés</label>
        </div>
        <div class="row center-align" style="padding-top: 32px;">
            <div class="input-file col s12">
                <a class="waves-effect waves-light btn">
                    <div><input type="submit" value="Confirmer" /></div>
                </a>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>