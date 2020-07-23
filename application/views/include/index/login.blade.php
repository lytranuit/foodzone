<div class="container my-5">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="card ">
                <div class="card-header text-center">
                    <span>{{lang('login')}}</span>
                    <div class="ml-auto" style="text-transform: none;">
                        {{lang("title_login")}} <a href="{{base_url()}}/index/register">{{lang("sign_up")}}</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-login" method="POST">
                        <input type="hidden" name="next" value="{{$next}}" />
                        @if($message != '')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $message ?>
                        </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" id="username" name="identity" type="text" placeholder="<?= lang('login_identity_label') ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" name="password" type="password" placeholder="<?= lang('login_password_label') ?>">
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="1" checked="" name="remember"><span class="custom-control-label">{{lang('remember_me')}}</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="button_login">{{lang('login')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>