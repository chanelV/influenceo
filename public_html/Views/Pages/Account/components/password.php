<div class="acc-setting">
    <h3>Account Setting</h3>
    <form class="form" id="common-form-update-password" action="/update-password" method="POST">
        <div class="cp-field">
            <div class="message-update-password"></div>
        </div>
        <div class="cp-field">
            <h5>ancien mot de passe (<span class="text-danger">*</span>)</h5>
            <div class="cpp-fiel">
                <input type="password" class="require" name="old_password" >
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <div class="cp-field">
            <h5>Nouveau mot de passe (<span class="text-danger">*</span>)</h5>
            <div class="cpp-fiel">
                <input type="password" class="require" id="password" name="password" >
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <div class="cp-field">
            <h5>Confirmer le mot de passe (<span class="text-danger">*</span>)</h5>
            <div class="cpp-fiel">
                <input type="password" class="require" id="cpassword" >
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <div class="save-stngs pd2">
            <ul>
                <li>
                    <input type="hidden" name="id" value="<?=$me['info']['id']?>">
                    <button type="submit" class="form-button" rel="update-password">Modifier</button>
                </li>
            </ul>
        </div><!--save-stngs end-->
    </form>
</div><!--acc-setting end-->