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
                    <?php echo form_open("index/forgot_password"); ?>
                    <p>
                        <label for="identity"><?php echo (($type == 'email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label)); ?></label> <br />
                        <?php echo form_input($identity); ?>
                    </p>

                    <p><?php echo form_submit('submit', lang('forgot_password_submit_btn')); ?></p>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>