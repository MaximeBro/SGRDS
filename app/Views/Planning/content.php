<div class="container-fluid" style="background-color: #fff;">
    <div class="row justify-content-end p-5">
        <div class="col-4">
            <label for="ressource-select">Ressource</label>
            <select id="ressource-select" class="form-select" aria-label="Ressource">
                <option selected>Veuillez sélectionner une ressource...</option>
                <option value="1">R5.03 Développement efficace</option>
                <option value="2">R6.02 Communication</option>
                <option value="3">S3</option>
                <option value="3">S4</option>
                <option value="3">S5</option>
                <option value="3">S6</option>
            </select>
        </div>

        <div class="col-4">
            <label for="semestre-select">Semestre</label>
            <select id="semestre-select" class="form-select" aria-label="Semestre">
                <option selected>Veuillez sélectionner un semestre...</option>
                <option value="1">S1</option>
                <option value="2">S2</option>
                <option value="3">S3</option>
                <option value="3">S4</option>
                <option value="3">S5</option>
                <option value="3">S6</option>
            </select>
        </div>
    </div>

    <div class="row justify-content-center px-5">
        <div class="col-12">
            <table class="table table-striped">
                <tr>
                    <th>État</th>
                    <th>Date</th>
                    <th>Ressource</th>
                    <th>Étudiants</th>
                    <th>Commentaire</th>
                </tr>

                <tr>
                    <td>qdq</td>
                    <td>dqsd</td>
                    <td>qsd</td>
                    <td>qsd</td>
                    <td>
                        qsdqdsqsd
                        <?php
                            echo($session->get('role'));
                            if($session->get('role') === 'directeur')
                            {
                                echo('<button type="button" class="btn btn-primary px-3"><i class="fas fa-pen" aria-hidden="true"></i></button>');
                            }
                        ?>
                    </td>
                </tr>
            </table>

            <form class="multi-range-field my-5 pb-5">
                <input id="multi" class="multi-range" type="range" />
            </form>

            <link rel="stylesheet" href="/assets/js/stepper.css" />
        </div>
    </div>
</div>