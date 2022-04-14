<form class="form" id="common-form-brand" action="/register" method="POST">
    <div class="row">
    <div class="col-lg-12 message-brand"></div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="email" name="email" class="require" placeholder="Email">
        <i class="la la-envelope"></i>
        </div>
    </div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="text" name="username" class="require" placeholder="Pseudo">
        <i class="la la-user"></i>
        </div>
    </div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="text" name="reason_social" class="require" placeholder="Raison social">
        <i class="la la-building"></i>
        </div>
    </div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="password" name="password" class="require" placeholder="Mot de passe">
        <i class="la la-lock"></i>
        </div>
    </div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="password" name="confirm_password" class="require" placeholder="Confirmer mot de passe">
        <i class="la la-lock"></i>
        </div>
    </div>
    <input type="hidden" name="user_type" value="0">
    <div class="col-lg-12 no-pdd">
        <button type="submit" rel="brand" class="form-button">S'inscrire</button>
    </div>
    </div>
</form>