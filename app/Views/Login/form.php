<section class="center-align" style="height: 100%;">
    <!-- Background image -->
    <div class="p-5" style="
        background-image: url('https://www-iut.univ-lehavre.fr/wp-content/uploads/2020/02/cropped-DSC_0279-1-1.jpg');
        height: 300px; width: 100%; object-fit: cover; overflow: clip; background-position: center center;"></div>

    <div style="padding: 0 100px;">
        <div class="card z-depth-5" style="margin-top: -110px; background: hsla(0, 0%, 100%, 0.8)!important;
            backdrop-filter: blur(30px)!important; border-radius: 8px;">
            <div class="card-content py-5 px-md-5">
                <div class="row" style="display: flex; justify-content: center;">
                    <div class="col s0 m3"></div>
                    <div class="col s12 m6">
                        <h3 style="font-weight: 500;">Connexion</h3>
                        <?php echo form_open('signin'); ?>

                        <!-- Email input -->
                        <div class="input-field">
                            <label for="email-input">Email</label>
                            <?php $params = array('class' => 'validate', 'value' => set_value('email'), 'required' => true, 'name' => 'email', 'id' => 'email-input');
                                echo form_input($params); ?>
                            <?= validation_show_error('email') ?>
                        </div>

                        <!-- Password input -->
                        <div class="input-field">
                            <?php $params = array('class' => 'validate', 'value' => set_value('password'), 'required' => true, 'name' => 'password', 'id' => 'password-input');
                                echo form_password($params); ?>
                            <label for="password-input">Mot de passe</label>
                            <?= validation_show_error('password') ?>
                        </div>

                        <!-- Remember me button -->
                        <div>
                            <label>
                                <input type="checkbox" checked="checked" />
                                <span>Se souvenir</span>
                            </label>
                        </div>

                        <?php if (session()->getFlashdata('error') !== NULL)
                        {
                            echo '<div class="mt-4 alert alert-danger" role="alert">'.session()->getFlashdata('error').'</div>';
                        }
                        ?>

                        <!-- Submit button -->
                        <?php $data = array('class' => 'btn', 'name' => 'submit', 'style' => 'margin: 16px 0;');
                            echo form_submit($data, 'Se connecter'); ?>

                        <!-- Forgot password button -->
                        <div class="text-center">
                            <hr style="max-width: 250px; margin-bottom: 16px;">
                            <p><a href="javascript:void(0)">Mot de passe oublié ?</a></p>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col s0 m3"></div>
                </div>
            </div>
        </div>
    </div>
</section>