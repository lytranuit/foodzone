<div class="container my-5">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="card ">
                <div class="card-header text-center">
                    <span>{{lang('forgot_password_heading')}}</span>
                </div>
                <div class="card-body">
                    @if($message != '')
                    <div class="alert alert-warning alert-dismissible fade show" id="infoMessage"><?php echo $message; ?></div>
                    @endif
                    <?php echo form_open('index/reset_password/' . $code); ?>

                    <p>
                        <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length); ?></label> <br />
                        <?php echo form_input($new_password); ?>
                    </p>

                    <p>
                        <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
                        <?php echo form_input($new_password_confirm); ?>
                    </p>

                    <?php echo form_input($user_id); ?>
                    <?php echo form_hidden($csrf); ?>

                    <p><?php echo form_submit('submit', lang('reset_password_submit_btn')); ?></p>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>