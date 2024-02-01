<div>
    <h1 style="text-align:center;">Saisie d'un rattrapage</h1>

    <?php echo form_open('rattrapage/traitement'); ?>
        <div class="row">

            <div class="input-field col s4">
                <?php
                    $data = array(
                        'type' => 'datetime-local',
                        'name' => 'inputDate',
                        'placeholder' => 'Choisir une date',
                        'id' => 'datePick12'
                    );
                    
                    echo form_input($data);
                    validation_show_error('inputDate');
                ?>
                <label>Date du DS</label>
            </div>

            <div class="input-field col s4">
                <?php
                    $data = array(
                        'id' => 'selectType',
                        'name' => 'selectType',
                        'required' => true,
                    );
                    echo form_dropdown($data, array(
                        '' => 'Type du DS',
                        'Papier' => 'Papier',
                        'Machine' => 'Machine',
                    ));
                    validation_show_error('selectType');
                ?>
                <label>Type DS</label>
            </div>

            <div class="input-field col s4">
                <label>Durée du DS</label>
                <?php
                    $data = array(
                        'id' => 'selectDuree',
                        'name' => 'selectDuree',
                        'type' => 'number',
                        'class' => 'validate',
                        'min' => '1', 
                        'max' => '4',
                        'placeholder' => 'Durée du DS',
                        'required' => true,
                    );
                    echo form_input($data);
                    validation_show_error('selectDuree');
                ?>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s4">
                <?php
                    $data = array(
                        'id' => 'selectEtudiants',
                        'name' => 'selectEtudiants',
                        'placeholder' => 'Choisir les étudiants',
                        'multiple' => true,
                    );

                    $optionsEtudiants = array();

                    foreach ($etudiants as $etudiant) {
                        $optionsEtudiants[$etudiant['idetudiant']] = $etudiant['nometudiant']. ' ' . $etudiant['prenometudiant'];
                    }

                    echo form_dropdown('selectEtudiants[]', $optionsEtudiants, set_value('selectEtudiants'), $data);
                    validation_show_error('selectEtudiants[]');
                ?>
                <label>Etudiants concernés</label>
            </div>

            <div class="input-field col s4">
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
                <label>Choisir le semestre</label>
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
        </div>

        <div class="row">
            <div class="input-field col s4">
                <?php
                    $data = array(
                        'id' => 'selectProfesseur',
                        'name' => 'selectProfesseur',
                        'placeholder' => 'Professeur concerné',
                    );

                    $optionsEnseignants = array();

                    foreach($enseignants as $enseignant) {
                        $optionsEnseignants[$enseignant['idutilisateur']] = $enseignant['nomutilisateur'] . ' ' . $enseignant['prenomutilisateur'];
                    }

                    echo form_dropdown($data, $optionsEnseignants, set_value('selectProfesseur'));
                    validation_show_error('selectProfesseur');
                ?>
                <label>Choisir le professeur concerné</label>
            </div>

        </div>

        <div class="row">
            <div class="input-field col s12">
                <?php
                    $data = array(
                        'id' => 'txtCommentaire',
                        'name' => 'txtCommentaire',
                        'class' => 'materialize-textarea',
                        'required' => true,
                    );
                    echo form_textarea($data);
                    validation_show_error('txtCommentaire');
                ?>
                <label for="txtCommentaire">Commentaire</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <label for="cbMail">
                    <?php
                        $data = array(
                            'id' => 'cbMail',
                            'name' => 'cbMail',
                            'type' => 'checkbox',
                        );
                        echo form_checkbox($data);
                        validation_show_error('cbMail');
                    ?>
                    <span>Envoi d'un mail au professeur concerné avec la liste des étudiants absents (automatique)</span>
                </label>
            </div>
        </div>

        <div class="row" style="display:flex; justify-content:center; align-items:center;">
            <div class="input-field col s12">
                <a style="background-color: rgb(187,71,30);" class="waves-effect waves-light btn"><div><input type="submit" value="Confirmer"></div></a>
            </div>  
        </div>

    <?php echo form_close(); ?>

</div>