<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
        $('select').formSelect();
    });
</script>

<section style="background-color: #eee; padding-top: 16px;">
    <div class="container">
        <div class="row">
            <div class="col s4 offset-s4">
                <div class="input-field" style="margin-right: 16px;">
                    <select>
                        <option disabled selected>Sélectionner une ressource</option>
                        <option value="1">R5.03 Développement efficace</option>
                        <option value="2">R6.02 Communication</option>
                        <option value="3">S3</option>
                        <option value="3">S4</option>
                        <option value="3">S5</option>
                        <option value="3">S6</option>
                    </select>
                    <label>Ressource</label>
                </div>
            </div>

            <div class="col s4">
                <div class="input-field" style="margin-left: 16px;">
                    <select>
                        <option disabled selected>Sélectionner un semestre</option>
                        <option value="1">S1</option>
                        <option value="2">S2</option>
                        <option value="3">S3</option>
                        <option value="3">S4</option>
                        <option value="3">S5</option>
                        <option value="3">S6</option>
                    </select>
                    <label>Semestre</label>
                </div>
            </div>
        </div>

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
                        </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>qdq</td>
                        <td>dqsd</td>
                        <td>qsds</td>
                        <td>qsd</td>
                        <td>qsd</td>
                        <td>
                            qsdqdsqsd
                            <?php
                            echo($session->get('role'));
                            if($session->get('role') === 'directeur')
                            {
                                echo('<button type="button" class="btn-floating" style="margin-left: 16px;"><i class="fas fa-pen" aria-hidden="true"></i></button>');
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>dqd</td>
                        <td>qsds</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>dqd</td>
                        <td>qsds</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>dqd</td>
                        <td>qsds</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>