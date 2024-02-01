<div class="container mt-5">
    <div class="card">
        <div class="card-content">
            <span class="card-title center-align"><strong>Importer un fichier CSV</strong></span>
            <div class="mt-2">
                <?php if (session()->has('message')){ ?>
                    <div class="alert <?=session()->getFlashdata('alert-class') ?>">
                        <?=session()->getFlashdata('message') ?>
                    </div>
                <?php } ?>
                <?php $validation = \Config\Services::validation(); ?>
            </div>
            <form action="<?php echo base_url('/importCsvToDb');?>" method="post" enctype="multipart/form-data">
                <div class="file-field input-field">
                    <div class="btn btn-dark">
                        <span>File</span>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="center-align">
                    <button type="submit" name="submit" class="btn btn-dark">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
    <?php if (!empty($etudiants) && is_array($etudiants)) : ?>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>
            <?php foreach ($etudiants as $etudiant) : ?>
                <tr>
                    <td><?= $etudiant['nometudiant']; ?></td>
                    <td><?= $etudiant['prenometudiant']; ?></td>
                    <td><?= $etudiant['emailetudiant']; ?></td>
                    <td>
                        <a href="/etudiants/supprimer/<?= $etudiant['idetudiant']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <h3>Aucun étudiant.</h3>
    <?php endif ?>
</div>
