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
