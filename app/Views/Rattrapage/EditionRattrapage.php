<div style="background-color: #eee; padding: 16px 50px 50px 50px; min-height: 100vh;">
    <div class="row center-align">
        <h1>Édition d'un rattrapage</h1>
    </div>

    <?php echo form_open('rattrapage/edition'); ?>
    <div class="row">
        <?php $data = array(
            'name' => 'hiddenID',
            'value' => $idrattrapage,
            'style' => 'display: none; visibility: hidden;'
        );
        echo form_input($data);
        ?>

        <div class="input-field col s4">
            <?php
            $date = $savedDate ?? '';
            $data = array(
                'type' => 'datetime-local',
                'name' => 'inputDate',
                'id' => 'datePick12',
                'value' => $date
            );

            echo form_input($data);
            validation_show_error('inputDate');
            ?>
        </div>

        <div class="input-field col s4">
            <?php
            $selectedType = $type ?? '';
            $data = array(
                'id' => 'selectType',
                'name' => 'selectType',
                'required' => true,
                'selected' => $selectedType
            );
            echo form_dropdown($data, array(
                '' => 'Type du rattrapage',
                'Papier' => 'Papier',
                'Machine' => 'Machine',
            ));
            validation_show_error('selectType');
            ?>
            <label>Type rattrapage</label>
        </div>

        <div class="input-field col s4">
            <label>Durée rattrapage</label>
            <?php
            $duree = $dureerattrapage ?? 0;
            $data = array(
                'id' => 'selectDuree',
                'name' => 'selectDuree',
                'type' => 'number',
                'class' => 'validate',
                'min' => '1',
                'max' => '4',
                'placeholder' => 'Durée du rattrapage',
                'required' => true,
                'value' => $duree
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
                'placeholder' => 'Sélectionner les étudiants',
                'multiple' => true,
            );

            $optionsEtudiants = array();

            foreach ($etudiants as $etudiant) {
                $optionsEtudiants[$etudiant['idetudiant']] = $etudiant['nometudiant']. ' ' . $etudiant['prenometudiant'];
            }

            echo form_dropdown('selectEtudiants[]', $optionsEtudiants, set_value('selectEtudiants'), $data);
            validation_show_error('selectEtudiants[]');
            ?>
            <?php validation_show_error('selectEtudiants[]'); ?>
            <label>Etudiants concernés</label>
        </div>

        <div class="input-field col s4">
            <?php
            $selectedSemestre = $semestre ?? '';
            $data = array(
                'id' => 'selectSemestre',
                'name' => 'selectSemestre',
                'placeholder' => 'Choisir le semestre',
                'selected' => $selectedSemestre,
            );

            $options = array(
                'S1' => 'S1',
                'S2' => 'S2',
                'S3' => 'S3',
                'S4' => 'S4',
                'S5' => 'S5',
                'S6' => 'S6',
            );

            echo form_dropdown($data, $options, set_value('selectSemestre'));
            validation_show_error('selectSemestre');
            ?>
            <label>Choisir le semestre</label>
        </div>

        <div class="input-field col s4">
            <?php
            $selectedRessource = isset($idressource) ? $idressource : '';
            $data = array(
                'id' => 'selectRessource',
                'name' => 'selectRessource',
                'placeholder' => 'Choisir la ressource',
                'selected' => $selectedRessource,
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

        <div class="input-field col s4">
            <?php
                $data = array(
                    'id' => 'selectEtat',
                    'name' => 'selectEtat',
                    'placeholder' => 'Etat du rattrapage',
                );

                $options = array(
                    'Programmé' => 'Programmé',
                    'En cours' => 'En cours',
                    'Neutralisé' => 'Neutralisé',
                );

                echo form_dropdown($data, $options, set_value('selectEtat'));
                validation_show_error('selectEtat');
            ?>
            <label>Choisir l'état du rattrapage</label>
        </div>

    </div>

    <div class="row">
        <div class="input-field col s12">
            <?php
            $commentaire = $comment ?? '';
            $data = array(
                'id' => 'txtCommentaire',
                'name' => 'txtCommentaire',
                'class' => 'materialize-textarea',
                'value' => $commentaire
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
                <input class="checkbox" type="checkbox" name="cbMail" id="cbMail"/>
                <span>Envoi d'un mail au professeur concerné avec la liste des étudiants absents (automatique)</span>
            </label>
            <?php validation_show_error('cbMail'); ?>
        </div>
    </div>

    <div class="row" style="display:flex; justify-content:center; align-items:center;">
        <div class="input-field col s12">
            <a style="background-color: rgb(187,71,30);" class="waves-effect waves-light btn"><div><input type="submit" value="Confirmer"></div></a>
        </div>
    </div>

    <?php echo form_close(); ?>

</div>