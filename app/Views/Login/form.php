<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
        background-image: url('https://www-iut.univ-lehavre.fr/wp-content/uploads/2020/02/cropped-DSC_0279-1-1.jpg');
        height: 300px;"></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="margin-top: -90px; background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
        <div class="card-body py-5 px-md-5">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-0 col-lg-3"></div>
                <div class="col-sm-12 col-lg-6">
                    <h2 class="fw-bold mb-5">Connexion</h2>
                    <?php echo form_open('signin'); ?>

                        <!-- Email input -->
                        <div class="form-floating mb-4" data-mdb-input-init>
                            <?php $params = array('class' => 'form-control', 'value' => set_value('email'), 'required' => true, 'name' => 'email', 'id' => 'email-input');
                            echo form_input($params); ?>
                            <label class="form-label" for="email-input">Email</label>
                            <?= validation_show_error('email') ?>
                        </div>

                        <!-- Password input -->
                        <div class="form-floating mb-4" data-mdb-input-init>
                            <?php $params = array('class' => 'form-control', 'value' => set_value('password'), 'required' => true, 'name' => 'password', 'id' => 'password-input');
                                echo form_password($params); ?>
                            <label class="form-label" for="password-input">Mot de passe</label>
                            <?= validation_show_error('password') ?>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-center mb-4">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                            <label class="form-check-label" for="form2Example33">
                                Se souvenir
                            </label>
                        </div>

                        <?php if (session()->getFlashdata('error') !== NULL)
                        {
                            echo '<div class="mt-4 alert alert-danger" role="alert">'.session()->getFlashdata('msg').'</div>';
                        }
                        ?>

                        <!-- Submit button -->
                        <?php $data = array('class' => 'btn btn-primary btn-block mb-4', 'name' => 'submit');
                            echo form_submit($data, 'Se connecter'); ?>

                        <!-- Other buttons -->
                        <div class="text-center">
                            <p><a href="javascript:void(0)">Mot de passe oublié ?</a></p>
                            <hr class="mx-auto" style="width: 320px;">
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-github"></i>
                            </button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-sm-0 col-lg-3"></div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->